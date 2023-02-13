@extends('frontend/layout/default', ['title' => "CEL || Blogs"])

@section('header')
<header class="header --header-page">
    <div class="header-caption">
        <ul class="my-breadcrumb">
            <li><a href="{{route('accueil')}}">Accueil</a></li>
            <li class="spacing">&#8722;</li>
            <li><span>Blogs</span></li>
        </ul>
        <h1 class="title">Blogs</h1>
    </div>
    <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
</header>
@endsection

@section('main')
<main>
    <section class="blog">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle">All articles</span>
                <h2 class="title">Tous les articles</h2>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-blog">
                        <div class="image">
                            <div class="head">Actualité</div>
                            <img src="{{asset('assets/images/course_image8.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores 
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('detail-blog')}}" class="link-more">
                                    Lire la suite
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-blog">
                        <div class="image">
                            <div class="head">Education</div>
                            <img src="{{asset('assets/images/course_image8.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores 
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('detail-blog')}}" class="link-more">
                                    Lire la suite
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-blog">
                        <div class="image">
                            <div class="head">Information</div>
                            <img src="{{asset('assets/images/course_image8.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores 
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('detail-blog')}}" class="link-more">
                                    Lire la suite
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-blog">
                        <div class="image">
                            <div class="head">Actualité</div>
                            <img src="{{asset('assets/images/course_image8.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores 
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('detail-blog')}}" class="link-more">
                                    Lire la suite
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-blog">
                        <div class="image">
                            <div class="head">Education</div>
                            <img src="{{asset('assets/images/course_image8.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores 
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('detail-blog')}}" class="link-more">
                                    Lire la suite
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-blog">
                        <div class="image">
                            <div class="head">Information</div>
                            <img src="{{asset('assets/images/course_image8.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3 class="title">Titre de l'article</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores 
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('detail-blog')}}" class="link-more">
                                    Lire la suite
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
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