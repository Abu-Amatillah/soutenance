@extends('front-layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front-office/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Acceuil</a>
                            <span>Wishlist</span>
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
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Poduit</th>
                                    <th>Prix <br> (FCFA)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($wishlist['products']) > 0)
                                    @foreach ($wishlist['products'] as $product)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ $product->image }}" alt="">
                                                <h5>{{ $product->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ $product->price }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close"  data-id="{{$product->id}}"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-danger"> Aucun produit ajouté à la wish liste </h5>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('shop') }}" class="primary-btn cart-btn bg-primary text-white">Continuer mes achats</a>
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
            window.wishlist = <?php echo json_encode($wishlist['products']); ?>;

            $('.shoping__cart__item__close span.icon_close').on('click', function(event) {
                var wishlist = window.wishlist || [];
                wishlist = wishlist?.filter(item => item?.id !== $(this).data('id'));
                console.log(wishlist);
                $.ajax('{{ env('APP_REAL_URL') }}' + '/wishlist', {
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "wishlist":JSON.stringify(wishlist)
                    },
                    success: function (data, status, xhr) {
                        window.location.reload();
                        window.wishlist = data['products'];
                    }
                });
            });
        });
    </script>
@endsection
