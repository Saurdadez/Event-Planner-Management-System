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


    public function clients()
    {
        // Fetch all active employees and all roles from the database
        $clients = DB::table('client')
            ->where('client_active', 1)
            ->get();

        return view('admin.client.client', [
            'user' => auth()->user(),
            'clients' => $clients,
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
        $services = DB::table('service')
            ->where('service_active', 1)
            ->get();

        return view('admin.service.service', [
            'user' => auth()->user(),
            'services' => $services,
        ]);
    }

    public function service_order()
    {
        return view('admin.service-order.service-order', [
            'user' => auth()->user()
        ]);
    }
}


