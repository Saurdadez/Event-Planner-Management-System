<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.index', [
            'user' => auth()->user()
        ]);
    }

    public function appointments()
    {
        return view('admin.appointment.appointment', [
            'user' => auth()->user()
        ]);
    }

    public function clients()
    {
        return view('admin.client.client', [
            'user' => auth()->user()
        ]);
    }

    // public function employees()
    // {
    //     // Fetch all employees and roles from the database
    //     $employees = DB::table('employee')->get();
    //     $roles = DB::table('role')->get();

    //     return view('admin.employee.employee', [
    //         'user' => auth()->user(),
    //         'employees' => $employees,
    //         'roles' => $roles
    //     ]);
    // }
    public function employees()
    {
        // Fetch all active employees and all roles from the database
        $employees = DB::table('employee')
            ->where('emp_active', 1)
            ->get();
        $roles = DB::table('role')
            ->where('role_active', 1)
            ->get();

        return view('admin.employee.employee', [
            'user' => auth()->user(),
            'employees' => $employees,
            'roles' => $roles
        ]);
    }

    public function income()
    {
        return view('admin.report.income', [
            'user' => auth()->user()
        ]);
    }

    public function services()
    {
        return view('admin.service.service', [
            'user' => auth()->user()
        ]);
    }

    public function service_order()
    {
        return view('admin.service-order.service-order', [
            'user' => auth()->user()
        ]);
    }
}


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class AdminController extends Controller
// {
//     public function admin()
//     {
//         return view('admin.index', [
//             'user' => auth()->user()
//         ]);
//     }

//     public function appointments()
//     {
//         return view('admin.appointment.appointment', [
//             'user' => auth()->user()
//         ]);
//     }

//     public function clients()
//     {
//         return view('admin.client.client', [
//             'user' => auth()->user()
//         ]);
//     }

//     public function employees()
//     {
//         // Fetch all employees and roles from the database
//         $employees = DB::table('employee')->get();
//         $roles = DB::table('role')->get();

//         return view('admin.employee.employee', [
//             'user' => auth()->user(),
//             'employee' => $employees,
//             'role' => $roles
//         ]);
//     }

//     public function income()
//     {
//         return view('admin.report.income', [
//             'user' => auth()->user()
//         ]);
//     }

//     public function services()
//     {
//         return view('admin.service.service', [
//             'user' => auth()->user()
//         ]);
//     }

//     public function service_order()
//     {
//         return view('admin.service-order.service-order', [
//             'user' => auth()->user()
//         ]);
//     }
// }
