@foreach ($services as $service)
    <div class="col">
        <div class="row product-layout-list last-child">
            <div class="col-lg-3 col-md-5 ">
                <div class="product-image">
                    <a href="{{url('service/' . $service->id)}}">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="Li's Product Image"
                            style="height: 200px">
                    </a>
                    <span class="sticker">New</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-7">
                <div class="product_desc">
                    <div class="product_desc_info">
                        <div class="product-review">
                            <h5 class="manufacturer">
                                <a href="product-details.html">Graphic Corner</a>
                            </h5>
                            <div class="rating-box">
                                <ul class="rating">
                                    @if ($service->rating >= 1)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($service->rating >= 0 && $service->rating < 1)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif

                                    @if ($service->rating >= 2)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($service->rating >= 1 && $service->rating < 2)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif

                                    @if ($service->rating >= 3)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($service->rating >= 2 && $service->rating < 3)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif

                                    @if ($service->rating >= 4)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($service->rating >= 3 && $service->rating < 4)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif

                                    @if ($service->rating == 5)
                                        <li><i class="fa fa-star"></i></li>
                                    @elseif ($service->rating >= 4 && $service->rating < 5)
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <h4><a class="product_name" href="single-product.html">{{ $service->name }} </a>
                        </h4>
                        <div class="price-box">
                            <span class="new-price">From ${{ $service->price }}</span>
                        </div>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="shop-add-action">
                    <ul class="add-actions-link">
                        <li class="add-cart"><a href="#">Book/Rent</a></li>
                        </li>
                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"
                                href="#"><i class="fa fa-eye"></i>Quick view</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
