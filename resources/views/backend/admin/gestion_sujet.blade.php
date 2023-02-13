@extends('backend/admin/layout/default', ['title' => "CEL || Gestion des sujets"])

@section('css-personnel')
    
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-gestion-general">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Gestion des sujets</span></li>
                    </ul>
                    <h3 class="title">Gestion des sujets</h3>
                </div>
                <div class="historical">
                    <div class="heading-search">
                        <h3 class="title">Historique des sujets</h3>
                        <form action="" class="form-search">
                            <input type="text" placeholder="Rechercher ici...">
                        </form>
                    </div>
                    <hr class="underline">
                    <div class="historical-content">
                        <!-- tabs -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; Interrogations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">&#10070; Devoirs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">&#10070; Epreuves orales</a>
                            </li>
                        </ul>

                        <!-- content -->
                        <div class="tab-content" id="pills-tabContent">
                            <!-- interrogation mis en ligne -->
                            <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Type</h3>
                                                            <p class="paragraph">Interrogation</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">05 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Terminale D</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Physique-chimie</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Ayemou Emmanuel</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Type</h3>
                                                            <p class="paragraph">Interrogation</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">05 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Terminale D</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Physique-chimie</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Ayemou Emmanuel</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Type</h3>
                                                            <p class="paragraph">Interrogation</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">05 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Terminale D</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Physique-chimie</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Ayemou Emmanuel</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
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

                            <!-- devoirs -->
                            <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Type</h3>
                                                            <p class="paragraph">Devoir</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">12 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Troisième</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Français</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Adouko Celine</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Type</h3>
                                                            <p class="paragraph">Devoir</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">12 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Troisième</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Français</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Adouko Celine</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Type</h3>
                                                            <p class="paragraph">Devoir</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">12 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Troisième</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Français</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Adouko Celine</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- epreuves orales -->
                            <div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Type</h3>
                                                    <p class="paragraph">Orale</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Catégorie</h3>
                                                            <p class="paragraph">Textes</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">12 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Troisième</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Anglais</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Adjo marie monique</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Type</h3>
                                                    <p class="paragraph">Orale</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Catégorie</h3>
                                                            <p class="paragraph">Images</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">12 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Troisième</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Anglais</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Adjo marie monique</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="card-distinction --card-historical">
                                                <div class="content-th">
                                                    <div class="top">
                                                        <h3 class="title mb-3">Titre</h3>
                                                        <div class="partage">
                                                            <div class="text-partage">Partager</div>
                                                            <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
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
                                                    <p class="paragraph">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing
                                                    </p>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Type</h3>
                                                    <p class="paragraph">Orale</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Catégorie</h3>
                                                            <p class="paragraph">Textes</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Date</h3>
                                                            <p class="paragraph">12 juin 2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Classe</h3>
                                                            <p class="paragraph">Troisième</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Matière</h3>
                                                            <p class="paragraph">Anglais</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-th">
                                                    <h3 class="title mb-3">Professeur</h3>
                                                    <div class="content-prof">
                                                        <div class="avatar">
                                                            <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                        </div>
                                                        <p class="paragraph">Adjo marie monique</p>
                                                    </div>
                                                </div>
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('other-content')
    
@endsection

@section('script-personnel')
    
@endsection