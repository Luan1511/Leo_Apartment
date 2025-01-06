@extends('Admins.admin.layout-admin')

@section('content')
    <div class="table-container">
        <div class="container py-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Buying Request Details</h4>
                <div>
                    @if ($buyRequest->status == 1)
                        <a class="btn edit-btn me-2">
                            <i class="fas fa-edit me-1"></i> Approve
                        </a>
                        <a class="btn delete-btn">
                            <i class="fas fa-trash me-1"></i> Deny
                        </a>
                    @elseif ($buyRequest->status == 2)
                        <div>(Delivering)</div>
                    @elseif ($buyRequest->status == 3)
                        <a class="btn delete-btn">
                            <i class="fas fa-trash me-1"></i> Delete
                        </a>
                    @elseif ($buyRequest->status == 4)
                        <a class="btn delete-btn">
                            <i class="fas fa-trash me-1"></i> Delete
                        </a>
                    @endif
                </div>
            </div>

            <div class="row">
                <!-- Specifications -->
                <div class="col-md-12">
                    <table class="table table-bbuyed specs-table">
                        <tbody>
                            <tr>
                                <th>Customer</th>
                                <td>{{ $buyRequest->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>0{{ $buyRequest->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $buyRequest->email }}</td>
                            </tr>
                            <tr>
                                <th>Address</td>
                                <td>{{ $buyRequest->address }}</td>
                            </tr>
                            <tr>
                                <th>CCCD</td>
                                <td>{{ $buyRequest->CCCD }}</td>
                            </tr>
                            <tr>
                                <th>Order date</th>
                                <td>{{ $buyRequest->created_at }}</td>
                            </tr>
                            <tr>
                                <th>CCCD image</th>
                                <td><img src="{{ asset('storage/' . $buyRequest->CCCD_image) }}" alt=""
                                        height="150px"></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                @if ($buyRequest->status == 1)
                                    <td>Not approved yet</td>
                                @elseif ($buyRequest->status == 2)
                                    <td>Delivering</td>
                                @elseif ($buyRequest->status == 3)
                                    <td>Denied</td>
                                @elseif ($buyRequest->status == 4)
                                    <td>Delivered</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Detail --}}
            <h4 class="mt-40">Laptops:</h4>
            <table id="laptops-buy-table" class="table table-bbuyed specs-table" style="width: 100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Apartment number</th>
                        <th>Price per month</th>
                        <th>Price sale</th>
                        <th>Type</th>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('storage/' . $apartment->image) }}" alt="" width="150px"></td>
                        <td>{{ $apartment->apartment_number }}</td>
                        <td>${{ $apartment->price_per_month }}</td>
                        <td>${{ $apartment->price_sale }}</td>
                        @if ($apartment->type == 1)
                            <td>V.I.P</td>
                        @elseif ($apartment->type == 2)
                            <td>Casual</td>
                        @else
                            <td>Studio</td>
                        @endif
                    </tr>
                </thead>
            </table>


        </div>
    </div>
@endsection
