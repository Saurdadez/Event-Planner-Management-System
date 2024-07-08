<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required|integer|exists:role,role_id',
            'emp_last_name' => 'required|string|max:255',
            'emp_first_name' => 'required|string|max:255',
            'emp_middle_name' => 'nullable|string|max:255',
            'emp_birth_date' => 'required|date',
            'emp_age' => 'required|integer',
            'emp_address' => 'required|string|max:255',
            'emp_mobile_number' => 'required|string|max:15',
            'emp_email' => 'required|string|email|max:255|unique:employee,emp_email',
            'emp_password' => 'required|string|min:8',
        ]);

        // Insert employee data into the database
        DB::table('employee')->insert([
            'role_id' => $request->input('role_id'),
            'emp_last_name' => $request->input('emp_last_name'),
            'emp_first_name' => $request->input('emp_first_name'),
            'emp_middle_name' => $request->input('emp_middle_name'),
            'emp_birth_date' => $request->input('emp_birth_date'),
            'emp_age' => $request->input('emp_age'),
            'emp_address' => $request->input('emp_address'),
            'emp_mobile_number' => $request->input('emp_mobile_number'),
            'emp_email' => $request->input('emp_email'),
            'emp_password' => Hash::make($request->input('emp_password')),
            'emp_created_at' => now(),
            'emp_active' => 1,
            'emp_profile_pic' => 'default_profile_pic.jpg',
        ]);

        return redirect()->back()->with('success', 'Employee added successfully');
    }

    public function getEmployees()
    {
        // Fetch all employees with role names from the database
        $employees = DB::table('employee')
            ->join('role', 'employee.role_id', '=', 'role.role_id')
            ->select('employee.*', 'role.role_name')
            ->where('employee.emp_active', 1) // Only fetch active employees
            ->get();
        $roles = DB::table('role')->get();

        return view('employees.index', compact('employees', 'roles'));

        // return $employees;
    }

    public function softDeleteEmployee($emp_id)
    {
        DB::table('employee')
            ->where('emp_id', $emp_id)
            ->update(['emp_active' => 0]);

        return redirect()->back()->with('success', 'Employee deleted successfully');
    }

    // public function restoreEmployee($emp_id){
    //     DB::table('employee')
    //         ->where('emp_id', $emp_id)
    //         ->update(['emp_active' => 1]);

    //     return redirect()->back()->with("success", "Employees are restored successfully");
    // }


}
