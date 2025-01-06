<Style>
    .hidden{
        display: none;
    }

    .active {
        color: #2177d4 !important;
    }
</Style>

<div class="col-md-6">
    <div class="shadow-sm rounded-3 p-4 ">
        <h3 class="mb-4 mt-100 text-center">Your bills</h3>
    </div>
</div>


<div class="responsing container wishlist-area pb-60 mr-auto ml-auto">
    <div class="container" style="border: solid 1px rgb(198, 198, 198); border-radius: 10px">
        <h4 class="mt-20 text-center">Bills rent apartment</h4>
        <table id="bills-table" class="display">
            <thead>
                <tr>
                    <th>Apartment</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Rented date</th>
                    <th>Price per month</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#inform-nav').removeClass('active-nav-user');
        $('#bills-nav').addClass('active-nav-user');
        $('#request-nav').removeClass('active-nav-user');
        $('#maintain-nav').removeClass('active-nav-user');
    });

    $(document).ready(function() {
        $('#bills-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: '{{ route('user-getRentRequestApproved') }}',
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
                    data: 'apartment.apartment_number'
                },
                {
                    data: 'apartment.image',
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
                    data: 'apartment.type',
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
                    data: 'apartment.price_per_month',
                    render: function(data, type, row) {
                        return '<div>$' + data + '</div>';
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<a class="detail-btn" href="' +
                            '{{ url('profile') }}' + '/bill/' + data + '/detail' + '">Detail</a>';
                    }
                },
            ],
            initComplete: function() {
                $('.dt-info').hide();
                $('select').hide();
                $('label').hide();
                $('.dt-paging').hide();
            }
        });
    });
</script>
