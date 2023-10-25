@extends('front-layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front-office/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ env('APP_NAME') }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Accueil</a>
                            <span>Boutique</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Catégorie</h4>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a class="{{ $request->category == $category->id ? 'active' : '' }}" href="{{ route('shop', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                                @endforeach
                                <input id="category" class="d-none" type="text" value="{{ $request->category }}">
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Prix</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{ $min_price }}" data-max="{{ $max_price }}">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input disabled type="text" id="minamount">
                                        <input disabled type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Produits récents</h4>
                                <div class="latest-product__slider owl-carousel">
                                    @foreach ($latest_products as $sub_latest_products)
                                        <div class="latest-prdouct__slider__item">
                                            @foreach ($sub_latest_products as $product)
                                                <a href="{{ route('shop-details', ['product_id' => $product->id]) }}" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="{{ $product->image }}" alt="Image du produit">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>{{ $product->name }}</h6>
                                                        <span>{{ $product->price }} FCFA</span>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    {{-- <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('front-office/img/product/discount/pd-1.jpg')}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('front-office/img/product/discount/pd-2.jpg')}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Vegetables</span>
                                            <h5><a href="#">Vegetables’package</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('front-office/img/product/discount/pd-3.jpg')}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Mixed Fruitss</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('front-office/img/product/discount/pd-4.jpg')}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('front-office/img/product/discount/pd-5.jpg')}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{ asset('front-office/img/product/discount/pd-6.jpg')}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="filter__sort text-left">
                                    <span>Trier par</span>
                                    <select id="sort-by">
                                        <option @if($request->sort_by === 'DESC') selected @endif value="DESC">Le plus récent</option>
                                        <option @if($request->sort_by === 'ASC') selected @endif value="ASC">Le plus ancien</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="filter__found">
                                    <h6 class="text-left text-md-right"><span>{{ $products->total() }}</span> articles trouvés</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $product->image }}">
                                        <ul class="product__item__pic__hover">
                                            <li>
                                                <a class="toggle-to-wishlist {{ (in_array($product->id, $wishlist['ids']) ? 'active' : '') }} " data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-image="{{$product->image}}" data-remove="{{ in_array($product->id, $wishlist['ids']) ? 'true' : 'false' }}"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li>
                                                <a class="toggle-to-cart {{ (in_array($product->id, $cart['ids']) ? 'active' : '') }}" data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-quantity="1" data-image="{{$product->image}}" data-remove="{{ in_array($product->id, $cart['ids']) ? 'true' : 'false' }}"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>
                                            <a href="{{ route('shop-details', ['product_id' => $product->id]) }}">{{ $product->name }}</a>
                                        </h6>
                                        <h5>{{ $product->price }} FCFA</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            /*-----------------------
                Price Range Slider
            ------------------------ */
            var rangeSlider = $(".price-range"),
                minamount = $("#minamount"),
                maxamount = $("#maxamount"),
                minPrice = rangeSlider.data('min'),
                maxPrice = rangeSlider.data('max');
            if ('{{ $request->min_price }}') {
                minamount.val('{{ $request->min_price }}' + ' FCFA');
            } else {
                minamount.val(minPrice ? (minPrice + ' FCFA') : '');
            }

            if ('{{ $request->max_price }}') {
                maxamount.val('{{ $request->max_price }}' + ' FCFA');
            } else {
                maxamount.val(maxPrice ? (maxPrice + ' FCFA') : '');
            }

            rangeSlider.slider({
                range: true,
                min: minPrice,
                max: maxPrice,
                values: [minamount.val()?.replace(' FCFA', ''), maxamount.val()?.replace(' FCFA', '')],
                stop: function (event, ui) {
                    minamount.val(ui.values[0] ? (ui.values[0] + ' FCFA') : '');
                    maxamount.val(ui.values[0] ? (ui.values[1] + ' FCFA') : '');
                    minamount.trigger('change');
                    maxamount.trigger('change');
                },
            });
            minamount.val(rangeSlider.slider("values", 0) ? (rangeSlider.slider("values", 0) + ' FCFA') : '');
            maxamount.val(rangeSlider.slider("values", 1) ? (rangeSlider.slider("values", 1) + ' FCFA') : '');


            $('#sort-by').on('change', function() {
                window.location.href = '{{ env('APP_REAL_URL') }}' + '/shop' + '?sort_by=' + $('#sort-by').val() + '&min_price=' + minamount.val()?.replace(' FCFA', '') + '&max_price=' + maxamount.val()?.replace(' FCFA', '') + ($('#category').val() ? '&category=' + $('#category').val() : '') + ('{{ $request->search }}' ? '&search=' + '{{ $request->search }}' : '');
            });

            minamount.on('change', function() {
                window.location.href = '{{ env('APP_REAL_URL') }}' + '/shop' + '?sort_by=' + $('#sort-by').val() + '&min_price=' + minamount.val()?.replace(' FCFA', '') + '&max_price=' + maxamount.val()?.replace(' FCFA', '') + ($('#category').val() ? '&category=' + $('#category').val() : '') + ('{{ $request->search }}' ? '&search=' + '{{ $request->search }}' : '');
            });

            maxamount.on('change', function() {
                window.location.href = '{{ env('APP_REAL_URL') }}' + '/shop' + '?sort_by=' + $('#sort-by').val() + '&min_price=' + minamount.val()?.replace(' FCFA', '') + '&max_price=' + maxamount.val()?.replace(' FCFA', '') + ($('#category').val() ? '&category=' + $('#category').val() : '') + ('{{ $request->search }}' ? '&search=' + '{{ $request->search }}' : '');
            });

            window.cart = <?php echo json_encode($cart['products']); ?>;
            window.wishlist = <?php echo json_encode($wishlist['products']); ?>;

            $('.toggle-to-cart').on('click', function(event) {
                var cart = window.cart || [];
                console.log('here is cart', $(this).data('id'), $(this).data('remove'));

                if (!$(this).data('remove')) {
                    cart.push({
                        'id': $(this).data('id'),
                        'name': $(this).data('name'),
                        'image': $(this).data('image'),
                        'price': $(this).data('price'),
                        'quantity': $(this).data('quantity')
                    });
                } else {
                    cart = cart?.filter(item => item?.id !== $(this).data('id'));
                }
                console.log(cart);
                $.ajax('{{ env('APP_REAL_URL') }}' + '/cart', {
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "cart":JSON.stringify(cart)
                    },
                    success: function (data, status, xhr) {
                        window.location.reload();
                        window.cart = data['products'];
                    }
                });
            });

            $('.toggle-to-wishlist').on('click', function(event){
                var wishlist = window.wishlist || [];
                console.log('here is wishlist', $(this).data('id'), $(this).data('remove'));
                if (!$(this).data('remove')) {
                    wishlist.push({
                        'id': $(this).data('id'),
                        'name': $(this).data('name'),
                        'image': $(this).data('image'),
                        'price': $(this).data('price'),
                    });
                } else {
                    wishlist = wishlist?.filter(item => item?.id !== $(this).data('id'));
                }

                const data = {
                        "_token": "{{ csrf_token() }}",
                        "wishlist": JSON.stringify(wishlist)
                    }
                $.ajax('{{ env('APP_REAL_URL') }}' + '/wishlist', {
                    type: 'POST',
                    data,
                    success: function (data, status, xhr) {
                        window.location.reload();
                        window.wishlist = data['products'];
                    }
                });
            });
        });
    </script>
@endsection
