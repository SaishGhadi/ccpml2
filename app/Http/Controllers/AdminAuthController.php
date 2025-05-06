<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\MlFeature;


class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function storeFeatures(Request $request)
{
    $request->validate([
        'jurisdictions' => 'required|integer',
        'carbon_index' => 'required|numeric',
        'dispersion' => 'required|numeric',
    ]);

    MlFeature::create([
        'jurisdictions' => $request->jurisdictions,
        'carbon_index' => $request->carbon_index,
        'dispersion' => $request->dispersion,
        'upload_date' => now()->toDateString(),
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Data saved successfully!');
}

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
