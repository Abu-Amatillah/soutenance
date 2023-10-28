@extends('front-layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front-office/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Panier</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Accueil</a>
                            <span>Panier</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-msg alert alert-success alert-dismissible fade show mb-4 d-none" role="alert">
                        <span class="message"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Poduit</th>
                                    <th>Prix <br> (FCFA)</th>
                                    <th>Quantité</th>
                                    <th>Total <br> (FCFA)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($cart['products']) > 0)
                                    @foreach ($cart['products'] as $product)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ $product->image }}" alt="">
                                                <h5>{{ $product->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ $product->price }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input class="product-quantity" type="number" value="{{ $product->quantity }}" data-id="{{$product->id}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ $product->price * $product->quantity }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close"  data-id="{{$product->id}}"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-danger"> Aucun produit ajouté au panier </h5>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row align-items-lg-center">
                <div class="col-lg-4">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('shop') }}" class="primary-btn cart-btn bg-primary text-white">Continuer mes achats</a>
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-8">
                    <div class="shoping__checkout">
                        <h5>Total</h5>
                        <ul>
                            <li>Total <span>{{ $cart['amount'] }}</span></li>
                        </ul>
                        @if ($cart['amount'] > 0)
                            <a class="primary-btn checkout-btn text-white cursor-pointer">Valider la commande</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            window.cart = <?php echo json_encode($cart['products']); ?>;
            /*-------------------
                Quantity change
            --------------------- */
            var proQty = $('.pro-qty');
            proQty.prepend('<span class="dec qtybtn">-</span>');
            proQty.append('<span class="inc qtybtn">+</span>');
            proQty.on('click', '.qtybtn', function () {
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                if ($button.hasClass('inc')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find('input').val(newVal);
                updateCart($button.parent().find('input').data('id'), $button.parent().find('input').val())
            });

            function updateCart(productId, productQuantity) {
                var cart = window.cart || [];
                const index = cart.findIndex(object => {
                    return object.id == productId;
                });
                let updatedCart = [];
                console.log(productId, productQuantity);
                if (index !== -1) {
                    const updatedObject = {...cart[index], quantity: Number(productQuantity)};
                    updatedCart = [
                        ...cart.slice(0, index),
                        updatedObject,
                        ...cart.slice(index + 1),
                    ];
                    cart = updatedCart;

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
                }
            }

            $('.shoping__cart__item__close span.icon_close').on('click', function(event) {
                var cart = window.cart || [];
                cart = cart?.filter(item => item?.id !== $(this).data('id'));
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

            $('.checkout-btn').on('click', function(event) {
                if ('{{ auth()->user() }}') {
                    var cart = window.cart || [];
                    const data = {
                            "_token": "{{ csrf_token() }}",
                            "cart": JSON.stringify(cart)
                        }
                    $.ajax('{{ env('APP_REAL_URL') }}' + '/shopping-cart', {
                        type: 'POST',
                        data,
                        success: function (data, status, xhr) {
                            window.location.reload();
                            $('.checkout-msg').css('display', 'flex !important');
                            $('.checkout-msg .span.checkout-msg').text(data['message']);
                            window.cart = data['products'];
                        }
                    });
                } else {
                    window.location = '{{ env("APP_REAL_URL") }}' + '/login?redirect_uri=shopping-cart';
                }
            });
        });
    </script>
@endsection
