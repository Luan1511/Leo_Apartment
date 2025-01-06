@extends('Admins.admin.layout-admin')

@section('content')
    <div class="table-container">
        <div class="title-content">Apartments</div>
        <a href="{{ route('admin-showAddService') }}" class="add-btn">
            Add Service
        </a>
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

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#apartments-table').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: false,
                ajax: '{{ route('admin-getService') }}',
                columns: [{
                        data: 'id',
                        render: function(data, type, row) {
                            return '<a class="detail-btn" href="' + '{{ url('admin/service') }}' +
                                '/' + data + '/detail">' + data + '</a>';
                        }
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'img_url',
                        render: function(data, type, row) {
                            return '<img src="' + data +
                                '" alt="apartmrent image" width="100px" height="100px">';
                        }
                    },
                    {
                        data: 'price',
                        render: function(data, type, row) {
                            return '<div>$' + data + '</div>';
                        }
                    },
                    {
                        data: 'for_resident'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return '<a class="delete-btn" onclick="return confirm(\'Are you sure?\')" href="' +
                                '{{ url('admin/service') }}' + '/' + data + '/delete">Delete</a>' +
                                '<a class="edit-btn" href="' + '{{ url('admin/service') }}' + '/' +
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
