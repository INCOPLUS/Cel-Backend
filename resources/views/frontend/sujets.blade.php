@extends('frontend/layout/default', ['title' => "CEL || Nos sujets"])

@section('header')
<header class="header --header-page">
    <div class="header-caption">
        <ul class="my-breadcrumb">
            <li><a href="{{route('accueil')}}">Accueil</a></li>
            <li class="spacing">&#8722;</li>
            <li><a href="{{route('enseignement')}}">Enseignement</a></li>
            <li class="spacing">&#8722;</li>
            <li><a href="{{route('composition')}}">Composition</a></li>
            <li class="spacing">&#8722;</li>
            <li><span>Sujets</span></li>
        </ul>
        <h1 class="title">Sujets</h1>
    </div>
    <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
</header>
@endsection

@section('main')
<main>
    <section class="sujets">
        <div class="container">
            <h3 class="title-sujet">Liste des sujets à partir de votre choix</h3>
            <div class="search-filtre">
                <!-- form search -->
                <form action="" class="form-search">
                    <input type="text" name="" id="" placeholder="Rechercher ici ...">
                </form>

                <!-- btn filtre -->
                <div class="btn-filtre">
                    <p class="paragraph-site">Filtres</p>
                    <!-- filtre -->
                    <div class="info-education">
                        <div class="info-education-content">
                            <h3 class="title">Filtres</h3>
                            <div class="element">
                                <p class="paragraph-site">Plus récent</p>
                                <p class="paragraph-site">Plus ancien</p>
                                <p class="paragraph-site">Matières scientifiques</p>
                                <p class="paragraph-site">Matières litteraires</p>
                                <p class="paragraph-site">Autres</p>
                            </div>
                        </div>
                        <div class="info-education-content">
                            <h3 class="title">A - Z</h3>
                            <div class="element">
                                <p class="paragraph-site">Croissanre</p>
                                <p class="paragraph-site">Décroissante</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banquet">
                        <div class="logo-arrierePlan">
                            <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                        </div>
                        <div class="banquet-content">
                            <div class="logo">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                            </div>
                            <div class="desc">
                                <div class="infor">
                                    <h4>Type</h4>
                                    <p class="paragraph-site">Interrogation</p>
                                </div>
                                <div class="infor">
                                    <h4>Titre</h4>
                                    <p class="paragraph-site">Lorem ipsum dolor</p>
                                </div>
                                <div class="infor">
                                    <h4>Date mise en ligne</h4>
                                    <p class="paragraph-site">12/06/2021</p>
                                </div>
                                <div class="infor">
                                    <h4>Heure mise en ligne</h4>
                                    <p class="paragraph-site">Il y a 12 minute</p>
                                </div>
                                <div class="infor">
                                    <h4>Durée du sujet</h4>
                                    <p class="paragraph-site">30 minutes</p>
                                </div>
                                <div class="infor">
                                    <h4>Auteur</h4>
                                    <p class="paragraph-site">Zogbande ouede jean</p>
                                </div>
                                <div class="infor">
                                    <h4>Pays / ville</h4>
                                    <p class="paragraph-site">Côte d'ivoire / Bingerville</p>
                                </div>
                            </div>
                            <a href="paiement-compo.html">
                                <button class="btn-standard --blue">Payer & composer</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banquet">
                        <div class="logo-arrierePlan">
                            <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                        </div>
                        <div class="banquet-content">
                            <div class="logo">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                            </div>
                            <div class="desc">
                                <div class="infor">
                                    <h4>Type</h4>
                                    <p class="paragraph-site">Interrogation</p>
                                </div>
                                <div class="infor">
                                    <h4>Titre</h4>
                                    <p class="paragraph-site">Lorem ipsum dolor</p>
                                </div>
                                <div class="infor">
                                    <h4>Date mise en ligne</h4>
                                    <p class="paragraph-site">12/06/2021</p>
                                </div>
                                <div class="infor">
                                    <h4>Heure mise en ligne</h4>
                                    <p class="paragraph-site">Il y a 12 minute</p>
                                </div>
                                <div class="infor">
                                    <h4>Durée du sujet</h4>
                                    <p class="paragraph-site">30 minutes</p>
                                </div>
                                <div class="infor">
                                    <h4>Auteur</h4>
                                    <p class="paragraph-site">Zogbande ouede jean</p>
                                </div>
                                <div class="infor">
                                    <h4>Pays / ville</h4>
                                    <p class="paragraph-site">Côte d'ivoire / Bingerville</p>
                                </div>
                            </div>
                            <a href="paiement-compo.html">
                                <button class="btn-standard --blue">Payer & composer</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banquet">
                        <div class="logo-arrierePlan">
                            <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                        </div>
                        <div class="banquet-content">
                            <div class="logo">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                            </div>
                            <div class="desc">
                                <div class="infor">
                                    <h4>Type</h4>
                                    <p class="paragraph-site">Interrogation</p>
                                </div>
                                <div class="infor">
                                    <h4>Titre</h4>
                                    <p class="paragraph-site">Lorem ipsum dolor</p>
                                </div>
                                <div class="infor">
                                    <h4>Date mise en ligne</h4>
                                    <p class="paragraph-site">12/06/2021</p>
                                </div>
                                <div class="infor">
                                    <h4>Heure mise en ligne</h4>
                                    <p class="paragraph-site">Il y a 12 minute</p>
                                </div>
                                <div class="infor">
                                    <h4>Durée du sujet</h4>
                                    <p class="paragraph-site">30 minutes</p>
                                </div>
                                <div class="infor">
                                    <h4>Auteur</h4>
                                    <p class="paragraph-site">Zogbande ouede jean</p>
                                </div>
                                <div class="infor">
                                    <h4>Pays / ville</h4>
                                    <p class="paragraph-site">Côte d'ivoire / Bingerville</p>
                                </div>
                            </div>
                            <a href="paiement-compo.html">
                                <button class="btn-standard --blue">Payer & composer</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banquet">
                        <div class="logo-arrierePlan">
                            <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                        </div>
                        <div class="banquet-content">
                            <div class="logo">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                            </div>
                            <div class="desc">
                                <div class="infor">
                                    <h4>Type</h4>
                                    <p class="paragraph-site">Interrogation</p>
                                </div>
                                <div class="infor">
                                    <h4>Titre</h4>
                                    <p class="paragraph-site">Lorem ipsum dolor</p>
                                </div>
                                <div class="infor">
                                    <h4>Date mise en ligne</h4>
                                    <p class="paragraph-site">12/06/2021</p>
                                </div>
                                <div class="infor">
                                    <h4>Heure mise en ligne</h4>
                                    <p class="paragraph-site">Il y a 12 minute</p>
                                </div>
                                <div class="infor">
                                    <h4>Durée du sujet</h4>
                                    <p class="paragraph-site">30 minutes</p>
                                </div>
                                <div class="infor">
                                    <h4>Auteur</h4>
                                    <p class="paragraph-site">Zogbande ouede jean</p>
                                </div>
                                <div class="infor">
                                    <h4>Pays / ville</h4>
                                    <p class="paragraph-site">Côte d'ivoire / Bingerville</p>
                                </div>
                            </div>
                            <a href="paiement-compo.html">
                                <button class="btn-standard --blue">Payer & composer</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banquet">
                        <div class="logo-arrierePlan">
                            <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                        </div>
                        <div class="banquet-content">
                            <div class="logo">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                            </div>
                            <div class="desc">
                                <div class="infor">
                                    <h4>Type</h4>
                                    <p class="paragraph-site">Interrogation</p>
                                </div>
                                <div class="infor">
                                    <h4>Titre</h4>
                                    <p class="paragraph-site">Lorem ipsum dolor</p>
                                </div>
                                <div class="infor">
                                    <h4>Date mise en ligne</h4>
                                    <p class="paragraph-site">12/06/2021</p>
                                </div>
                                <div class="infor">
                                    <h4>Heure mise en ligne</h4>
                                    <p class="paragraph-site">Il y a 12 minute</p>
                                </div>
                                <div class="infor">
                                    <h4>Durée du sujet</h4>
                                    <p class="paragraph-site">30 minutes</p>
                                </div>
                                <div class="infor">
                                    <h4>Auteur</h4>
                                    <p class="paragraph-site">Zogbande ouede jean</p>
                                </div>
                                <div class="infor">
                                    <h4>Pays / ville</h4>
                                    <p class="paragraph-site">Côte d'ivoire / Bingerville</p>
                                </div>
                            </div>
                            <a href="paiement-compo.html">
                                <button class="btn-standard --blue">Payer & composer</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banquet">
                        <div class="logo-arrierePlan">
                            <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                        </div>
                        <div class="banquet-content">
                            <div class="logo">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                            </div>
                            <div class="desc">
                                <div class="infor">
                                    <h4>Type</h4>
                                    <p class="paragraph-site">Interrogation</p>
                                </div>
                                <div class="infor">
                                    <h4>Titre</h4>
                                    <p class="paragraph-site">Lorem ipsum dolor</p>
                                </div>
                                <div class="infor">
                                    <h4>Date mise en ligne</h4>
                                    <p class="paragraph-site">12/06/2021</p>
                                </div>
                                <div class="infor">
                                    <h4>Heure mise en ligne</h4>
                                    <p class="paragraph-site">Il y a 12 minute</p>
                                </div>
                                <div class="infor">
                                    <h4>Durée du sujet</h4>
                                    <p class="paragraph-site">30 minutes</p>
                                </div>
                                <div class="infor">
                                    <h4>Auteur</h4>
                                    <p class="paragraph-site">Zogbande ouede jean</p>
                                </div>
                                <div class="infor">
                                    <h4>Pays / ville</h4>
                                    <p class="paragraph-site">Côte d'ivoire / Bingerville</p>
                                </div>
                            </div>
                            <a href="paiement-compo.html">
                                <button class="btn-standard --blue">Payer & composer</button>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- pagination -->
                <div class="col-12">
                    <div class="my-pagination-site mt-5">
                        <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                        <div class="number">
                            <span><a href="#" class="active">1</a></span>
                            <span><a href="#">2</a></span>
                            <span>...</span>
                            <span><a href="#">6</a></span>
                        </div>
                        <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection