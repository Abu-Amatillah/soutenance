<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('front-office/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front-office/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front-office/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front-office/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front-office/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front-office/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front-office/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front-office/css/style.css') }}" type="text/css">
    @yield('css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('front-office/img/logo.svg') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{ route('wishlist') }}"><i class="fa fa-heart"></i> <span>{{ count($wishlist['products']) }}</span></a></li>
                <li><a href="{{ route('shopping-cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ count($cart['products']) }}</span></a></li>
            </ul>
            <div class="header__cart__price">Produits: <span>{{ $cart['amount'] }} FCFA</span></div>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a data-toggle="modal" data-target="#serviceModal" class="text-black-50 text-decoration-none font-weight-normal cursor-pointer">Service</a></li>
                <li><a data-toggle="modal" data-target="#devisModal" class="text-black-50 text-decoration-none font-weight-normal cursor-pointer">Devis</a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ asset('front-office/img/language.png') }}" alt="">
                <div>Français</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Français</a></li>
                    <li><a href="#">Anglais</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="{{ route('login') }}"><i class="fa fa-user"></i>Se connecter</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>

                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Acceuil</a></li>
                <li class="{{ Route::currentRouteName() == 'shop' ? 'active' : '' }}"><a href="{{ route('shop') }}">Boutique</a></li>
                {{-- <li class="{{ (Route::currentRouteName() == 'shop-details' || Route::currentRouteName() == 'shopping-cart' || Route::currentRouteName() == 'checkout' || Route::currentRouteName() == 'blog-details') ? 'active' : '' }}"><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li class="{{ Route::currentRouteName() == 'shop-details' ? 'active' : '' }}"><a href="{{ route('shop-details') }}">Détails Produit</a></li>
                        <li class="{{ Route::currentRouteName() == 'shopping-cart' ? 'active' : '' }}"><a href="{{ route('shopping-cart') }}">Panier</a></li>
                        <li class="{{ Route::currentRouteName() == 'checkout' ? 'active' : '' }}"><a href="{{ route('checkout') }}">Paiement</a></li>
                        <li class="{{ Route::currentRouteName() == 'blog-details' ? 'active' : '' }}"><a href="{{ route('blog-details') }}">Blog Details</a></li>
                    </ul>
                </li>
                <li class="{{ Route::currentRouteName() == 'blog' ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li> --}}
                <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-whatsapp"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-phone"></i> +2296662549</li>
                <li>Ouvert 7/7 de 08h à 20h</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-phone"></i> +2296662549 </li>
                                <li>Ouvert 7/7 de 08h à 20h</li>
                                <li><a data-toggle="modal" data-target="#serviceModal" class="text-black-50 text-decoration-none font-weight-normal cursor-pointer">Service</a></li>
                                <li><a data-toggle="modal" data-target="#devisModal" class="text-black-50 text-decoration-none font-weight-normal cursor-pointer">Devis</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ asset('front-office/img/language.png') }}" alt="">
                                <div>Français</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Français</a></li>
                                    <li><a href="#">Anglais</a></li>
                                </ul>
                            </div>

                            <div class="header__top__right__auth {{ auth()->user() ? 'dropdown' : '' }}">
                                @if (auth()->user())
                                <div class="dropdown">
                                    <a class="dropdown-toggle" type="button" id="loggedDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      {{ auth()->user()->first_name.' '.auth()->user()->last_name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="loggedDropdown">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Déconnexion') }}
                                            </a>
                                        </form>
                                    </div>
                                  </div>
                                @else
                                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Se connecter</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('front-office/img/logo.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="{{ Route::currentRouteName() == 'shop' ? 'active' : '' }}"><a href="{{ route('shop') }}">Boutique</a></li>
                            {{-- <li class="{{ (Route::currentRouteName() == 'shop-details' || Route::currentRouteName() == 'shopping-cart' || Route::currentRouteName() == 'checkout' || Route::currentRouteName() == 'blog-details') ? 'active' : '' }}"><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li class="{{ Route::currentRouteName() == 'shop-details' ? 'active' : '' }}"><a href="{{ route('shop-details') }}">Détails Produit</a></li>
                                    <li class="{{ Route::currentRouteName() == 'shopping-cart' ? 'active' : '' }}"><a href="{{ route('shopping-cart') }}">Panier</a></li>
                                    <li class="{{ Route::currentRouteName() == 'checkout' ? 'active' : '' }}"><a href="{{ route('checkout') }}">Paiement</a></li>
                                    <li class="{{ Route::currentRouteName() == 'blog-details' ? 'active' : '' }}"><a href="{{ route('blog-details') }}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'blog' ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li> --}}
                            <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ route('wishlist') }}"><i class="fa fa-heart"></i> <span>{{ count($wishlist['products']) }}</span></a></li>
                            <li><a href="{{ route('shopping-cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ count($cart['products']) }}</span></a></li>
                        </ul>
                        <div class="header__cart__price">Produits: <span>{{ $cart['amount'] }} FCFA</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        @if ($devis_success)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout-msg alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <span class="message">{{ $devis_success }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($service_success)
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout-msg alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <span class="message">{{ $service_success }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="hero__categories position-relative">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Toutes les catégories</span>
                        </div>
                        <div class="categories__content">
                            <input id="search-category" class="form-control mt-2 mb-3" type="search" placeholder="Rechercher une catégorie">
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('shop', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="hero__search">
                        <div class="hero__search__form w-100">
                            <form method="GET" action="{{ route('shop') }}">
                                <input type="search" placeholder="De quoi aviez-vous besoin?" name="search">
                                <button type="submit" class="site-btn">Rechercher</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('front-office/img/logo.svg') }}" alt=""></a>
                        </div>
                        <ul>
                            <li><b><u>Adresse:</u></b> Quartier Gbira après KOBOUROU CITY, Parakou, BJ </li>
                            <li><b><u>Téléphone:</u></b> +2296662549</li>
                            <li><b><u>E-mail:</u></b> mountassirou41@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liens utiles</h6>
                        <ul>
                            <li><a href="{{ route('shop') }}">Boutique</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>S'inscrire à notre lettre d'information</h6>
                        <p>Recevez des mises à jour par e-mail sur notre dernière boutique et nos offres spéciales.</p>
                        <form action="#">
                            <input type="text" placeholder="Entrer votre e-mail">
                            <button type="submit" class="site-btn">Souscrire</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="text-center">
                            <p>
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tout droit réserver
                            </p>
                        </div>
                        {{-- <div class="footer__copyright__payment"><img src="{{ asset('front-office/img/payment-item.png') }}" alt=""></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Devis Modal -->
    <div class="modal fade" id="devisModal" tabindex="-1" role="dialog" aria-labelledby="devisModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="devisModalLabel">Demander un devis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('devis.create') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input name="name" id="name" class="form-control" required value="{{ auth()->user() ? auth()->user()->first_name.' '. auth()->user()->last_name : '' }}" />
                        </div>

                        <div class="form-group">
                            <label for="need">Téléphone</label>
                            <input name="telephone" id="telephone" class="form-control" required value="{{ auth()->user() ? auth()->user()->telephone : '' }}" />
                        </div>

                        <div class="form-group">
                            <label for="need">Décrivez votre besoin</label>
                            <textarea name="need" id="need" rows="8" required class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary font-weight-bold">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Modal -->
    <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('service.create') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input name="name" id="name" class="form-control" required value="{{ auth()->user() ? auth()->user()->first_name.' '. auth()->user()->last_name : '' }}" />
                        </div>

                        <div class="form-group">
                            <label for="need">Téléphone</label>
                            <input name="telephone" id="telephone" class="form-control" required value="{{ auth()->user() ? auth()->user()->telephone : '' }}" />
                        </div>

                        <div class="form-group">
                            <label for="need">En quoi pouvons-nous vous aider ?</label>
                            <textarea name="need" id="need" rows="8" required class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary font-weight-bold">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Js Plugins -->
    <script src="{{ asset('front-office/js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('front-office/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-office/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front-office/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front-office/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('front-office/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('front-office/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-office/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            var categories = <?php echo json_encode($categories) ?>;

            $('#search-category').on('keyup', function() {
                if ($(this).val()?.length) {
                    categories = categories?.filter((item) => item?.name?.includes($(this).val()));
                } else {
                    categories = <?php echo json_encode($categories) ?>;
                }

                $('.categories__content ul').empty();
                if (categories?.length) {
                    categories?.forEach((element) => {
                        var route = '{{ env('APP_REAL_URL') }}' + '/shop/' + element?.id;
                        console.log(route);
                        $('.categories__content ul').append(
                            `
                                <li>
                                    <a href="${route}">${element?.name}</a>
                                </li>
                            `
                        );
                    });

                } else {
                    $('.categories__content ul').append(
                        `
                            <li>
                                <a href="#" class="text-black-50">Aucune catégorie ne correspond à votre recherche.</a>
                            </li>
                        `
                    );
                }
            });
        });
    </script>

    @yield('js')

</body>

</html>
