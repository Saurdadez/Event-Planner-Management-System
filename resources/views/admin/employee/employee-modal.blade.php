<!-- ADD EMPLOYEE MODAL -->
<div class="modal fade text-left" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form class="form form-vertical" method="POST"
                action="{{ action('App\Http\Controllers\EmployeeController@store') }}" enctype="multipart/form-data" name="add" data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                    <h5 class="modal-title text-white">New Employee</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Role:</label>
                                    <select class="form-control" name="role_id" id="role_id">
                                        <option value=""></option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Last Name:</label>
                                    <input type="text" class="form-control" name="emp_last_name" id="emp_last_name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">First Name:</label>
                                    <input type="text" class="form-control" name="emp_first_name"
                                        id="emp_first_name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Middle Name:</label>
                                    <input type="text" class="form-control" placeholder="(Optional)"
                                        name="emp_middle_name" id="emp_middle_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Birth Date:</label>
                                    <input type="date" class="form-control" name="emp_birth_date" id="emp_birth_date"
                                        onchange="calculateAge()">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Age</label>
                                    <input type="number" class="form-control" name="emp_age" id="emp_age" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Address:</label>
                                    <input type="text" class="form-control" name="emp_address" id="emp_address">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Mobile Number:</label>
                                    <input type="number" placeholder="9xxxxxxxxx" class="form-control"
                                        name="emp_mobile_number" id="emp_mobile_number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Email:</label>
                                    <input type="email" class="form-control" name="emp_email" id="emp_email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Password:</label>
                                    <input type="password" class="form-control" name="emp_password"
                                        id="emp_password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Active Status:</label>
                                    <input type="text" class="form-control" name="emp_active" id="emp_active" value="1" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submitRole" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="button" class="btn btn-secondary me-1 mb-1" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($employees as $employee)
    <!-- VIEW EMPLOYEE MODAL -->
    <div class="modal fade text-left" id="viewEmployee{{ $employee->emp_id }}" tabindex="-1" role="dialog"
        aria-labelledby="viewEmployeeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form class="form form-vertical" method="POST" enctype="multipart/form-data" name="add"
                    data-parsley-validate>
                    <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                        <h5 class="modal-title text-white">Employee</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Role:</label>
                                        <input type="text" class="form-control" value="{{ $employee->role_id }}"
                                            name="role" id="role" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Last Name:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $employee->emp_last_name }}" name="emp_last_name"
                                            id="emp_last_name" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">First Name:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $employee->emp_first_name }}" name="emp_first_name"
                                            id="emp_first_name" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Middle Name:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $employee->emp_middle_name }}" name="emp_middle_name"
                                            id="emp_middle_name" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Birth Date:</label>
                                        <input type="date" class="form-control"
                                            value="{{ $employee->emp_birth_date }}" name="emp_birth_date"
                                            id="emp_birth_date" onchange="calculateAge()" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Age</label>
                                        <input type="number" class="form-control" value="{{ $employee->emp_age }}"
                                            name="emp_age" id="emp_age" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Address:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $employee->emp_address }}" name="emp_address" id="emp_address"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Mobile Number:</label>
                                        <input type="text" class="form-control"
                                            value="{{ $employee->emp_mobile_number }}" name="emp_mobile_number"
                                            id="emp_mobile_number" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Email:</label>
                                        <input type="emp_email" class="form-control"
                                            value="{{ $employee->emp_email }}" name="emp_email" id="emp_email"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Active Status:</label>
                                        <input type="number" class="form-control" value="{{ $employee->emp_active ? '1' : '0' }}" name="emp_active" id="emp_active" readonly>
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

    <!--DELETE EMPLOYEE-->
    <div class="modal fade" id="deleteEmployee{{ $employee->emp_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Employee</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this employee?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/employee/delete/' . $employee->emp_id) }}">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endforeach



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach event listeners to each birth date input field dynamically
        const birthDateInputs = document.querySelectorAll('input[name="emp_birth_date"]');
        birthDateInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                calculateAge(input); // Pass the input element to the calculateAge function
            });
        });
    });

    function calculateAge(input) {
        const birthDate = input.value;
        const modal = input.closest('.modal'); // Find the parent modal element
        const ageField = modal.querySelector('input[name="emp_age"]');
        if (birthDate) {
            const today = new Date();
            const birthDateObj = new Date(birthDate);
            let emp_age = today.getFullYear() - birthDateObj.getFullYear();
            const monthDifference = today.getMonth() - birthDateObj.getMonth();
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDateObj.getDate())) {
                emp_age--;
            }
            ageField.value = emp_age;
        } else {
            ageField.value = '';
        }
    }
</script>
