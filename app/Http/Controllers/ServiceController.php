<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_id' => 'required|integer',
                'service_name' => 'required|string|max:255',
                'service_cost' => 'required|numeric',
            ]);

            DB::table('service')->insert([
                'service_name' => $request->input('service_name'), // corrected from 'service_id'
                'service_cost' => $request->input('service_cost'),
                'service_created_by' => Auth::id(),
                'service_created_at' => now(),
                'serviec_active' => 1,
            ]);

            Session::flash('success', "Service added successfully");
            return redirect()->back();

        } catch (ValidationException $e) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withErrors($e->validator->errors())->withInput();

        } catch (\Exception $e) {
            // If an exception occurs (e.g., database insertion fails), handle it here
            $errorMessage = "Failed to add client: " . $e->getMessage();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }
    }

}
