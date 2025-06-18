<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MlFeature;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PredictController extends Controller
{
    public function predict(Request $request)
    {
        Log::info('Prediction Request Received', [
            'raw_input' => $request->all()
        ]);

        $request->validate([
            'G' => 'required|numeric|min:0'
        ]);

        $userInputG = $request->input('G');
        Log::info('Validated User Input G:', ['G' => $userInputG]);

        // Step 1: Fetch latest record by upload_date or created_at
        $latest = MlFeature::orderBy('upload_date', 'desc')->first();

        if (!$latest) {
            Log::warning('No data found in ml_features table.');
            return redirect()->back()->withErrors('No feature data found in the database.');
        }

        Log::info('Latest Database Record:', [
            'J' => $latest->jurisdictions,
            'PCP' => $latest->carbon_index,
            'ID' => $latest->dispersion,
            'upload_date' => $latest->upload_date
        ]);

        // Step 2: Prepare input for Flask model
        $inputData = [
            'G' => (float) $userInputG,
            'J' => (int) $latest->jurisdictions,
            'PCP' => (float) $latest->carbon_index,
            'ID' => (float) $latest->dispersion,
        ];

        Log::info('Input Data Sent to Flask:', $inputData);

        // Step 3: Call Flask model
        try {
            $response = Http::post('http://127.0.0.1:5000/predict', $inputData);

            if ($response->failed()) {
                Log::error('Flask server returned an error.', ['response' => $response->body()]);
                return redirect()->back()->withErrors('Flask server error. Try again.');
            }

            $predictedPrice = $response->json()['predicted_price'] ?? null;

            Log::info('Flask Model Response:', ['predicted_price' => $predictedPrice]);

            if ($predictedPrice === null) {
                Log::error('Flask response missing predicted_price.');
                return redirect()->back()->withErrors('Invalid response from prediction model.');
            }

            return redirect()->back()->with('result', $predictedPrice);
        } catch (\Exception $e) {
            Log::error('Exception while calling Flask model', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Prediction failed: ' . $e->getMessage());
        }
    }
}
