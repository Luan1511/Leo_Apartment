@extends('Admins.admin.layout-admin')

@section('content')
    <div class="form-container">
        <div class="title-content">Add service</div>

        <form action="addHandle" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="for_resident" class="form-label">Only for resident?</label>
                    <select class="form-select" id="for_resident" name="for_resident" required>
                        <option value="">Select an option</option>
                        <option value="yes">yes</option>
                        <option value="no">no</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" style="height: 132px">
                </div>
            </div>
            <div class="row d-flex" style="justify-content: center;">
                <button type="submit" class="col-5 col-md-3 btn btn-primary w-100 mt-10"
                    style="font-weight: 500; box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.126);">Add service</button>
            </div>
        </form>
    </div>
@endsection
