<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'client_last_name' => 'required|string|max:255',
                'client_first_name' => 'required|string|max:255',
                'client_middle_name' => 'nullable|string|max:255',
                'client_birth_date'  => 'required|date',
                'client_age' => 'required|integer',
                'client_address' => 'required|string|max:255',
                'client_mobile_number'  => 'required|string|max:15',
                'client_email' => 'required|string|email|max:255|unique:client,client_email',
                'client_password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/',
            ]);

            // Insert data to client table
            DB::table('client')->insert([
                'role_id' => 4,
                'client_last_name' => $request->input('client_last_name'),
                'client_first_name' => $request->input('client_first_name'),
                'client_middle_name' => $request->input('client_middle_name'),
                'client_birth_date' => $request->input('client_birth_date'),
                'client_age' => $request->input('client_age'),
                'client_address' => $request->input('client_address'),
                'client_mobile_number' => $request->input('client_mobile_number'),
                'client_email' => $request->input('client_email'),
                'client_password' => Hash::make($request->input('client_password')),
                'client_created_at' => now(),
                'client_active' => 1,
                'client_profile_pic' => 'default_profile_pic.jpg',
                'client_created_by' => Auth::id(),
                'client_updated_at' => now(),
                'client_updated_by' => Auth::id(),
            ]);

            $successMessage = "Client added successfully!";
            return redirect()->back()->with('success', $successMessage);

        } catch (ValidationException $e) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withErrors($e->validator->errors())->withInput();

        } catch (\Exception $e) {
            // If an exception occurs (e.g., database insertion fails), handle it here
            $errorMessage = "Failed to add client: " . $e->getMessage();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }
    }

    public function getClients()
    {
        $clients = DB::table('client')
            ->where('client_active', 1)
            ->get();

        $successMessage = Session::get('success');
        return view('clients.index', compact('clients', 'successMessage'));
    }

    public function updateClient(Request $request, $client_id)
    {
        // Validate input
        $request->validate([
            'client_last_name' => 'required|string|max:255',
            'client_first_name' => 'required|string|max:255',
        ]);

        $client = DB::table('client')->where('client_id', $client_id)->first();

        if ($client) {
            // Update employee details
            DB::table('client')
                ->where('client_id', $client_id)
                ->update([
                    'client_last_name' => $request->input('client_last_name'),
                    'client_first_name' => $request->input('client_first_name'),
                    'client_updated_by' => Auth::id(),
                    'client_updated_at' => now(),
                ]);

            Session::flash('success', 'Client edited successfully');
            return redirect()->back();
        }
    }

    public function softDeleteClient($client_id)
    {
        DB::table('client')
            ->where('client_id', $client_id)
            ->update(['client_active'=> 0]);

        Session::flash('success', 'Client deleted successfully');
        return redirect()->back();
    }

}
