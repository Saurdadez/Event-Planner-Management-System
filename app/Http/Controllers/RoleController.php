<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function saveRole(Request $request)
    {
        // Validate the request data
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'required|string|max:1000',
        ]);

        // Insert the data into the database
        DB::table('role')->insert([
            'role_name' => $request->input('role_name'),
            'role_description' => $request->input('role_description'),
            'role_created_at' => now(),
            'role_active' => 1,
            'role_created_by' => Auth::id(),
        ]);
        return redirect()->back()->with('success', 'Role created successfully.');
    }

    public function getRoles()
    {
        // Fetch all employees with role names from the database
        $employees = DB::table('role')
            ->join('role', '=', 'role.role_id')
            ->select('role.*', 'role.role_name')
            ->where('role.role_active', 1) // Only fetch active employees
            ->get();
        $roles = DB::table('role')->get();

        return view('employees.index');

        // return $employees;
    }

    public function updateRole(Request $request, $role_id)
    {
        // Validate input
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'required|string|max:255',
        ]);

        // Find the employee by ID
        $role = DB::table('role')->where('role_id', $role_id)->first();

        if ($role) {
            // Update employee details
            DB::table('role')
                ->where('role_id', $role_id)
                ->update([
                    'role_name' => $request->input('role_name'),
                    'role_description' => $request->input('role_description'),
                    'role_modified_by' => Auth::id(),
                    'role_modified_at' => now(),
                    // Update other fields here
                ]);

            Session::flash('success', 'Role edited successfully');
            return redirect()->back();
        }
    }

    public function deleteRole($role_id)
    {
        DB::table('role')
            ->where('role_id', $role_id)
            ->update(['role_active' => 0]);

        return redirect()->back()->with('success', 'Role deleted successfully.');
    }
}
