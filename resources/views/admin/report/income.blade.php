<html lang="en">

<head>
    @include('components.head')
    <title>Admin Dashboard</title>
    @php
    $activePage = 'report'; // set the active page dynamically based on your route or controller logic
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
                <!-- Begin Page Content -->

                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
            @include('layouts.admin.footer')
        </div>
        <!-- End of Page Wrapper -->
        @include('layouts.admin.logout')
        @include('components.plugins')
</body>

</html>