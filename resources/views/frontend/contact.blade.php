@extends('frontend/layout/default', ['title' => "CEL || Contact"])

@section('header')
<header class="header --header-page">
    <div class="header-caption">
        <ul class="my-breadcrumb">
            <li><a href="index.html">Accueil</a></li>
            <li class="spacing">&#8722;</li>
            <li><span>Contact</span></li>
        </ul>
        <h1 class="title">Contact</h1>
    </div>
    <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
</header>
@endsection

@section('main')
<main>
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-content">
                        <div class="heading mb-5">
                            <span class="subTitle">Contact</span>
                            <h2 class="title">Prenez contact avec nous</h2>
                        </div>
                        {{-- Contact --}}
                        <div class="coord">
                            <div class="icone"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3>Appelez-nous au : +225 07 081 170 36 / 01 427 309 30</h3>
                                <p class="paragraph-site">Disponible tous les jours</p>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="coord">
                            <div class="icone"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3>Écrivez-nous directement</h3>
                                <p class="paragraph-site">myincospace@gmail.com</p>
                            </div>
                        </div>

                        {{-- Localisation --}}
                        <div class="coord">
                            <div class="icone"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3>Notre emplacement</h3>
                                <p class="paragraph-site">Côte d'Ivoire, Abidjan - Bingerville</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127120.30413385364!2d-3.8965920910782903!3d5.338901201960609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1f29a9b526e85%3A0x6f639d30ed0b8637!2sBingerville!5e0!3m2!1sfr!2sci!4v1623645588877!5m2!1sfr!2sci" 
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                {{-- Formulaire de contact --}}
                <div class="col-12">
                    <div class="box-form-contact">
                        <div class="heading mb-5 --center">
                            <span class="subTitle">Sent Us a Message</span>
                            <h2 class="title">Nous répondrons à toutes vos questions</h2>
                        </div>
                        <form action="" class="form-row form-response form-contact">
                            <div class="col-lg-6">
                                <div class="form--group">
                                    <input type="text" placeholder="Nom" class="form--group__input">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form--group">
                                    <input type="text" placeholder="E-mail" class="form--group__input">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form--group">
                                    <textarea placeholder="Message" class="form--group__textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-standard --red">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    <span>Envoyer</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Newsletter --}}
    @include('frontend/partials/newsletter')
</main>
@endsection