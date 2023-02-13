@extends('frontend/layout/default', ['title' => "CEL || Enseignement"])

@section('header')
    <header class="header --header-page">
        <div class="header-caption">
            <ul class="my-breadcrumb">
                <li><a href="{{route('accueil')}}">Accueil</a></li>
                <li class="spacing">&#8722;</li>
                <li><span>Enseignement</span></li>
            </ul>
            <h1 class="title">Enseignement</h1>
        </div>
        <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
    </header>
@endsection

@section('main')
<main>
    <section class="education-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="detail-education">
                        <div class="text">
                            <h2 class="title">Enseignement primaire</h2>
                            <p class="paragraph-site">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis facilis sequi deserunt nisi! Alias accusantium ducimus adipisci excepturi totam exercitationem! Veritatis, molestiae. Maxime deserunt totam non libero consectetur ut commodi.
                                Vel non pariatur nisi quis voluptates, illum assumenda ab, molestiae tempore atque sint libero numquam in doloremque nulla, molestias quasi? Quaerat fugit a ducimus fuga nulla corrupti vero quisquam eius!
                                Doloremque voluptatum atque quia odio nihil. Iusto fugiat accusamus sint vero adipisci veritatis, minima incidunt corporis dolorem quas at optio consectetur, consequatur quaerat eum. Nobis blanditiis quod aliquid esse. Mollitia!
                                Libero sed quod quam neque quaerat cum modi dignissimos eos magnam laborum cumque perferendis blanditiis, quos officia maxime et minus repudiandae recusandae enim ratione ea doloribus nisi quis! Animi, veritatis.
                            </p>
                        </div>
                        <div class="critere">
                            <h3 class="mb-4">Ce qui vous attend :</h3>
                            <p class="paragraph-site">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit
                            </p>
                            <p class="paragraph-site">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit
                            </p>
                            <p class="paragraph-site">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit
                            </p>
                            <p class="paragraph-site">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-education">
                        <div class="info-education-content">
                            <h3 class="title">Classes</h3>
                            <div class="element">
                                <p class="paragraph-site">cp1</p>
                                <p class="paragraph-site">cp2</p>
                                <p class="paragraph-site">ce1</p>
                                <p class="paragraph-site">ce2</p>
                                <p class="paragraph-site">cm1</p>
                                <p class="paragraph-site">cm2</p>
                            </div>
                        </div>
                        <div class="info-education-content">
                            <h3 class="title">Moyen de payement</h3>
                            <div class="element">
                                <p class="paragraph-site">Mobile Money</p>
                                <p class="paragraph-site">Celpay</p>
                            </div>
                        </div>
                        <div class="info-education-content">
                            <h3 class="title">Partager</h3>
                            <div class="reseaux">
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
                                    <div class="icone --linkedin">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="icone --whatsapp">
                                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a href="{{route('composition')}}"><button class="btn-standard --red">Composer maintenant</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="education">
        <div class="container">
            <div class="heading --center mb-5">
                <span class="subTitle">Our education</span>
                <h2 class="title">Enseignement</h2>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card-education">
                        <div class="image">
                            <div class="head">Compo en ligne</div>
                            <img src="{{asset('assets/images/course_image8.jpg')}}" alt="img">
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
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card-education">
                        <div class="image">
                            <div class="head">Compo en ligne</div>
                            <img src="{{asset('assets/images/course_image8.jpg')}}" alt="img">
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

    {{-- Newsletter --}}
    @include('frontend/partials/newsletter')
</main>
@endsection