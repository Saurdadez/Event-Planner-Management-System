<script src="{{ asset('import/assets/vendor/data_tables/dataTables.bootstrap4.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            responsive: true
        });
    });
</script>

<link rel="stylesheet" type="text/css" href="{{ asset('import/assets/vendor/data_tables/dataTables.bootstrap4.css') }}">

<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>