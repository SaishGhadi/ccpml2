<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MlFeature;
use Illuminate\Support\Facades\Http;


class PredictController extends Controller
{
 
    
    public function predict(Request $request)
    {
        $request->validate([
            'G' => 'required|numeric|min:0'
        ]);
    
        $userInputG = $request->input('G');
    
        // Step 1: Fetch latest record by upload_date or created_at
        $latest = MlFeature::orderBy('upload_date', 'desc')->first();
    
        if (!$latest) {
            return redirect()->back()->withErrors('No feature data found in the database.');
        }
    
        // Step 2: Prepare input for Flask model
        $inputData = [
            'G' => (float) $userInputG,
            'J' => (int) $latest->jurisdictions,
            'PCP' => (float) $latest->carbon_index,
            'ID' => (float) $latest->dispersion,
        ];
    
        // Step 3: Call Flask model
        try {
            $response = Http::post('http://127.0.0.1:5000/predict', $inputData);
    
            if ($response->failed()) {
                return redirect()->back()->withErrors('Flask server error. Try again.');
            }
    
            $predictedPrice = $response->json()['predicted_price'] ?? null;
    
            if ($predictedPrice === null) {
                return redirect()->back()->withErrors('Invalid response from prediction model.');
            }
    
            return redirect()->back()->with('result', $predictedPrice);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Prediction failed: ' . $e->getMessage());
        }
    }
    
}
