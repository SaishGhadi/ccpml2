<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function showMoreInfo()
    {
        $file = storage_path('app/carbon_prices.csv');
        $labels = [];
        $prices = [];

        if (($handle = fopen($file, 'r')) !== false) {
            fgetcsv($handle); // skip header
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $labels[] = $data[0]; // date
                $prices[] = floatval($data[1]); // price
            }
            fclose($handle);
        }

        return view('moreInfo', [
            'chartData' => [
                'labels' => $labels,
                'prices' => $prices
            ]
        ]);
    }

    public function predict(Request $request)
    {
        $request->validate([
            'G' => 'required|numeric|min:0|max:100'
        ]);

        $ghgInput = $request->input('G');

        // Example dummy prediction logic (replace with real model)
        // Assume prediction = base value + ghg factor
        $basePrice = 20.0;
        $predictedPrice = $basePrice + ($ghgInput * 0.5); // Dummy formula

        return redirect()->back()->with('result', $predictedPrice);
    }
}
