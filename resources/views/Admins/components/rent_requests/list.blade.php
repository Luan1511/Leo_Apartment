@extends('Admins.admin.layout-admin')

@section('content')
    <div class="table-container">
<<<<<<< HEAD:resources/views/Admins/components/rent_requests/list.blade.php
        <div class="title-content">Rent requests</div>
        {{-- <a href="{{ route('admin-addLaptop') }}" class="add-btn mr-10 bg-warning">
            Not approved yet
        </a>
        <a href="{{ route('admin-addLaptop') }}" class="add-btn">
            Approved
        </a> --}}
        <table id="requests-table" class="display">
=======
        <div class="title-content">Orders</div>
        <div class="mb-50 mt-20">
            <a style="cursor: pointer" onclick="displayNotApprTable()" class="add-btn mr-10 bg-warning">
                Not approved yet
            </a>
            <a style="cursor: pointer" onclick="displayApprTable()" class="add-btn mr-20">
                Approved
            </a>
            <a style="cursor: pointer" onclick="displayAllTable()" class="edit-btn">
                All
            </a>
        </div>
        <table id="orders-table" class="display">
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/Admins/components/orders/list.blade.php
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Request date</th>
                    <th>Apartment number</th>
                    <th>Total price</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <table id="notApprove-orders-table" class="display hide">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Order date</th>
                    <th>Total price</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <table id="approve-orders-table" class="display hide">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Order date</th>
                    <th>Total price</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
<<<<<<< HEAD:resources/views/Admins/components/rent_requests/list.blade.php
            $('#requests-table').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: false,
                ajax: '{{ route('admin-getRentRequest') }}',
=======
            $('#orders-table').DataTable({
                autoWidth: true,
                processing: true,
                serverSide: false,
                paging: false,
                searching: false,
                info: false,
                lengthChange: false,
                ajax: '{{ route('admin-getOrder') }}',
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/Admins/components/orders/list.blade.php
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'created_at',
                        render: function(data, type, row) {
                            const date = new Date(data);
                            const day = String(date.getDate()).padStart(2, '0');
                            const month = String(date.getMonth() + 1).padStart(2, '0');
                            const year = date.getFullYear();
                            return day + '/' + month + '/' + year;
                        }
                    },
                    {
                        data: 'apartment.apartment_number'
                    },
                    {
                        data: 'apartment.price_sale',
                        render: function(data, type, row) {
                            return '<div>$' + data + '</div>';
                        }
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'phone',
                        render: function(data, type, row) {
                            return '<div>0' + data + '</div>';
                        }
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data == 1) {
                                return '<span class="badge badge-warning">Not approved yet</span>';
                            } else if (data == 2) {
                                return '<span class="badge badge-primary">Approved</span>';
                            } else if (data == 4) {
                                return '<span class="badge badge-primary">Competed</span>';
                            }
                            // else if (data == 'shipped') {
                            //     return '<span class="badge badge-info">Shipped</span>';
                            // }
                        }
                    },
                    {
                        type: 'status',
                        data: 'id',
                        render: function(data, type, row) {
                            switch (row.status) {
                                case 1:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/rentRequest') }}' + '/' + data +
                                        '/detail">Detail</a>' +
<<<<<<< HEAD:resources/views/Admins/components/rent_requests/list.blade.php
                                        '<a class="edit-btn" href="' + '{{ url('admin/rentRequest') }}' +
=======
                                        '<a class="edit-btn" href="' + '{{ url('admin/order') }}' +
                                        '/' +
                                        data + '/approve">Approve</a>';
                                    break;
                                case 2:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<div class="detail-btn">Wait for delivering</div>';
                                    break;
                                case 3:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                                case 4:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                                default:
                                    return '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                            }
                        }
                    }
                ],
                initComplete: function() {
                    $('.dataTables_info').hide();
                    $('.dataTables_info').hide();
                }
            });

            $('#notApprove-orders-table').DataTable({
                autoWidth: true,
                processing: true,
                serverSide: false,
                paging: false,
                searching: false,
                info: false,
                lengthChange: false,
                ajax: '{{ route('admin-getOrderNotApproved') }}',
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'total_price'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data == 1) {
                                return '<span class="badge badge-warning">Not approved yet</span>';
                            } else if (data == 2) {
                                return '<span class="badge badge-primary">Approved</span>';
                            } else if (data == 4) {
                                return '<span class="badge badge-primary">Competed</span>';
                            }
                            // else if (data == 'shipped') {
                            //     return '<span class="badge badge-info">Shipped</span>';
                            // } 
                        }
                    },
                    {
                        type: 'status',
                        data: 'id',
                        render: function(data, type, row) {
                            switch (row.status) {
                                case 1:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="edit-btn" href="' + '{{ url('admin/order') }}' +
                                        '/' +
                                        data + '/approve">Approve</a>';
                                    break;
                                case 2:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<div class="detail-btn">Wait for delivering</div>';
                                    break;
                                case 3:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                                case 4:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                                default:
                                    return '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                            }
                        }
                    }
                ],
                initComplete: function() {
                    $('.dataTables_info').hide();
                    $('.dataTables_info').hide();
                }
            });

            $('#approve-orders-table').DataTable({
                autoWidth: true,
                processing: true,
                serverSide: false,
                paging: false,
                searching: false,
                info: false,
                lengthChange: false,
                ajax: '{{ route('admin-getOrderApproved') }}',
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'total_price'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data == 1) {
                                return '<span class="badge badge-warning">Not approved yet</span>';
                            } else if (data == 2) {
                                return '<span class="badge badge-primary">Approved</span>';
                            } else if (data == 4) {
                                return '<span class="badge badge-primary">Competed</span>';
                            }
                            // else if (data == 'shipped') {
                            //     return '<span class="badge badge-info">Shipped</span>';
                            // } 
                        }
                    },
                    {
                        type: 'status',
                        data: 'id',
                        render: function(data, type, row) {
                            switch (row.status) {
                                case 1:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/order') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="edit-btn" href="' + '{{ url('admin/order') }}' +
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10:resources/views/Admins/components/orders/list.blade.php
                                        '/' +
                                        data + '/approve">Approve</a>';
                                    break;
                                case 2:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/rentRequest') }}' + '/' + data +
                                        '/detail">Detail</a>';
                                    break;
                                case 3:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/rentRequest') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/rentRequest') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                                default:
                                    return '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/rentRequest') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                            }
                        }
                    }
                ],
                initComplete: function() {
                    $('.dataTables_info').hide();
                    $('.dataTables_info').hide();
                }
            });
        });

        function displayNotApprTable() {
            $('#notApprove-orders-table').removeClass('hide');
            $('#approve-orders-table').addClass('hide');
            $('#orders-table').addClass('hide');
        }

        function displayApprTable() {
            $('#notApprove-orders-table').addClass('hide');
            $('#approve-orders-table').removeClass('hide');
            $('#orders-table').addClass('hide');
        }

        function displayAllTable() {
            $('#notApprove-orders-table').addClass('hide');
            $('#approve-orders-table').addClass('hide');
            $('#orders-table').removeClass('hide');
        }
    </script>
@endsection
