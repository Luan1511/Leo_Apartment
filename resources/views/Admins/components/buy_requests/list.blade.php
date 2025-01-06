@extends('Admins.admin.layout-admin')

@section('content')
    <div class="table-container">
        <div class="title-content">Buy requests</div>
        {{-- <a href="{{ route('admin-addLaptop') }}" class="add-btn mr-10 bg-warning">
            Not approved yet
        </a>
        <a href="{{ route('admin-addLaptop') }}" class="add-btn">
            Approved
        </a> --}}
        <table id="requests-table" class="display">
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
    </div>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#requests-table').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: false,
                ajax: '{{ route('admin-getBuyRequest') }}',
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
                            const customerId = row.customer.id;

                            switch (row.status) {
                                case 1:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/buyRequest') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="edit-btn" href="' + '{{ url('admin/buyRequest') }}' +
                                        '/' +
                                        data + '/' + customerId + '/approve">Approve</a>';
                                    break;
                                case 2:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/buyRequest') }}' + '/' + data +
                                        '/detail">Detail</a>';
                                    break;
                                case 3:
                                    return '<a class="success-btn" href="' +
                                        '{{ url('admin/buyRequest') }}' + '/' + data +
                                        '/detail">Detail</a>' +
                                        '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/buyRequest') }}' + '/' + data +
                                        '/delete">Delete</a>';
                                    break;
                                default:
                                    return '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                        '{{ url('admin/buyRequest') }}' + '/' + data +
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
    </script>
@endsection
