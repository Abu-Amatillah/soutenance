@extends('front-layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front-office/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $product->name }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Acceuil</a>
                            <a href="{{ route('shop', ['category' => $product->category_id]) }}">{{ $product->category->name }}</a>
                            <span>{{ $product->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ $product->image }}" alt="Image du produit">
                        </div>
                        {{-- <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg')}}"
                                src="{{ asset('front-office/img/product/details/thumb-1.jpg')}}" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg')}}"
                                src="{{ asset('front-office/img/product/details/thumb-2.jpg')}}" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg')}}"
                                src="{{ asset('front-office/img/product/details/thumb-3.jpg')}}" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg')}}"
                                src="{{ asset('front-office/img/product/details/thumb-4.jpg')}}" alt="">
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        <div class="product__details__rating">
                            <span class="mr-1">{{ $product->average_rating }}</span>
                            <i class="fa fa-star mr-3"></i>
                            <span>({{ $product->reviews->count() > 0 ? $product->reviews->count().' avis' : 'Aucun avis' }})</span>
                        </div>
                        <div class="product__details__price">{{ $product->price }} FCFA</div>
                        <p>
                            {{ $product->description }}
                        </p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" min="0" max="{{ $product->quantity }}" id="qty" value="{{ $cart_item ? $cart_item->quantity : 1 }}">
                                </div>
                            </div>
                        </div>
                        <a class="primary-btn toggle-product-to-cart cursor-pointer text-white">{{ in_array($product->id, $cart['ids']) ? "Modifier le panier" : "Ajouter au panier" }}</a>
                        <a class="toggle-to-wishlist heart-icon {{ (in_array($product->id, $wishlist ['ids']) ? 'active' : '') }}"  data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-image="{{$product->image}}" data-remove="{{ in_array($product->id, $wishlist['ids']) ? 'true' : 'false' }}"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Disponibilité</b> <span>{{ $product->quantity > 0 ? 'En stock' : 'Pas disponible' }}</span></li>
                            <li><b>Poids</b> <span>{{ $product->weight }} kg</span></li>
                            {{-- <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Reviews <span>({{ $product->reviews->count() }})</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Information</h6>
                                    <p>
                                        {{ $product->information }}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc reviews">
                                    <h6>Avis ({{ $product->reviews->count() }})</h6>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12">
                                            @foreach ($product->reviews as $review)
                                                <div class="card p-3 mb-2">
                                                    <div class="d-flex flex-row">
                                                        <div class="avatar">
                                                            <img src="https://ui-avatars.com/api/?background=7fad39&color=ffffff&name={{ $review->user->first_name.'+'.$review->user->last_name }}">
                                                        </div>
                                                        <div class="d-flex flex-column ml-2">
                                                            <div class="product__details__rating d-flex align-items-center">
                                                                <h6 class="mb-1 text-primary mr-3">{{ $review->user->first_name.' '.$review->user->last_name }}</h6>
                                                                @for ($i=0; $i < count(range(0, $review->rating - 1)); $i++)
                                                                    <i class="fa fa-star text-warning"></i>
                                                                @endfor
                                                            </div>

                                                            @if ($review->comment)
                                                                <p class="comment-text">{{ $review->comment }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-end mt-3">
                                                        <div class="d-flex flex-row">
                                                            <span class="text-muted fw-normal fs-10">{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y à H\hi\m\i\n') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if ($product->reviews->count() == 0)
                                                <p class="comment-text text-danger">Aucun avis enregistré pour ce produit</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Produits associés</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($featured_products as $_product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ $_product->image }}">
                                <ul class="product__item__pic__hover">
                                    <li>
                                        <a class="toggle-to-wishlist {{ (in_array($_product->id, $wishlist['ids']) ? 'active' : '') }} " data-id="{{$_product->id}}" data-name="{{$_product->name}}" data-price="{{$_product->price}}" data-image="{{$_product->image}}" data-remove="{{ in_array($_product->id, $wishlist['ids']) ? 'true' : 'false' }}"><i class="fa fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a class="toggle-to-cart {{ (in_array($_product->id, $cart['ids']) ? 'active' : '') }}" data-id="{{$_product->id}}" data-name="{{$_product->name}}" data-price="{{$_product->price}}" data-quantity="1" data-image="{{$_product->image}}" data-remove="{{ in_array($_product->id, $cart['ids']) ? 'true' : 'false' }}"><i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{ $_product->name }}</a></h6>
                                <h5>{{ $_product->price }} FCFA</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            window.cart = <?php echo json_encode($cart['products']); ?>;
            window.wishlist = <?php echo json_encode($wishlist['products']); ?>;

            $('.toggle-product-to-cart').on('click', function(event) {
                var cart = window.cart || [];
                const index = cart.findIndex(object => {
                    return object.id == '{{ $product->id }}';
                });
                let updatedCart = [];

                if (index !== -1) {
                    const updatedObject = {...cart[index], quantity: Number($('#qty').val())};
                    updatedCart = [
                        ...cart.slice(0, index),
                        updatedObject,
                        ...cart.slice(index + 1),
                    ];
                    cart = updatedCart;
                } else {
                    cart.push({
                        'id': '{{ $product->id }}',
                        'name': '{{ $product->name }}',
                        'image': '{{ $product->image }}',
                        'price': '{{ $product->price }}',
                        'quantity': Number($('#qty').val())
                    });
                }
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
