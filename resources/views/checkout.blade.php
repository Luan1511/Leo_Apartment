@extends('layouts.app')

@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ route('home-page') }}">Home</a></li>
                    <li class="active">Check out</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->

    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            {{-- <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                    </div>
                </div>
<<<<<<< HEAD
            </div>


            @if ($action == 1 || $action == 2)
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form method="POST"
                            @if ($action == 1) action="{{ url('checkout/buyApart') }}"
                            @elseif ($action == 2)
                            action="{{ url('checkout/rentApart') }}" @endif
                            enctype="multipart/form-data">
                            @csrf
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Name <span class="required">*</span></label>
                                            <input placeholder="Name" type="text" name="name">
                                        </div>
=======
            </div> --}}
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="#" method="POST">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Name <span class="required">*</span></label>
                                        <input placeholder="Name" type="text">
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input placeholder="address" type="text" name="address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="" type="email" value="{{ Auth::user()->email }}"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="number" value="{{ Auth::user()->phone }}" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Citizen identification card<span class="required">*</span></label>
                                            <input placeholder="VD: 0490000005" type="number" name="cccdNumber">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>CCCD image<span class="required">*</span></label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                style="height: 44px" name="">
                                        </div>
                                    </div>
                                    @if ($action == 2)
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Checkin date <span class="required"
                                                        style="font-size: 12px; top: -5px">(optional)</span></label>
                                                <input type="date" class="form-control" id="checkin_date"
                                                    name="checkin_date" style="height: 44px" name="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Checkout date <span class="required"
                                                        style="font-size: 12px; top: -5px">(optional)</span></label>
                                                <input type="date" class="form-control" id="checkout_date"
                                                    name="checkout_date" style="height: 44px" name="">
                                            </div>
                                        </div>
                                    @endif
                                    <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                                    @if ($action == 1)
                                        <input value="Buy" type="submit" class="mb-10 " style="cursor: pointer">
                                    @elseif ($action == 2)
                                        <input value="Rent" type="submit" class="mb-10 " style="cursor: pointer">
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Apartment</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Aparment number: </th>
                                        <td>{{ $apartment->apartment_number }} </td>
                                    </tr>
