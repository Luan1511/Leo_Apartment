@extends('Admins.admin.layout-admin')

@section('content')
    <div class="form-container">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="title-content">Edit apartment</div>

        <form action="{{ url('admin/apartment/' . $apartment->id . '/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="number" class="form-label">Apartment number</label>
                    <input type="text" class="form-control" id="number" name="number"
                        value="{{ $apartment->apartment_number }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="">Select a type</option>
                        <option value="1" {{ $apartment->type == 1 ? 'selected' : '' }}>V.I.P</option>
                        <option value="2" {{ $apartment->type == 2 ? 'selected' : '' }}>Casual</option>
                        <option value="3" {{ $apartment->type == 3 ? 'selected' : '' }}>Studio</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="">Select a status</option>
                        <option value="1" {{ $apartment->status == 1 ? 'selected' : '' }}>empty</option>
                        <option value="2" {{ $apartment->status == 2 ? 'selected' : '' }}>rented</option>
                        <option value="3" {{ $apartment->status == 3 ? 'selected' : '' }}>bold</option>
                        <option value="4" {{ $apartment->status == 4 ? 'selected' : '' }}>delivered</option>
                        <option value="5" {{ $apartment->status == 5 ? 'selected' : '' }}>maintenancing</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="floor" class="form-label">Floor</label>
                    <input type="text" class="form-control" id="floor" name="floor"
                        value="{{ $apartment->floor }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="area" class="form-label">Area</label>
                    <input type="text" class="form-control" id="area" name="area"
                        value="{{ $apartment->area }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="bed" class="form-label">Bedroom</label>
                    <input type="text" class="form-control" id="bed" name="bed"
                        value="{{ $apartment->bed }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="bath" class="form-label">Bathroom</label>
                    <input type="text" class="form-control" id="bath" name="bath"
                        value="{{ $apartment->bath }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price_per_month" class="form-label">Price per month</label>
                    <input type="text" class="form-control" id="price_per_month" name="price_per_month"
                        value="{{ $apartment->price_per_month }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="price_sale" class="form-label">Price sale</label>
                    <input type="text" class="form-control" id="price_sale" name="price_sale"
                        value="{{ $apartment->price_sale }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $apartment->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" style="height: 61px">
                </div>
            </div>
            <div class="row d-flex card" style="justify-content: center; width: fit-content; margin: auto">
                @if ($apartment->image)
                    <img src="{{ asset('storage/' . $apartment->image) }}" alt="Current Image"
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
