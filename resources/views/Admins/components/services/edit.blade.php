@extends('Admins.admin.layout-admin')

@section('content')
    <div class="form-container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="title-content">Edit service</div>

        <form action="{{ url('admin/service/' . $service->id . '/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">Service name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $service->name }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price"
                        value="{{ $service->price }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="for_resident" class="form-label">Only for resident?</label>
                    <select class="form-select" id="for_resident" name="for_resident" required>
                        <option value="">Select a option</option>
                        <option value="yes" {{ $service->for_resident == 'yes' ? 'selected' : '' }}>yes</option>
                        <option value="no" {{ $service->for_resident == 'no' ? 'selected' : '' }}>no</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $service->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" style="height: 61px">
                </div>
            </div>
            <div class="row d-flex card" style="justify-content: center; width: fit-content; margin: auto">
                @if ($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image"
                        style="max-width: 200px; margin: 8px;">
                @else
                    <div>(Image is empty)</div>
                @endif
            </div>
            <div class="row d-flex" style="justify-content: center;">
                <button type="submit" class="col-5 col-md-3 btn btn-primary w-100 mt-10"
                    style="font-weight: 500; box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.126);">Update</button>
            </div>
        </form>
    </div>

    <script></script>
@endsection
