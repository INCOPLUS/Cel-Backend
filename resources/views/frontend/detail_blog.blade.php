@extends('frontend/layout/default', ['title' => "CEL || Détail du blog"])

@section('header')
<header class="header --header-page">
    <div class="header-caption">
        <ul class="my-breadcrumb">
            <li><a href="{{route('accueil')}}">Accueil</a></li>
            <li class="spacing">&#8722;</li>
            <li><span>Détail Article</span></li>
        </ul>
        <h1 class="title">Détail Article</h1>
    </div>
    <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
</header>
@endsection

@section('main')
<main>
    <section class="detail-blog">
        <div class="container">
            <h2 class="title-article">Lorem ipsum dolor sit, amet consectetur adipisicing</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="first-content">
                        {{-- article --}}
                        <div class="article">
                            <div class="image">
                                <img src="{{asset('assets/images/blog_image2.jpg')}}" alt="">
                            </div>
                            <div class="subInfo">
                                <div class="subInfo-box">
                                    <div class="subInfo-box__content">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p class="paragraph-site">Name autor</p>
                                    </div>
                                    <div class="subInfo-box__content">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <p class="paragraph-site">13 Juin 2021</p>
                                    </div>
                                    <div class="subInfo-box__content">
                                        <i class="fa fa-language" aria-hidden="true"></i>
                                        <p class="paragraph-site">Français</p>
                                    </div>
                                </div>
                                <div class="partage">
                                    <p class="paragraph-site">Partager</p>
                                    <div class="icone --share btn-partage">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        <div class="box-link-partage">
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
                            <div class="articleparagraph-site">
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing 
                                    elit. Placeat ipsa culpa totam quasi dolores 
                                    voluptatem tenetur nobis a quaerat quam neque 
                                    voluptates, eius deserunt ea ipsum consectetur, 
                                    reprehenderit numquam. Maiores! llaceat ipsa culpa totam quasi dolores 
                                    voluptatem tenetur nobis a quaerat quam neque 
                                    voluptates, eius deserunt ea ipsum consectetur, 
                                    reprehenderit numquam. Maiores
                                    amet consectetur adipisicing 
                                    elit. Placeat ipsa culpa totam quasi dolores 
                                    voluptatem tenetur nobis a quaerat quam neque 
                                    voluptates, eius deserunt ea ipsum consectetur, 
                                    reprehenderit numquam. Maiores! llaceat ipsa culpa totam quasi dolores 
                                    voluptatem tenetur nobis a quaerat quam neque 
                                    voluptates, eius deserunt ea ipsum consectetur, 
                                    reprehenderit numquam. Maiores!
                                </p>
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing 
                                    elit. Placeat ipsa culpa totam quasi dolores 
                                    voluptatem tenetur nobis a quaerat quam neque 
                                    voluptates, eius deserunt ea ipsum consectetur, 
                                    reprehenderit numquam ipsa culpa totam quasi dolores 
                                    voluptatem tenetur nobis a quaerat quam neque 
                                    voluptates, eius deserunt ea ipsum consectetur, 
                                    reprehenderit numquam. Maiores! llaceat ipsa culpa totam quasi dolores 
                                    voluptatem tenetur nobis a quaerat quam neque 
                                    voluptates, eius deserunt ea ipsum consectetur, 
                                    reprehenderit numquam. Maiores!
                                </p>
                                <h3 class="title">Lorem ipsum dolor sit, amet consectetur adipisicing</h3>
                                <p class="paragraph-site">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing 
                                    elit. Placeat ipsa culpa totam quasi dolores 
                                    voluptatem tenetur nobis a quaerat quam neque 
                                    voluptates, eius deserunt ea ipsum consectetur, 
                                    reprehenderit numquam. Maiores!
                                </p>
                            </div>
                        </div>

                        {{-- pagination --}}
                        <div class="pagination-article">
                            <a href="#">
                                <div class="precedent">
                                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit consectetud.</h3>
                                    <p class="paragraph-site">
                                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                        Précédent
                                    </p>
                                </div>
                            </a>
                            <a href="#" class="text-end">
                                <div class="suivant">
                                    <h3>Repellendus neque fugit assumenda dolor sit amet consectetur</h3>
                                    <p class="paragraph-site">
                                        Suivant
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </p>
                                </div>
                            </a>
                        </div>

                        {{-- commentaire --}}
                        <div class="commentaire">
                            <p class="number-comment">2 commentaires</p>
                            <div class="comment-person">
                                <div class="photo">
                                    <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                </div>
                                <div class="message">
                                    <div class="top">
                                        <h3 class="name">Nick Jefferson</h3>
                                        <p class="date">21 Juin 2021 à 13h40</p>
                                    </div>
                                    {{-- message --}}
                                    <p class="paragraph-site">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                                        Repellendus illo optio nostrum suscipit corporis? Ullam 
                                        temporibus alias repellendus ut, reprehenderit perferendis, 
                                        reiciendis exercitationem similique molestias inventore earum 
                                        ea quas quisquam!
                                    </p>
                                </div>
                            </div>
                            <a href="#"><button class="btn-standard --red mt-5">Répondre</button></a>

                            {{-- response form --}}
                            <div class="box-form-response">
                                <p class="paragraph-site">Répondre à <span class="--cl-red">Nick Jefferson</span></p>

                                <form action="" class="form-row form-response">
                                    <div class="col-lg-6">
                                        <div class="form--group">
                                            <input type="text" placeholder="Votre nom" class="form--group__input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form--group">
                                            <input type="text" placeholder="Votre e-mail" class="form--group__input">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form--group">
                                            <textarea placeholder="Votre commentaire" class="form--group__textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-standard --red">Poster votre commentaire</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- reponse commentaire --}}
                        <div class="commentaire --reponse">
                            <div class="comment-person">
                                <div class="photo">
                                    <img src="{{asset('assets/images/course_image5.jpg')}}" alt="photo">
                                </div>
                                <div class="message">
                                    <div class="top">
                                        <h3 class="name">Jonas Emmanuel</h3>
                                        <p class="date">21 Juin 2021 à 13h40</p>
                                    </div>
                                    {{-- message --}}
                                    <p class="paragraph-site">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                                        Repellendus illo optio nostrum suscipit corporis? Ullam 
                                        temporibus alias repellendus ut, reprehenderit perferendis, 
                                        reiciendis exercitationem similique molestias inventore earum 
                                        ea quas quisquam!
                                    </p>
                                </div>
                            </div>
                            <a href="#"><button class="btn-standard --red mt-5">Répondre</button></a>

                            {{-- response form --}}
                            <div class="box-form-response">
                                <p class="paragraph-site">Répondre à <span class="--cl-red">Jonas Emmanuel</span></p>
                                
                                <form action="" class="form-row form-response">
                                    <div class="col-lg-6">
                                        <div class="form--group">
                                            <input type="text" placeholder="Votre nom" class="form--group__input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form--group">
                                            <input type="text" placeholder="Votre e-mail" class="form--group__input">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form--group">
                                            <textarea placeholder="Votre commentaire" class="form--group__textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-standard --red">Poster votre commentaire</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="second-content">
                        {{-- search --}}
                        <form action="" class="form-search-blog">
                            <div class="form--group">
                                <input type="text" placeholder="Rechercher">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>

                        {{-- post recent --}}
                        <div class="post">
                            <h3 class="title mb-5">Posts Récents</h3>
                            <a href="#">
                                <div class="post-recent">
                                    <div class="image">
                                        <img src="{{asset('assets/images/blog_image2.jpg')}}" alt="">
                                    </div>
                                    <div class="desc">
                                        <h3>Lorem ipsum dolor sit amet.</h3>
                                        <p class="paragraph-site"><i class="fa fa-clock-o" aria-hidden="true"></i> 17 Juin 2021</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="post-recent">
                                    <div class="image">
                                        <img src="{{asset('assets/images/blog_image2.jpg')}}" alt="">
                                    </div>
                                    <div class="desc">
                                        <h3>Lorem ipsum dolor sit amet.</h3>
                                        <p class="paragraph-site"><i class="fa fa-clock-o" aria-hidden="true"></i> 17 Juin 2021</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="post-recent">
                                    <div class="image">
                                        <img src="{{asset('assets/images/blog_image2.jpg')}}" alt="">
                                    </div>
                                    <div class="desc">
                                        <h3>Lorem ipsum dolor sit amet.</h3>
                                        <p class="paragraph-site"><i class="fa fa-clock-o" aria-hidden="true"></i> 17 Juin 2021</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- categorie --}}
                        <div class="post">
                            <h3 class="title mb-5">Catégories</h3>
                            <div class="link-categorie">
                                <a href="#">Education</a>
                                <a href="#">Informatique</a>
                                <a href="#">Marketing</a>
                            </div>
                        </div>

                        {{-- tags --}}
                        <div class="post">
                            <h3 class="title mb-5">Tags</h3>
                            <div class="tags">
                                <a href="#">Education</a>
                                <a href="#">Informatique</a>
                                <a href="#">Marketing</a>
                                <a href="#">Business</a>
                            </div>
                        </div>

                        {{-- archives --}}
                        <div class="post">
                            <h3 class="title mb-5">Archives</h3>
                            <div class="link-categorie">
                                <a href="#">Juin 2021</a>
                                <a href="#">Juillet 2021</a>
                                <a href="#">Août 2021</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- read also --}}
    <section class="blog">
        <div class="container">
            <div class="heading mb-5">
                <span class="subTitle">Read also</span>
                <h2 class="title">Lire aussi</h2>
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
        </div>
    </section>

    {{-- Newsletter --}}
    @include('frontend/partials/newsletter')
</main> 
@endsection