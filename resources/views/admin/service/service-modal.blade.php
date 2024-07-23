<!-- ADD SERVICE MODAL -->
<div class="modal fade text-left" id="addService" tabindex="-1" role="dialog" aria-labelledby="addServiceModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form class="form form-vertical" method="POST" enctype="multipart/form-data" action = "{{ action('App\Http\Controllers\ServiceController@store') }}" name="add"
                data-parsley-validate>
                {{ csrf_field() }}
                <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                    <h5 class="modal-title text-white">New Service</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Service Name:</label>
                                    <input type="text" class="form-control" name="service_name" id="service_name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mandatory">
                                    <label class="form-label text-dark">Cost:</label>
                                    <input type="text" class="form-control" name="service_cost" id="service_cost">
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

@foreach ($services as $service)
        <!-- VIEW CLIENT MODAL -->
        <div class="modal fade text-left" id="viewService{{ $service->service_id }}" tabindex="-1" role="dialog"
            aria-labelledby="viewServiceModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <form class="form form-vertical" method="POST" enctype="multipart/form-data" name="add"
                        data-parsley-validate>
                        <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                            <h5 class="modal-title text-white">Service</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                        <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Service Name:</label>
                                            <input type="text" class="form-control"
                                                value="{{ $service->service_name }}" name="service_name"
                                                id="service_name" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mandatory">
                                            <label class="form-label text-dark">Cost:</label>
                                            <input type="text" class="form-control"
                                                value="{{ $service->service_cost }}" name="service_cost"
                                                id="service_cost" readonly>
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
    <div class="modal fade text-left" id="editService{{ $service->service_id }}" tabindex="-1" role="dialog"
        aria-labelledby="updateServiceModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form class="form form-vertical" method="POST"
                    action="{{ route('service.update', ['service_id' => $service->service_id]) }}"
                    enctype="multipart/form-data" name="edit" data-parsley-validate>
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-primary d-flex align-items-center justify-content-between">
                        <h5 class="modal-title text-white">Edit Service</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Service Name:</label>
                                        <input type="text" class="form-control" name="client_last_name"
                                        value="{{ $service->service_name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mandatory">
                                        <label class="form-label text-dark">Cost:</label>
                                        <input type="text" class="form-control" name="client_first_name"
                                        value="{{ $service->service_cost }}">
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



@endforeach

