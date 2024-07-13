<!-- ADD CLIENT MODAL -->
<div class="modal fade text-left" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClientModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action = "{{ action('App\Http\Controllers\ClientController@store') }}" name="add"
                data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                    <h5 class="modal-title text-white">New Client</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Last Name:</label>
                                    <input type="text" class="form-control" name="client_last_name" id="client_last_name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">First Name:</label>
                                    <input type="text" class="form-control" name="client_first_name" id="client_first_name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Middle Name:</label>
                                    <input type="text" class="form-control" placeholder="(Optional)" name="client_middle_name" id="client_middle_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Birth Date:</label>
                                    <input type="date" class="form-control" name="client_birth_date" id="client_birth_date" onchange="calculateAge()">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Age</label>
                                    <input type="number" class="form-control" name="client_age" id="client_age" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Address:</label>
                                    <input type="text" class="form-control" name="client_address" id="client_address">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Mobile Number:</label>
                                    <input type="text" placeholder="9xxxxxxxxx" class="form-control" name="client_mobile_number" id="client_mobile_Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Email:</label>
                                    <input type="text" class="form-control" name="client_email" id="client_email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Password:</label>
                                    <input type="text" class="form-control" name="client_password" id="client_password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submitRole" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="submit" class="btn btn-secondary me-1 mb-1" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($clients as $client)
        <!-- VIEW CLIENT MODAL -->
        <div class="modal fade text-left" id="viewClient{{ $client->client_id }}" tabindex="-1" role="dialog"
            aria-labelledby="viewRoleModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" name="add"
                        data-parsley-validate>
                        <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                            <h5 class="modal-title text-white">Client</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                        <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Last Name:</label>
                                            <input type="text" class="form-control"
                                                value="{{ $client->client_last_name }}" name="client_last_name"
                                                id="client_last_name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">First Name:</label>
                                            <input type="text" class="form-control"
                                                value="{{ $client->client_first_name }}" name="client_first_name"
                                                id="client_first_name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Middle Name:</label>
                                            <input type="text" class="form-control"
                                                value="{{ $client->client_middle_name }}" name="client_middle_name"
                                                id="client_middle_name" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Birth Date:</label>
                                            <input type="date" class="form-control"
                                                value="{{ $client->client_birth_date }}" name="client_birth_date"
                                                id="client_birth_date" onchange="calculateAge()" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Age:</label>
                                            <input type="number" class="form-control" value="{{ $client->client_age }}"
                                                name="client_age" id="client_age" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Address:</label>
                                            <input type="text" class="form-control"
                                                value="{{ $client->client_address }}" name="client_address" id="client_address"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Mobile Number:</label>
                                            <input type="text" class="form-control"
                                                value="{{ $client->client_mobile_number }}" name="client_mobile_number"
                                                id="client_mobile_number" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Email:</label>
                                            <input type="client_email" class="form-control"
                                                value="{{ $client->client_email }}" name="client_email" id="client_email"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary me-1 mb-1"
                                data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- EDIT CLIENT MODAL -->
    <div class="modal fade text-left" id="updateClient{{ $client->client_id }}" tabindex="-1" role="dialog"
        aria-labelledby="updateClientModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form class="form form-vertical" method="POST"
                    action="{{ route('client.update', ['client_id' => $client->client_id]) }}"
                    enctype="multipart/form-data" name="edit" data-parsley-validate>
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                        <h5 class="modal-title text-white">Edit Client</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Last Name:</label>
                                        <input type="text" class="form-control" name="client_last_name"
                                            value="{{ $client->client_last_name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">First Name:</label>
                                        <input type="text" class="form-control" name="client_first_name"
                                            value="{{ $client->client_first_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Save Changes</button>
                        <button type="button" class="btn btn-secondary me-1 mb-1"
                            data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteClient{{ $client->client_id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Client</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this client?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/client/delete/' . $client->client_id) }}">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endforeach

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('client_birth_date').addEventListener('change', calculateAge);
});

function calculateAge() {
    const birthDate = document.getElementById('client_birth_date').value;
    const ageField = document.getElementById('client_age');

    if (birthDate) {
        const today = new Date();
        const birthDateObj = new Date(birthDate);
        let age = today.getFullYear() - birthDateObj.getFullYear();
        const monthDifference = today.getMonth() - birthDateObj.getMonth();

        // Adjust age if the birth month hasn't occurred yet this year, or if the birthday hasn't occurred yet this month
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDateObj.getDate())) {
            age--;
        }

        ageField.value = age;
    } else {
        ageField.value = '';
    }
}
</script>
