@extends('Admins.admin.layout-admin')

@section('content')
    <div class="table-container">
        <div class="title-content">Apartments</div>
        <a href="{{ route('admin-showAddApartment') }}" class="add-btn">
            Add Apartment
        </a>
        <table id="laptops-table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Floor</th>
                    <th>Price per month</th>
                    <th>Price sale</th>
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
            $('#laptops-table').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: false,
                ajax: '{{ route('admin-getApartment') }}',
                columns: [{
                        data: 'id',
                        render: function(data, type, row) {
                            return '<a class="detail-btn" href="' + '{{ url('admin/apartment') }}' +
                                '/' + data + '/detail">' + data + '</a>';
                        }
                    },
                    {
                        data: 'apartment_number'
                    },
                    {
                        data: 'img_url',
                        render: function(data, type, row) {
                            return '<img src="' + data +
                                '" alt="apartmrent image" width="100px" height="100px">';
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
                        data: 'floor'
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
                        data: 'id',
                        render: function(data, type, row) {
                            return '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                '{{ url('admin/apartment') }}' + '/' + data + '/delete">Delete</a>' +
                                '<a class="edit-btn" href="' + '{{ url('admin/apartment') }}' + '/' +
                                data + '/edit">Edit</a>';
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
