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
        <h3 class="mb-4 text-center">Buy apartment request</h3>
        <div class="footer-shipping pt-65 pb-55 pb-xs-25">
            <div class="row">
                <!-- Begin Waiting Area -->
                <div class="col-lg-4 col-md-4 col-sm-4 pb-sm-55 pb-xs-55">
                    <div class="li-shipping-inner-box">
                        <div class="shipping-icon" style="color: gray; font-size: 30px; margin:0; padding: 0">
                            <a onclick="toggleResponsingTable()" class="i-toggle toggle-responsing active"><i class="fa-solid fa-hourglass-start"></i></a>
                        </div>
                        <div class="shipping-text">
                            <h2>Responsing</h2>
                        </div>
                    </div>
                </div>
                <!-- Waiting Area End Here -->
                <!-- Begin Approved Area -->
                <div class="col-lg-4 col-md-4 col-sm-4 pb-sm-55 pb-xs-55">
                    <div class="li-shipping-inner-box">
                        <div class="shipping-icon" style="color: gray; font-size: 30px; margin:0; padding: 0">
                            <a onclick="toggleApprovedTable()" class="i-toggle toggle-approved"><i class="fa-solid fa-list-check"></i></a>
                        </div>
                        <div class="shipping-text">
                            <h2>Approved</h2>
                        </div>
                    </div>
                </div>
                <!-- Approved Area End Here -->
                <!-- Begin Denied Area -->
                <div class="col-lg-4 col-md-4 col-sm-4 pb-xs-30">
                    <div class="li-shipping-inner-box">
                        <div class="shipping-icon" style="color: gray; font-size: 30px; margin:0; padding: 0">
                            <a onclick="toggleDeniedTable()" class="i-toggle toggle-denied"><i class="fa-solid fa-ban"></i></a>
                        </div>
                        <div class="shipping-text">
                            <h2>Denied</h2>
                        </div>
                    </div>
                </div>
                <!-- Denied Area End Here -->
            </div>
        </div>
    </div>
</div>


<div class="responsing container wishlist-area pb-60 mr-auto ml-auto">
    <div class="container">
        <table id="requestResponsing-table" class="display">
            <thead>
                <tr>
                    <th>Apartment</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Area</th>
                    <th>Request date</th>
                    <th>Price sale</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="approved container wishlist-area pb-60 mr-auto ml-auto hidden">
    <div class="container">
        <table id="requestApproved-table" class="display">
            <thead>
                <tr>
                    <th>Apartment</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Area</th>
                    <th>Request date</th>
                    <th>Price sale</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="denied container wishlist-area pb-60 mr-auto ml-auto hidden">
    <div class="container">
        <table id="requestDenied-table" class="display">
            <thead>
                <tr>
                    <th>Apartment</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Area</th>
                    <th>Request date</th>
                    <th>Price sale</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#requestResponsing-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: '{{ route('user-getBuyRequestResponsing') }}',
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
                    data: 'status',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<div class=""badge badge-primary">Waiting</div>';
                        } else if (data == 2) {
                            return '<div class="badge badge-success">Approved</div>';
                        } else {
                            return '<div class="badge badge-danger">Denied</div>';
                        }
                    }
                },
                {
                    data: 'apartment.area',
                    render: function(data, type, row) {
                        return '<div>' + data + 'm<sup>2</sup></div>';
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
                    data: 'apartment.price_sale',
                    render: function(data, type, row) {
                        return '<div>$' + data + '</div>';
                    }
                },
                {
                    data: 'apartment.id',
                    render: function(data, type, row) {
                        return '<a class="detail-btn" href="' +
                            '{{ url('apartment') }}' + '/' + data + '">Detail</a>';
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

        $('#requestApproved-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: '{{ route('user-getBuyRequestApproved') }}',
                type: 'GET',
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
                    data: 'status',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<div class="badge status-primary">Waiting</div>';
                        } else if (data == 2) {
                            return '<div class="badge status-success">Approved</div>';
                        } else {
                            return '<div class="badge status-danger">Denied</div>';
                        }
                    }
                },
                {
                    data: 'apartment.area',
                    render: function(data, type, row) {
                        return '<div>' + data + 'm<sup>2</sup></div>';
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
                    data: 'apartment.price_sale',
                    render: function(data, type, row) {
                        return '<div>$' + data + '</div>';
                    }
                },
                {
                    data: 'apartment.id',
                    render: function(data, type, row) {
                        return '<a class="detail-btn" href="' +
                            '{{ url('apartment') }}' + '/' + data + '">Detail</a>';
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

        $('#requestDenied-table').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: '{{ route('user-getBuyRequestDenied') }}',
                type: 'GET',
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
                    data: 'status',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<div class=""badge badge-primary">Waiting</div>';
                        } else if (data == 2) {
                            return '<div class="badge badge-success">Approved</div>';
                        } else {
                            return '<div class="badge badge-danger">Denied</div>';
                        }
                    }
                },
                {
                    data: 'apartment.area',
                    render: function(data, type, row) {
                        return '<div>' + data + 'm<sup>2</sup></div>';
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
                    data: 'apartment.price_sale',
                    render: function(data, type, row) {
                        return '<div>$' + data + '</div>';
                    }
                },
                {
                    data: 'apartment.id',
                    render: function(data, type, row) {
                        return '<a class="detail-btn" href="' +
                            '{{ url('apartment') }}' + '/' + data + '">Detail</a>';
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

    function toggleResponsingTable() {
        $(".responsing").removeClass("hidden");
        $(".approved").addClass("hidden");
        $(".denied").addClass("hidden");

        $(".toggle-responsing").addClass("active");
        $(".toggle-approved").removeClass("active");
        $(".toggle-denied").removeClass("active");
    }

    function toggleApprovedTable() {
        $(".responsing").addClass("hidden");
        $(".approved").removeClass("hidden");
        $(".denied").addClass("hidden");
        
        $(".toggle-responsing").removeClass("active");
        $(".toggle-approved").addClass("active");
        $(".toggle-denied").removeClass("active");
    }

    function toggleDeniedTable() {
        $(".responsing").addClass("hidden");
        $(".approved").addClass("hidden");
        $(".denied").removeClass("hidden");

        $(".toggle-responsing").removeClass("active");
        $(".toggle-approved").removeClass("active");
        $(".toggle-denied").addClass("active");
    }
</script>
