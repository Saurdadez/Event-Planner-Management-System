<html lang="en">

<head>
    @include('components.head')
    <title>Admin Dashboard</title>
    @php
    $activePage = 'service'; // set the active page dynamically based on your route or controller logic
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
                <div class="row">
                    <!-- Service Card (larger) -->
                    <div class="col-lg-9 mb-4" style="position:relative; left:20px; top:0px;">
                        <div class="card shadow mx-4">
                            <!-- Content for Service Card -->
                            <div class="card-header py-3 d-flex align-items-center">
                                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                                    <h5 class="font-weight-bold text-primary" style="margin: 0 15px 0px 10px;">
                                        Services
                                    </h5>
                                </nav>
                                <div class="ml-auto">
                                    <a href="#" data-toggle="modal" data-target="#addService" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>Add Service
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Service Card Content -->
                                <div class="table-responsive">
                                    <table class="table table-bordered responsive" id="dataTable" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No.</th>
                                                <th style="text-align: center">Service Name</th>
                                                <th style="text-align: center">Cost</th>
                                                <th style="text-align: center">Date Created</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                            <tr>
                                                <td style="text-align: center">{{$service->service_id}}</td>
                                                <td style="text-align: center">{{$Service->service_name}}</td>
                                                <td style="text-align: center">{{$service->service_cost}}</td>
                                                <td style="text-align: center">{{$service->service_created_at}}</td>
                                                <td style="text-align: center">
                                                    <a href="#" data-toggle="modal" data-target="#viewService{{$service->service_id}}" class="fas fa-eye"></a>
                                                    <a href="#" data-toggle="modal" data-target="#editService{{$service->service_id}}" class="fas fa-edit"></a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteService{{$service->service_id}}" class="fas fa-trash"></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Categories Card (smaller) -->
                    <div class="col-lg-3 mb-4" style="position:relative; right:20px; top:0px;">
                        <div class="card shadow mx-4">
                            <div class="card-content">
                                <!-- Content for Categories Card -->
                                <div class="card-header py-3 d-flex align-items-center">
                                    <nav aria-label="breadcrumb" class="d-flex align-items-center">
                                        <h5 class="font-weight-bold text-primary" style="margin: 0 15px 0px 10px;">
                                            Services
                                        </h5>
                                    </nav>
                                    <div class="ml-auto">
                                        <a href="#">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="text-align: left">No.</th>
                                                <th style="text-align: left">Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: left">1</td>
                                                <td style="text-align: left"><a type="button">Category Name</a></td>
                                            </tr>
                                            <!-- Add more rows as needed -->
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

    @include('layouts.admin.logout')
    @include('admin.service.service-modal')
    @include('components.plugins')
    @include('components.table')
</body>

</html>
