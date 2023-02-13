@extends('frontend/layout/default')

@section('css-personnel')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
@endsection

@section('preloader')
    <div class="preloader">
        <div class="preloader-content">
            <div class="logo">
                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
            </div>
            <div class="loader"></div>
        </div>
    </div>
@endsection

@section('header')
    <header class="header">
        <div class="header-caption">
            <h3 class="subTitle">votre plateforme de</h3>
            <h1 class="title">Compo <span>en ligne</span></h1>
            <p class="paragraph-site">
                CEL (compo en ligne) est comme son nom l’indique une plateforme numérique 
                qui propose des compositions,  évaluations et examens en ligne dans un système 
                totalement novateur.
            </p>
            <a href="{{route('composition')}}">
                <button class="btn-standard --red mt-5">Composer maintenant</button>
            </a>
        </div>

        <div class="owl-carousel owl-theme" id="owl-carousel-header">
            <div class="item">
                <img src="{{asset('assets/images/hero_area_image.png')}}" alt="img">
            </div>
            <div class="item">
                <img src="{{asset('assets/images/slider-image2.jpg')}}" alt="img">
            </div>
            <div class="item">
                <img src="{{asset('assets/images/slider-image3.jpg')}}" alt="img">
            </div>
        </div>
    </header>
@endsection

