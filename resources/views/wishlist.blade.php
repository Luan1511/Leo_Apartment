@extends('layouts.app')

@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home-page') }}">Home</a></li>
                    <li class="active">Wish list</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->

    <!--Wishlist Area start-->
    <div class="wishlist-area pt-60 pb-60">
        <div class="container">
            <table id="wishlist-table" class="display">
                <thead>
                    <tr>
                        <th>Apartment number</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Floor</th>
                        <th>Area</th>
                        <th>Price per month</th>
                        <th>Price sale</th>
                        <th>Bedroom</th>
                        <th>Bathroom</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    {{-- End wishlist --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#wishlist-table').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: false,
                ajax: {
                    url: '{{ route('getWishlist') }}',
                    type: 'GET',
                    error: function(xhr, status, error) {
                        if (xhr.status === 500) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Unindetify Error',
                                text: 'You are not authorized to access this website',
                                confirmButtonText: 'Return to home',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('home-page') }}";
                                }
                            });
                        } else if (xhr.status === 401) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Unauthorized',
                                text: 'You are not authorized to access this website',
                                confirmButtonText: 'Return to home',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('home-page') }}";
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Có lỗi xảy ra: ' + (xhr.responseJSON?.message ||
                                    'Không xác định'),
                                confirmButtonText: 'Return to home',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('home-page') }}";
                                }
                            });
                        }
                    }
                },
                columns: [{
                        data: 'apartment_number'
                    },
                    {
                        data: 'image',
                        render: function(data, type, row) {
                            if (data && data.trim() !== '') {
                                return '<img src="{{ asset('') }}' + 'storage/' + data +
                                    '" alt="account image" width="100" height="100">';
                            } else {
                                return '<div>(Empty)</div>';
                            }
                        }
                    },
                    {
                        data: 'type',
                        render: function(data, type, row) {
                            if (data == 1) {
                                return '<div>V.I.P</div>';
                            } else if (data == 2) {
                                return '<div>Casual</div>';
                            } else {
                                return '<div>Studio</div>';
                            }
                        }
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data == 1) {
                                return '<div>Empty</div>';
                            } else if (data == 2) {
                                return '<div>Saled</div>';
                            } else {
                                return '<div>Responsing</div>';
                            }
                        }
                    },
                    {
                        data: 'floor',
                    },
                    {
                        data: 'area',
                        render: function(data, type, row) {
                            return '<div>' + data + 'm<sup>2</sup></div>';
                        }
                    },
                    {
                        data: 'price_per_month',
                        render: function(data, type, row) {
                            return '<div>$' + data + '</div>';
                        }
                    },
                    {
                        data: 'price_sale',
                        render: function(data, type, row) {
                            return '<div>$' + data + '</div>';
                        }
                    },
                    {
                        data: 'bed',
                    },
                    {
                        data: 'bath',
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                '{{ url('wishlist') }}' + '/' + data + '/delete">Delete</a>' ;
                            //     '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                            // '{{ url('wishlist') }}' + '/' + data + '/delete">Delete</a>';
                        }
                    },
                ],
                initComplete: function() {
                    $('.dataTables_info').hide();
                    $('.dataTables_info').hide();
                    $('label').hide();
                }
            });
        });
    </script>
@endsection
