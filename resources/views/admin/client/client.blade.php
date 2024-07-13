<!DOCTYPE html>
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
                                <h3 class="font-weight-bold text-primary" style="margin: 0 15px 10px 10px;">Clients</h3>
                                <ol class="breadcrumb m-0" style="background-color: transparent; padding: 0 10px;">
                                    <li class="breadcrumb-item" style="font-size: 14;"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" style="font-size: 14;" aria-current="page">Clients</li>
                                </ol>
                            </nav>
                            <button href="#" data-toggle="modal" data-target="#addClient" class="btn btn-primary">
                                <i class="fas fa-plus"></i> New Client
                            </button>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

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
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td style="text-align: center">{{ $client->client_id }}</td>
                                                <td style="text-align: center">{{ $client->client_last_name }}</td>
                                                <td style="text-align: center">{{ $client->client_first_name }}</td>
                                                <td style="text-align: center">{{ $client->client_mobile_number }}</td>
                                                <td style="text-align: center">{{ $client->client_email }}</td>
                                                <td style="text-align: center">
                                                    <a href="#" class="fas fa-eye" data-toggle="modal"
                                                    data-target="#viewClient{{ $client->client_id }}"></a>
                                                    <a href="#" class="fas fa-edit" data-toggle="modal"
                                                    data-target="#updateClient{{ $client->client_id }}"></a>
                                                    <a href="#" class="fas fa-trash" data-toggle="modal"
                                                    data-target="#deleteClient{{$client->client_id}}"></a>
                                                </td>
                                            </tr>
                                        @endforeach
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
    </div>
    <!-- End of Wrapper -->
</body>

</html>
