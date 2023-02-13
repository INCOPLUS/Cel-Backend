@extends('frontend/layout/default', ['title' => "CEL || Annonces publicitaires"])

@section('header')
<header class="header --header-page">
    <div class="header-caption">
        <ul class="my-breadcrumb">
            <li><a href="{{route('accueil')}}">Accueil</a></li>
            <li class="spacing">&#8722;</li>
            <li><span>Annonces publicitaires</span></li>
        </ul>
        <h1 class="title">Annonces publicitaires</h1>
    </div>
    <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
</header>
@endsection

@section('main')
<main>
    {{-- Annonces publicitaires --}}
    <section class="annonce-pub">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle">advertisements</span>
                <h2 class="title">Annonces publicitaire</h2>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-more-annonce">
                            <div class="image">
                                <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce">
                            </div>
                            <div class="desc">
                                <h3 class="name">Name entreprise</h3>
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Fuga eveniet dolores aliquid aut ducimus maxime nulla ut unde. 
                                    Quo tempore nostrum, quasi repellendus voluptatibus facilis illo 
                                    doloremque impedit numquam debitis?
                                </p>
                                <div class="reseaux">
                                    <a href="#"><div class="icone --facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --instagram"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></div></a>
                                    <div class="icone --share btn-partage">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <div class="box-link-partage --annonce">
                                            <a href="#">
                                                <div class="icone --facebook">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --instagram">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --whatsapp">
                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --chat">
                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-more-annonce">
                            <div class="image">
                                <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce">
                            </div>
                            <div class="desc">
                                <h3 class="name">Name entreprise</h3>
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Fuga eveniet dolores aliquid aut ducimus maxime nulla ut unde. 
                                    Quo tempore nostrum, quasi repellendus voluptatibus facilis illo 
                                    doloremque impedit numquam debitis?
                                </p>
                                <div class="reseaux">
                                    <a href="#"><div class="icone --facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --instagram"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></div></a>
                                    <div class="icone --share btn-partage">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <div class="box-link-partage --annonce">
                                            <a href="#">
                                                <div class="icone --facebook">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --instagram">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --whatsapp">
                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --chat">
                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-more-annonce">
                            <div class="image">
                                <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce">
                            </div>
                            <div class="desc">
                                <h3 class="name">Name entreprise</h3>
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Fuga eveniet dolores aliquid aut ducimus maxime nulla ut unde. 
                                    Quo tempore nostrum, quasi repellendus voluptatibus facilis illo 
                                    doloremque impedit numquam debitis?
                                </p>
                                <div class="reseaux">
                                    <a href="#"><div class="icone --facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --instagram"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></div></a>
                                    <div class="icone --share btn-partage">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <div class="box-link-partage --annonce">
                                            <a href="#">
                                                <div class="icone --facebook">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --instagram">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --whatsapp">
                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --chat">
                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-more-annonce">
                            <div class="image">
                                <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce">
                            </div>
                            <div class="desc">
                                <h3 class="name">Name entreprise</h3>
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Fuga eveniet dolores aliquid aut ducimus maxime nulla ut unde. 
                                    Quo tempore nostrum, quasi repellendus voluptatibus facilis illo 
                                    doloremque impedit numquam debitis?
                                </p>
                                <div class="reseaux">
                                    <a href="#"><div class="icone --facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --instagram"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></div></a>
                                    <div class="icone --share btn-partage">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <div class="box-link-partage --annonce">
                                            <a href="#">
                                                <div class="icone --facebook">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --instagram">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --whatsapp">
                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --chat">
                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-more-annonce">
                            <div class="image">
                                <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce">
                            </div>
                            <div class="desc">
                                <h3 class="name">Name entreprise</h3>
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Fuga eveniet dolores aliquid aut ducimus maxime nulla ut unde. 
                                    Quo tempore nostrum, quasi repellendus voluptatibus facilis illo 
                                    doloremque impedit numquam debitis?
                                </p>
                                <div class="reseaux">
                                    <a href="#"><div class="icone --facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --instagram"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></div></a>
                                    <div class="icone --share btn-partage">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <div class="box-link-partage --annonce">
                                            <a href="#">
                                                <div class="icone --facebook">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --instagram">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --whatsapp">
                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --chat">
                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-more-annonce">
                            <div class="image">
                                <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce">
                            </div>
                            <div class="desc">
                                <h3 class="name">Name entreprise</h3>
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Fuga eveniet dolores aliquid aut ducimus maxime nulla ut unde. 
                                    Quo tempore nostrum, quasi repellendus voluptatibus facilis illo 
                                    doloremque impedit numquam debitis?
                                </p>
                                <div class="reseaux">
                                    <a href="#"><div class="icone --facebook"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --instagram"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a>
                                    <a href="#"><div class="icone --youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></div></a>
                                    <div class="icone --share btn-partage">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <div class="box-link-partage --annonce">
                                            <a href="#">
                                                <div class="icone --facebook">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --instagram">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --whatsapp">
                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="icone --chat">
                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Pagination --}}
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
    </section>

    {{-- Newsletter --}}
    @include('frontend/partials/newsletter')
</main>
@endsection