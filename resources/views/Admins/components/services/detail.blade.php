@extends('Admins.admin.layout-admin')

@section('content')
    <div class="table-container">
        <div class="container py-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Service Details</h4>
                <div>
                    <a class="btn edit-btn me-2">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                    <a class="btn delete-btn">
                        <i class="fas fa-trash me-1"></i> Delete
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Main Image -->
                <div class="col-md-4 mb-4">
                    <div class="card ">
                        <td>
                            <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image"
                                style="max-height: 200px; margin: 0 auto; margin: 10px;">
                        </td>
                    </div>
                </div>

                <!-- Specifications -->
                <div class="col-md-8">
                    <table class="table table-bordered specs-table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $service->name }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>From ${{ $service->price }}</td>
                            </tr>
                            <tr>
                                <th>Only for resident?</th>
                                <td>{{ $service->for_resident }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $service->description }}</td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>{{ $service->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Rating</th>
                                <td>{{ $service->rating }}⭐</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <table id="apartments-table" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>For resident</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
