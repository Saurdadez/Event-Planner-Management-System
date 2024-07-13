<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use Facade\FlareClient\Http\Client;

// Route to show the login form
Route::get('/', [SessionController::class, 'showLoginForm'])->name('login');

// Route to handle login form submission
Route::post('/login', [SessionController::class, 'login']);

// // Route to handle user logout
// Route::match(['get', 'post'], '/logout', [SessionController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminController::class, 'admin'])->name('dashboard');

    Route::get('/appointments', [AdminController::class, 'appointments'])->name('appointments');

    Route::get('/service-orders', [AdminController::class, 'service_order'])->name('service-orders');

    Route::get('/clients', [AdminController::class, 'clients']);
    Route::post('/client/store', [ClientController::class, 'store']);
    Route::get('/client', [ClientController::class, 'getClients']);
    Route::put('/client/update/{client_id}', [ClientController::class, 'updateClient'])->name('client.update');
    Route::get('/client/delete/{client_id}', [ClientController::class, 'softDeleteClient'])->name('client.delete');;

    Route::get('/employees', [AdminController::class, 'employees']);
    Route::post('/employee/store', [EmployeeController::class, 'store']);
    Route::get('/employee', [EmployeeController::class, 'getEmployees']);
    Route::get('/employee/delete/{emp_id}', [EmployeeController::class, 'softDeleteEmployee']);
    Route::put('/employee/update/{emp_id}', [EmployeeController::class, 'updateEmployee'])->name('employee.update');

    Route::post('/save-role', [RoleController::class, 'saveRole']);
    Route::get('/roles', [RoleController::class, 'getRoles'])->name('roles');
    Route::get('role/delete/{role_id}', [RoleController::class, 'deleteRole'])->name('role.delete');
    Route::put('/role/update/{role_id}', [RoleController::class, 'updateRole'])->name('role.update');

    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::get('/services/store', [ServiceController::class. 'store']);

    Route::get('/income-report', [AdminController::class, 'income'])->name('income-report');

    Route::get('/logout', [SessionController::class, 'logout']);
});
