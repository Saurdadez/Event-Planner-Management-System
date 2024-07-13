<!-- ADD ROLE Modal -->
<div class="modal fade text-left" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addRoleModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form class="form form-vertical" method="POST" action="{{ url('/save-role') }}"
                enctype="multipart/form-data" name="add" data-parsley-validate>
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
                    <button type="button" class="btn btn-secondary me-1 mb-1" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- VIEW ROLE Modal -->
@foreach ($roles as $role)
    <div class="modal fade" id="roleDetailsModal{{ $role->role_id }}" tabindex="-1" role="dialog"
        aria-labelledby="roleDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleDetailsModalLabel">
                        Role Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $role->role_description }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT ROLE Modal -->
    <div class="modal fade text-left" id="editRole{{ $role->role_id }}" tabindex="-1" role="dialog"
        aria-labelledby="editRoleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form class="form form-vertical" method="POST"
                    action="{{ route('role.update', ['role_id' => $role->role_id]) }}" enctype="multipart/form-data"
                    name="edit" data-parsley-validate>
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                        <h5 class="modal-title text-white">Edit Role</h5>
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
                                        <input type="text" class="form-control" name="role_name"
                                            value="{{ $role->role_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Role Description</label>
                                        <textarea class="form-control" name="role_description">{{ $role->role_description }}</textarea>
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


    <!--DELETE ROLE Modal-->
    <div class="modal fade" id="deleteRole{{ $role->role_id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm
                        Delete Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this role?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="{{ route('role.delete', ['role_id' => $role->role_id]) }}"
                        class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
