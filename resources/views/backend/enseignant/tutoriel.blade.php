@extends('backend/enseignant/layout/default', ['title' => "CEL || Tutoriels"])

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="profil">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Tutoriels</span></li>
                    </ul>
                    <h3 class="title">Les Tutoriels</h3>
                </div>
                <!-- add tutorial -->
                <div class="box-tuto">
                    <hr class="underline">
                    <div class="row mt-5">
                        <div class="col-12 col-md-6 col-lg-3">
                            <a href="#">
                                <div class="card-tuto">
                                    <div class="image">
                                        <img src="{{asset('assets/images/user_image1.png')}}" alt="">
                                    </div>
                                    <div class="desc">
                                        <h2 class="title">Lorem ipsum dolor sit amet.</h2>
                                        <p class="paragraph">Il y a 12 minutes</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <a href="#">
                                <div class="card-tuto">
                                    <div class="image">
                                        <img src="{{asset('assets/images/user_image1.png')}}" alt="">
                                    </div>
                                    <div class="desc">
                                        <h2 class="title">Lorem ipsum dolor sit amet.</h2>
                                        <p class="paragraph">Il y a 12 minutes</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <a href="#">
                                <div class="card-tuto">
                                    <div class="image">
                                        <img src="{{asset('assets/images/user_image1.png')}}" alt="">
                                    </div>
                                    <div class="desc">
                                        <h2 class="title">Lorem ipsum dolor sit amet.</h2>
                                        <p class="paragraph">Il y a 12 minutes</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <a href="#">
                                <div class="card-tuto">
                                    <div class="image">
                                        <img src="{{asset('assets/images/user_image1.png')}}" alt="">
                                    </div>
                                    <div class="desc">
                                        <h2 class="title">Lorem ipsum dolor sit amet.</h2>
                                        <p class="paragraph">Il y a 12 minutes</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- pagination -->
                    <div class="my-pagination mt-5">
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

                <!-- add docs -->
                <div class="box-tuto">
                    <hr class="underline">
                    <div class="row mt-5">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card-docs">
                                <div class="title-docs"><span>Titre du documents</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- pagination -->
                    <div class="my-pagination mt-5">
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
    </div>
@endsection