@section('main')
<main>
    {{-- About --}}
    <section class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="play-video">
                        <div class="btn-absolute">
                            <a data-fancybox="gallery" href="{{asset('assets/video/Listening_to_Sound.mp4')}}">
                                <div class="btn-video">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>
                        <video preload="auto" autoplay muted loop>
                            <source src="{{asset('assets/video/Listening_to_Sound.mp4')}}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-7">
                    <div class="text-illust">
                        <div class="heading mb-5">
                            <span class="subTitle">About me</span>
                            <h2 class="title">A propos <span>de nous</span></h2>
                        </div>
                        <p class="paragraph-site">
                            CEL, c’est la <span class="--bold">construction d’un environnement de travail</span> qui permette à chaque élève de progresser 
                            à son rythme, chaque parent d’être <span class="--bold">au cœur de l’apprentissage de son enfant</span>, chaque enseignant d’être 
                            promoteur de l’excellence en favorisant un environnement d’apprentissage prompt à la <span class="--bold">promotion de l’excellence</span>. 
                            En un mot CEL propose une école réconciliée avec elle-même et tous ses acteurs dans un 
                            environnement totalement résilient faisant appel au numérique.
                            Pour cela, CEL commence par le commencement : <span class="--bold">redonner la motivation qui manque à beaucoup d’élèves</span>.
                        </p>
                        <p class="paragraph-site">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Doloremque fuga, obcaecati recusandae eos eligendi repellat? 
                            Odio, et error illo ea, voluptas quis nihil, officia mollitia 
                            impedit incidunt rerum similique nam!
                        </p>
                        <a href="{{route('about')}}" class="more underline-animate"><button>En savoir plus</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Education --}}
    <section class="education">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle">Our education</span>
                <h2 class="title">Enseignement</h2>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-education">
                        <div class="image">
                            <div class="head">Compo en ligne</div>
                            <img src="{{asset('assets/images/21196938.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3>Enseignement Primaire</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores ...
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('enseignement')}}" class="link-more">
                                    Plus de détail 
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-education">
                        <div class="image">
                            <div class="head">Compo en ligne</div>
                            <img src="{{asset('assets/images/cours-ligne-pour-enfants_52683-36818.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3>Enseignement Secondaire</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores ...
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('enseignement')}}" class="link-more">
                                    Plus de détail 
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-education">
                        <div class="image">
                            <div class="head">Compo en ligne</div>
                            <img src="{{asset('assets/images/superieur.jpg')}}" alt="img">
                        </div>
                        <div class="desc">
                            <h3>Enseignement Superieur</h3>
                            <p class="paragraph-site">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Corporis quis quidem, sequi, laudantium 
                                autem praesentium ullam maiores ...
                            </p>
                            <div class="box-btn">
                                <div class="logo"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                <a href="{{route('enseignement')}}" class="link-more">
                                    Plus de détail 
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Why choose us --}}
    <section class="choose">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-7 col-lg-7">
                    <div class="text-illust">
                        <div class="heading mb-5">
                            <span class="subTitle">why choose us</span>
                            <h2 class="title">Pourquoi nous <span>choisir</span></h2>
                        </div>
                        <p class="paragraph-site">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Doloremque fuga, obcaecati recusandae eos eligendi repellat? 
                            Odio, et error illo ea, voluptas quis nihil, officia mollitia 
                            impedit incidunt rerum similique nam!
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="critere">
                                    <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                    <p class="paragraph-site">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="critere">
                                    <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                    <p class="paragraph-site">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="critere">
                                    <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                    <p class="paragraph-site">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="critere">
                                    <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                    <p class="paragraph-site">Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="play-video">
                        <div class="btn-absolute">
                            <a data-fancybox="gallery" href="{{asset('assets/video/Listening_to_Sound.mp4')}}">
                                <div class="btn-video">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>
                        <video preload="auto" autoplay muted loop>
                            <source src="{{asset('assets/video/Listening_to_Sound.mp4')}}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Statistique --}}
    <div class="statistical">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle">Statistics</span>
                <h2 class="title">Statistiques</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="box-stat">
                        <div class="icone"><img src="{{asset('assets/images/teacher.svg')}}" alt="teacher"></div>
                        <div class="box-counting">
                            <span class="counting" data-count="10200">0</span>
                            <span class="plus">+</span>
                        </div>
                        <p class="paragraph-site">Professeurs / Enseignants</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="box-stat">
                        <div class="icone"><img src="{{asset('assets/images/student.svg')}}" alt="student"></div>
                        <div class="box-counting">
                            <span class="counting" data-count="23080">0</span>
                            <span class="plus">+</span>
                        </div>
                        <p class="paragraph-site">Etudiants / Elèves</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="box-stat">
                        <div class="icone"><img src="{{asset('assets/images/test.svg')}}" alt="test"></div>
                        <div class="box-counting">
                            <span class="counting" data-count="2380">0</span>
                            <span class="plus">+</span>
                        </div>
                        <p class="paragraph-site">Epreuves</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Partners --}}
    <section class="partners">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle --cl-white">Our partners</span>
                <h2 class="title">Nos partenaires</h2>
            </div>
            <div class="owl-carousel owl-theme" id="owl-carousel-partners">
                <div class="item">
                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                </div>
                <div class="item">
                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                </div>
                <div class="item">
                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                </div>
                <div class="item">
                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                </div>
                <div class="item">
                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                </div>
            </div>
        </div>
    </section>

    {{-- Testimoniale --}}
    <section class="testimoniale">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle">testimoniale</span>
                <h2 class="title">Témoignages</h2>
            </div>
            <div class="owl-carousel owl-theme" id="owl-carousel-testimoniale">
                <div class="item">
                    <div class="card-testimoniale">
                        <span class="small-title">Commentaire</span>
                        <p class="paragraph-site">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Laboriosam quis sunt corporis vel delectus. Magni impedit, sint molestiae 
                            fugiat optio aliquid id, quaerat obcaecati maiores perspiciatis nisi 
                            voluptas laudantium blanditiis...
                        </p>
                        <div class="user">
                            <div class="photo"><img src="{{asset('assets/images/user_image1.png')}}" alt="photo"></div>
                            <div class="name-user">
                                <p class="name">name user</p>
                                <p class="status">Professeur</p>
                                <p class="country">Côte d'Ivoire</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card-testimoniale">
                        <span class="small-title">Commentaire</span>
                        <p class="paragraph-site">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Laboriosam quis sunt corporis vel delectus. Magni impedit, sint molestiae 
                            fugiat optio aliquid id, quaerat obcaecati maiores perspiciatis nisi 
                            voluptas laudantium blanditiis...
                        </p>
                        <div class="user">
                            <div class="photo"><img src="{{asset('assets/images/course_image5.jpg')}}" alt="photo"></div>
                            <div class="name-user">
                                <p class="name">name user</p>
                                <p class="status">Elève</p>
                                <p class="country">Côte d'Ivoire</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card-testimoniale">
                        <span class="small-title">Commentaire</span>
                        <p class="paragraph-site">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Laboriosam quis sunt corporis vel delectus. Magni impedit, sint molestiae 
                            fugiat optio aliquid id, quaerat obcaecati maiores perspiciatis nisi 
                            voluptas laudantium blanditiis...
                        </p>
                        <div class="user">
                            <div class="photo"><img src="{{asset('assets/images/course_image8.jpg')}}" alt="photo"></div>
                            <div class="name-user">
                                <p class="name">name user</p>
                                <p class="status">Etudiant</p>
                                <p class="country">Côte d'Ivoire</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Annonce publicitaire --}}
    <section class="annonce">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle">advertisements</span>
                <h2 class="title">Annonces publicitaire</h2>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-annonce-site">
                            <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce pub">
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-annonce-site">
                            <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce pub">
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-annonce-site">
                            <img src="{{asset('assets/images/annonce-pub.jpg')}}" alt="annonce pub">
                        </div>
                    </a>
                </div>
            </div>
            <a href="{{route('annonce-pub')}}"><button class="btn-standard --red --center">Voir plus d'annonces</button></a>
        </div>
    </section>

    {{-- Blogs --}}
    <section class="blog">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle">Read the blog posts</span>
                <h2 class="title">Blogs</h2>
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
            </div>
            <a href="{{route('blogs')}}"><button class="btn-standard --red --center">Plus d'articles</button></a>
        </div>
    </section>

    {{-- App mobile CEL --}}
    <div class="app-mobile">
        <div class="container">
            <div class="app-mobile--content">
                <div class="image">
                    <img src="{{asset('assets/images/app-cel.png')}}" alt="phone">
                </div>
                <div class="text">
                    <h3 class="title"><span>cel</span> en application mobile</h3>
                    <p class="paragraph-site">Bientôt disponible sur les plateformes de téléchargement</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Newsletter --}}
    @include('frontend/partials/newsletter')
</main>
@endsection

@section('script-personnel')
    {{-- Count js --}}
    <script src="{{asset('assets/js/waypoint.min.js')}}"></script>
    <script>
        function counStats() {

            $('.counting').each(function () {
                var $this = $(this),
                    countTo = $this.attr('data-count');

                $({ countNum: $this.text() }).animate({
                    countNum: countTo
                },

                    {

                        duration: 2000,
                        easing: 'linear',
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum);
                            //alert('finished');
                        }

                    });
            });
        }


        new Waypoint({
            element: document.querySelector('.statistical'),
            handler: function () {
                counStats()
            },
            offset: '100%'
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
@endsection