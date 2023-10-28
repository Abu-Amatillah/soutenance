@extends('front-layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('front-office/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Téléphone</h4>
                        <p>+2296662549</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Adresse</h4>
                        <p>Quartier Gbira après KOBOUROU CITY, Parakou, BJ</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Horaire</h4>
                        <p>08h00 à 20h00</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>mountassirou41@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d554.4126605605618!2d2.6245353881248885!3d9.366759696685603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbj!4v1698492665643!5m2!1sfr!2sbj" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Gbira</h4>
                <ul>
                    <li>Téléphone: +2296662549</li>
                    <li>Addresse: Quartier Gbira après KOBOUROU CITY, Parakou, BJ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Laisser un message</h2>
                    </div>
                </div>
            </div>
            <form method="POST" action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input name="name" value="{{ auth()->user() ? auth()->user()->first_name.' '. auth()->user()->last_name : '' }}" required type="text" placeholder="Votre nom complet">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input name="email" value="{{ auth()->user() ? auth()->user()->email : '' }}" required type="email" placeholder="Votre adresse e-mail">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="message" required placeholder="Votre message"></textarea>
                        <button type="submit" class="site-btn">ENVOYER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
