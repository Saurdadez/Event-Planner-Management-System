<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_name' => 'required|string|max:255',
                'service_cost' => 'required|numeric',
            ]);

            DB::table('service')->insert([
                'service_name' => $request->input('service_name'),
                'service_cost' => $request->input('service_cost'),
                'service_created_by' => Auth::id(),
                'service_created_at' => now(),
                'service_active' => 1,
            ]);

            $successMessage = "Service added successfully!";
            return redirect()->back()->with('success', $successMessage);

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            $errorMessage = "Failed to add service: " . $e->getMessage();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }
    }

    public function getServices()
    {
        $services = DB::table('service')
            ->where('service_active', 1)
            ->get();

        $successMessage = Session::get('success');
        return view('services.index', compact('services', 'successMessage'));
    }

    public function updateServices()
    {

    }

}
