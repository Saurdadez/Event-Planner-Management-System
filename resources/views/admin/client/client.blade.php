<html lang="en">

<head>
    @include('components.head')
    <title>Admin Dashboard</title>
    @include('components.table')
    @php
    $activePage = 'client'; // set the active page dynamically based on your route or controller logic
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
                <!-- Card -->
                <div class="card shadow mb-4 mx-4">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center">
                            <nav aria-label="breadcrumb" class="mr-auto">
                                <h3 class="font-weight-bold text-primary" style="margin: 0 15px 10px 10px;">Clients
                                </h3>
                                <ol class="breadcrumb m-0" style="background-color: transparent; padding: 0 10px;">
                                    <li class="breadcrumb-item" style="font-size: 14;"><a
                                            href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" style="font-size: 14;" aria-current="page">
                                        Clients</li>
                                </ol>
                            </nav>
                            <button href="#" data-toggle="modal" data-target="#addClient" class="btn btn-primary">
                                <i class="fas fa-plus"></i> New Client
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered responsive" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">ID</th>
                                            <th style="text-align: center">Last Name</th>
                                            <th style="text-align: center">First Name</th>
                                            <th style="text-align: center">Mobile Number</th>
                                            <th style="text-align: center">Email</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center">1</td>
                                            <td style="text-align: center">Mendoza</td>
                                            <td style="text-align: center">Kylle Adyzza</td>
                                            <td style="text-align: center">09205433548</td>
                                            <td style="text-align: center">k.mendoza.522854@umindanao.edu.ph</td>
                                            <td style="text-align: center">
                                                <a href="#" class="fas fa-eye"></a>
                                                <a href="#" class="fas fa-edit"></a>
                                                <a href="#" class="fas fa-trash"></a>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->
                </div>
                <!-- End of Content Wrapper -->
            </div>
            <!-- End of Content Wrapper -->
            @include('layouts.admin.footer')
        </div>
        <!-- End of Page Wrapper -->
        @include('admin.client.client-modal')
        @include('layouts.admin.logout')
        @include('components.plugins')
        @include('components.table')
</body>

</html>