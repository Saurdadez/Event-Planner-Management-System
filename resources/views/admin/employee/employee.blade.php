<html lang="en">

<head>
    @include('components.head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Admin Dashboard</title>
    @php
        $activePage = 'setting'; // set the active page dynamically based on your route or controller logic
    @endphp
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.admin.sidebar', ['activePage' => $activePage])
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.admin.topbar')
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <!-- Service Card (larger) -->
                    <div class="col-lg-9 mb-4" style="position:relative; left:20px; top:0px;">
                        <div class="card shadow mx-4">
                            <!-- Content for Service Card -->
                            <div class="card-header py-3 d-flex align-items-center">
                                <nav aria-label="breadcrumb" class="mr-auto">
                                    <h3 class="font-weight-bold text-primary" style="margin: 0 15px 0px 10px;">Employees
                                    </h3>
                                    <ol class="breadcrumb m-0" style="background-color: transparent; padding: 0 10px;">
                                        <li class="breadcrumb-item" style="font-size: 14;"><a
                                                href="{{ url('/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" style="font-size: 14;" aria-current="page">
                                            Employees</li>
                                    </ol>
                                </nav>
                                <button href="#" data-toggle="modal" data-target="#addEmployee" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add Employee
                                </button>
                            </div>
                            <div class="card-body">
                                <!-- Service Card Content -->
                                <div class="table-responsive">
                                    <table class="table table-bordered responsive" id="dataTable" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No.</th>
                                                <th style="text-align: center">Last Name</th>
                                                <th style="text-align: center">First Name</th>
                                                <th style="text-align: center">Mobile Number</th>
                                                <th style="text-align: center">Email</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $employees as $employee )
                                            <tr>
                                                <td style="text-align: center">{{ $employee->emp_id }}</td>
                                                <td style="text-align: center">{{ $employee->emp_last_name }}</td>
                                                <td style="text-align: center">{{ $employee->emp_first_name }}</td>
                                                <td style="text-align: center">{{ $employee->emp_mobile_number }}</td>
                                                <td style="text-align: center">{{ $employee->emp_email }}</td>
                                                <td style="text-align: center">
                                                    <a href="#" data-toggle="modal" data-target="#viewEmployee{{ $employee->emp_id }}" class="fas fa-eye"></a>
                                                    <a href="#" class="fas fa-edit"></a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteEmployee{{ $employee->emp_id }}" class="fas fa-trash"></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Roles -->
                    <div class="col-lg-3 mb-4" style="position:relative; right:20px; top:0px;">
                        <div class="card shadow mx-4">
                            <div class="card-content">
                                <!-- Content for Categories Card -->
                                <div class="card-header py-3 d-flex align-items-center">
                                    <nav aria-label="breadcrumb" class="d-flex align-items-center">
                                        <h5 class="font-weight-bold text-primary" style="margin: 0 15px 0px 10px;">
                                            Roles
                                        </h5>
                                    </nav>
                                    <div class="ml-auto">
                                        <a href="#" data-toggle="modal" data-target="#addRole">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="text-align: left">No.</th>
                                                <th style="text-align: left">Role</th>
                                                <th style="text-align: left">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tbody>
                                                @foreach($roles as $role)
                                                    <tr>
                                                        <td style="text-align: left">{{ $role->role_id }}</td>
                                                        <td style="text-align: left">
                                                            <a type="button">{{ $role->role_name }}</a>
                                                        </td>
                                                        <td style="text-align: center">
                                                            <!-- Trash icon for deleting role -->
                                                            <a href="#" data-toggle="modal" data-target="#deleteRole{{ $role->role_id }}" class="fas fa-trash"></a>
                                                        </td>
                                                    </tr>

                                                    {{-- <div class="modal fade" id="deleteRole{{ $role->role_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Role</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this role?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    <a class="btn btn-primary" href="{{ url('/role/delete/' . $employee->emp_id) }}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="modal fade" id="deleteRole{{ $role->role_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Role</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this role?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <a href="{{ route('role.delete', ['role_id' => $role->role_id]) }}" class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.admin.footer')
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    @include('admin.employee.employee-modal')
    @include('admin.employee.role-modal')
    @include('layouts.admin.logout')
    @include('components.plugins')
    @include('components.table')

</body>

</html>