<<<<<<< HEAD
                                    <tr>
                                        <th>Type: </th>
                                        @if ($apartment->type == 1)
                                            <td>V.I.P</td>
                                        @elseif ($apartment->type == 2)
                                            <td>Casual</td>
                                        @else
                                            <td>Studio</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Price:</th>
                                        <td>${{ $apartment->price_sale }} </td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td style="color: #6369CD; font-size: 17px">${{ $apartment->price_sale }} </td>
                                    </tr>
                                </table>
                            </div>
                            {{-- <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        <div style="font-size: 20px; font-weight: 500; margin-bottom: 10px;">Payment method
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                
=======
                                <tbody>
                                    @foreach ($cart->data as $cartItem)
                                        <tr class="cart_item">
                                            <td class="cart-product-name">{{ $cartItem->name }} <strong
                                                    class="product-quantity"> × {{ $cartItem->quantity }} </strong></td>
                                            <td class="cart-product-total"><span
                                                    class="amount">${{ $cartItem->price * $cartItem->quantity }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">Voucher</td>
                                        <td class="cart-product-total"><span class="amount"></span><span
                                                id="voucher-discount">0%</span></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">$</span><span
                                                id="cart-subtotal">{{ $cart->total_price }}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td>
                                            <strong>
                                                <span class="amount">$</span><span
                                                    id="order-total">{{ $cart->total_price }}</span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="voucher-fld d-flex" style="font-size: 12px !important">
                            <input type="text" id="coupon_code" class="input-text" placeholder="Coupon code"
                                value="">
                            <input type="button" class="btn btn-primary apply-coupon col-3" value="Apply">
                        </div>

                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div style="font-size: 20px; font-weight: 500; margin-bottom: 10px;">Payment method
                                    </div>
                                    @foreach ($payments as $payment)
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h5 class="panel-title d-flex" style="align-items: center">
                                                    <input id="{{ $payment->id }}" type="checkbox"
                                                        style="width: 20px; margin-right: 10px">
                                                    <a class="" data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        {{ $payment->name }}
                                                    </a>
                                                </h5>
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!--Checkout Area End-->

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('status') === 'bought')
                    Swal.fire({
                        icon: 'success',
                        title: 'Requested!',
                        text: 'Please waiting for responsing!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'rented')
                    Swal.fire({
                        icon: 'success',
                        title: 'Requested!',
                        text: 'Please waiting for responsing!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'existed')
                    Swal.fire({
                        icon: 'info',
                        title: 'Already Exists!',
                        text: 'Laptop is already in your wishlist.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'addedCart')
                    Swal.fire({
                        icon: 'success',
                        title: 'Added!',
                        text: 'Laptop has been added to your cart.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @elseif (session('status') === 'plused')
                    Swal.fire({
                        icon: 'success',
                        title: 'Plus!',
                        text: 'Laptop has been plused to your Laptop quantity.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                @endif
            });
        </script>
    @endif

    <script>
        // showlogin toggle
        $('#showlogin').on('click', function() {
            $('#checkout-login').slideToggle(900);
        });
        // showlogin toggle
        $('#showcoupon').on('click', function() {
            $('#checkout_coupon').slideToggle(900);
        });
        // showlogin toggle
        $('#cbox').on('click', function() {
            $('#cbox-info').slideToggle(900);
        });

        // showlogin toggle
        $('#ship-box').on('click', function() {
            $('#ship-box-info').slideToggle(1000);
        });
<<<<<<< HEAD
=======

        // Payment Method
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('admin-getPayment') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data.data, function(index, brand) {
                        $('#payment').append($('<option>', {
                            value: brand.id,
                            text: brand.name
                        }));
                    });
                },
                error: function() {}
            });
        });

        // Order
        function placeOrder() {
            const name = document.querySelector('input[placeholder="Name"]').value;
            const address = document.querySelector('input[placeholder="Your address"]').value;
            const email = document.querySelector('input[type="email"]').value;
            const phone = document.querySelector('input[type="number"]').value;

            if (!name || !address || !email || !phone) {
                alert(name + ' ' + address + ' ' + email + ' ' + phone);
                return;
            }

            const total = document.getElementById('order-total').innerText.trim();
            if (!total) {
                alert('Order total is missing.');
                return;
            }

            const cartData = @json($cart->data);
            const paymentMethod = document.querySelector('input[type="checkbox"]:checked');
            const paymentMethodId = paymentMethod ? paymentMethod.id : null;

            if (!paymentMethodId) {
                alert('Please select a payment method');
                return;
            }

            fetch("{{ url('checkout/place-order') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        name,
                        address,
                        email,
                        phone,
                        total,
                        cart: cartData,
                        payment_method_id: paymentMethodId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Order placed successfully!');
                        window.location.href = "{{ url('cart') }}/" + {{ Auth::user()->id }};
                    } else {
                        alert('Failed to place order');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // VOucher
        document.querySelector('.apply-coupon').addEventListener('click', function() {
            const couponCode = document.querySelector('#coupon_code').value;

            if (!couponCode) {
                alert('Please enter a voucher code');
                return;
            }

            fetch("{{ route('apply-voucher') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        coupon_code: couponCode
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const discount = data.discount;
                        const subtotal = parseFloat(document.querySelector('#cart-subtotal').textContent);
                        const newTotal = (subtotal - subtotal * discount / 100);

                        document.querySelector('#voucher-discount').textContent = discount + '%';
                        document.querySelector('#order-total').textContent = newTotal.toFixed(2);

                        Swal.fire({
                            icon: 'success',
                            text: 'The voucher was applied successfully!',
                            timer: 900,
                            showConfirmButton: false
                        });
                    } else {
                        alert(data.message || 'Invalid voucher');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    </script>
@endsection
