@foreach ($apartments as $apartment)
    <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
        <!-- single-product-wrap start -->
        <div class="single-product-wrap">
            <div class="product-image">
                <a href="{{ url('apartment/' . $apartment->id) }}">
                    <img src="{{ asset('storage/' . $apartment->image) }}" alt="Li's Product Image">
                </a>
                <span class="sticker">New</span>
            </div>
            <div class="product_desc">
                <div class="product_desc_info">
                    <div class="product-review" style="display: flex">
                        <div class="col-6" style="padding-left: 0">
                            @if ($apartment->type === 1)
                                <h5 class="manufacturer">VIP</h5>
                            @elseif ($apartment->type === 2)
                                <h5 class="manufacturer">Casual</h5>
                            @endif
                        </div>
                        <div class="col-8 d-flex" style="text-align: end; padding-left: 0">
                            <i class="fa fa-bed mr-2" aria-hidden="true"> {{ $apartment->bed }}</i>
                            <i class="fa fa-bath" aria-hidden="true"> {{ $apartment->bath }}</i>
                        </div>
                    </div>
                    <h4>
                        <a class="product_name" href="single-product.html">{{ $apartment->apartment_number }}</a>
                    </h4>
                    <div class="price-box">
                        <span class="new-price" style="color: rgb(255, 77, 0)">Price per month</span><span
                            class="new-price">${{ $apartment->price_per_month }}</span>
                    </div>
                    <div class="price-box">
                        <span class="new-price" style="color: rgb(22, 169, 105)">Price for sale</span><span
                            class="new-price">${{ $apartment->price_sale }}</span>
                    </div>
                </div>
                <div class="add-actions">
                    @auth
                        <ul class="add-actions-link">
                            <li class="add-cart active"><a href="{{ url('apartment/' . $apartment->id . '/buy') }}">Buy</a>
                            </li>
                            <li><a class="links-details" href="{{ url('wishlist/' . $apartment->id . '/add') }}"><i
                                        class="fa fa-heart-o"></i></a></li>
                            <li><a href="{{ url('apartment/' . $apartment->id . '/rent') }}" title="rent"
                                    class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i
                                        class="fa fa-money"></i></a></li>
                        </ul>
                    @else
                        <ul class="add-actions-link">
                            <li class="add-cart active"><a onclick="showLoginAlert()">Buy</a>
                            </li>
                            <li><a class="links-details" onclick="showLoginAlert()"><i class="fa fa-heart-o"></i></a>
                            </li>
                            <li><a title="rent" class="quick-view-btn" data-toggle="modal"
                                    data-target="#exampleModalCenter"><i class="fa fa-money"></i></a></li>
                        </ul>
                    @endauth
                </div>
            </div>
        </div>
        <!-- single-product-wrap end -->
    </div>
@endforeach
