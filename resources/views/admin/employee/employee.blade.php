<html lang="en">

<head>
    @include('components.head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Admin Dashboard</title>
    @php
        $activePage = 'setting';
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
                @if (session('success'))
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
                                <button href="#" data-toggle="modal" data-target="#addEmployee"
                                    class="btn btn-primary">
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
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td style="text-align: center">{{ $employee->emp_id }}</td>
                                                    <td style="text-align: center">{{ $employee->emp_last_name }}</td>
                                                    <td style="text-align: center">{{ $employee->emp_first_name }}</td>
                                                    <td style="text-align: center">{{ $employee->emp_mobile_number }}
                                                    </td>
                                                    <td style="text-align: center">{{ $employee->emp_email }}</td>
                                                    <td style="text-align: center">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#viewEmployee{{ $employee->emp_id }}"
                                                            class="fas fa-eye"></a>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#editEmployee{{ $employee->emp_id }}"
                                                            class="fas fa-edit"></a>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#deleteEmployee{{ $employee->emp_id }}"
                                                            class="fas fa-trash"></a>
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
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td style="text-align: left">{{ $role->role_id }}</td>
                                                    <td style="text-align: left">
                                                        <a href="#" class="role-details" data-toggle="modal"
                                                            data-target="#roleDetailsModal{{ $role->role_id }}"
                                                            style="color: inherit; text-decoration: none;">{{ $role->role_name }}</a>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <!-- View icon for edit role -->
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#editRole{{ $role->role_id }}"
                                                            class="fas fa-edit" style="margin-right: 10px"></a>

                                                        <!-- Trash icon for deleting role -->
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#deleteRole{{ $role->role_id }}"
                                                            class="fas fa-trash"></a>
                                                    </td>
                                                </tr>
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

<script>
    $(document).ready(function() {
        $('.role-details').click(function(e) {
            e.preventDefault();
            var modalSelector = $(this).attr('data-target');
            $(modalSelector).modal('show');
        });
    });
</script>
