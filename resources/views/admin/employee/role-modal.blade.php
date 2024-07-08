<!-- ADD ROLE MODAL -->
<div class="modal fade text-left" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addRoleModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <form class="form form-vertical" method="POST" action="{{ url('/save-role') }}" enctype="multipart/form-data" name="add" data-parsley-validate>
            @csrf
                <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                    <h5 class="modal-title text-white">New Employee Role</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Role</label>
                                    <input type="text" class="form-control" name="role_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Role Description</label>
                                    <textarea class="form-control" name="role_description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submitRole" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="button" class="btn btn-secondary me-1 mb-1"
                        data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

