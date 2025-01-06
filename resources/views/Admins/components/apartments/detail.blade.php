@extends('Admins.admin.layout-admin')

@section('content')
    <div class="table-container">
        <div class="container py-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Apartment Details</h4>
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
                        @foreach ($images as $image)
                            <td>
                                <img src="{{ asset('storage/' . $image->image) }}" alt="Current Image"
                                    style="max-height: 200px; margin: 0 auto; margin: 10px;">
                            </td>
                        @endforeach
                    </div>
                </div>

                <!-- Specifications -->
                <div class="col-md-8">
                    <table class="table table-bordered specs-table">
                        <tbody>
                            <tr>
                                <th>Apartment number</th>
                                <td>{{ $apartment->apartment_number }}</td>
                            </tr>
                            <tr>
                                <th>Apartment type</th>
                                @if ($apartment->type == 1)
                                    <td>V.I.P</td>
                                @elseif ($apartment->type == 2)
                                    <td>Casual</td>
                                @else
                                    <td>Studio</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Status</th>
                                @if ($apartment->status == 1)
                                    <td>empty</td>
                                @elseif ($apartment->status == 2)
                                    <td>rented</td>
                                @elseif ($apartment->status == 3)
                                    <td>bold</td>
                                @else
                                    <td>wait for response</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Floor</th>
                                <td>{{ $apartment->floor }}</td>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <td>{{ $apartment->area }}</td>
                            </tr>
                            <tr>
                                <th>Price per month</th>
                                <td>${{ $apartment->price_per_month }}</td>
                            </tr>
                            <tr>
                                <th>Price sale</th>
                                <td>${{ $apartment->price_sale }}</td>
                            </tr>
                            <tr>
                                <th>Bedroom</th>
                                <td>{{ $apartment->bed }}</td>
                            </tr>
                            <tr>
                                <th>Bathroom</th>
                                <td>{{ $apartment->bath }}</td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>{{ $apartment->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
