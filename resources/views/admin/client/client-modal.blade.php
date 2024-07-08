<!-- ADD CLIENT MODAL -->
<div class="modal fade text-left" id="addClient" tabindex="-1" role="dialog" aria-labelledby="addClientModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" name="add"
                data-parsley-validate>
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
                                    <input type="text" class="form-control" name="lastname" id="lastName">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">First Name:</label>
                                    <input type="text" class="form-control" name="firstname" id="firstName">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Middle Name:</label>
                                    <input type="text" class="form-control" placeholder="(Optional)" name="middlename" id="middleName">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Birth Date:</label>
                                    <input type="date" class="form-control" name="birthdate" id="birthDate" onchange="calculateAge()">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Age</label>
                                    <input type="number" class="form-control" name="age" id="age" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Address:</label>
                                    <input type="text" class="form-control" name="firstname" id="firstName">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Mobile Number:</label>
                                    <input type="text" placeholder="9xxxxxxxxx" class="form-control" name="mobilenumber" id="mobileNumber">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Email:</label>
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Password:</label>
                                    <input type="text" class="form-control" name="password" id="password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitRole" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="button" class="btn btn-secondary me-1 mb-1" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('birthDate').addEventListener('change', calculateAge);
});

function calculateAge() {
    const birthDate = document.getElementById('birthDate').value;
    const ageField = document.getElementById('age');

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
