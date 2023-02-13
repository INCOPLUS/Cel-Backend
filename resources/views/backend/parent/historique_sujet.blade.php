@extends('backend/parent/layout/default', ['title' => "CEL || Historique des sujets"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="composition">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><a href="liste-enfant.html">Liste des enfants</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Historique</span></li>
                </ul>
                <h3 class="title">Historique des sujets</h3>
            </div>
            <div class="name-student">Elidje Hoba Nick Jefferson</div>
            <div class="historical">
                <div class="historical-content">
                    <!-- tabs -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; Sujets réussis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">&#10070; Sujets échoué</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">&#10070; Examens réussis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs4" role="tab" aria-controls="tabs4" aria-selected="false">&#10070; Examens échoué</a>
                        </li>
                    </ul>

                    <!-- content -->
                    <div class="tab-content" id="pills-tabContent">
                        <!-- sujets reussis -->
                        <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                            <div class="content">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction --card-historical">
                                            <div class="row">
                                                <div class="col-12">
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
                                                </div>
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
                                                        <p class="paragraph">Français</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Temps mis</h3>
                                                        <p class="paragraph">10 minutes</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Note obtenue</h3>
                                                        <p class="paragraph">17/20</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Mention</h3>
                                                        <p class="paragraph">Excellent</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="content-th">
                                                        <h3 class="title mb-3">Professeur</h3>
                                                        <div class="content-prof">
                                                            <div class="avatar">
                                                                <img src="../images/user_image1.png" alt="photo">
                                                            </div>
                                                            <p class="paragraph">Ayemou Emmanuel</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- buttons -->
                                            <div class="box-btn">
                                                <a href="view-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                                <button class="btn-standard-dash --green btnAttribution" 
                                                data-toggle="modal" data-target="#modalAttribution">
                                                    Réattribuer
                                                </button>
                                            </div>
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

                        <!-- sujets echoué -->
                        <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                            <div class="content">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction --card-historical">
                                            <div class="row">
                                                <div class="col-12">
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
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Type</h3>
                                                        <p class="paragraph">Devoir</p>
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
                                                        <p class="paragraph">Anglais</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Temps mis</h3>
                                                        <p class="paragraph">45 minutes</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Note obtenue</h3>
                                                        <p class="paragraph">07/20</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Mention</h3>
                                                        <p class="paragraph">Insuffant</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="content-th">
                                                        <h3 class="title mb-3">Professeur</h3>
                                                        <div class="content-prof">
                                                            <div class="avatar">
                                                                <img src="../images/user_image1.png" alt="photo">
                                                            </div>
                                                            <p class="paragraph">Ayemou Emmanuel</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- buttons -->
                                            <div class="box-btn">
                                                <a href="view-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                                <button class="btn-standard-dash --green btnAttribution" 
                                                data-toggle="modal" data-target="#modalAttribution">
                                                    Réattribuer
                                                </button>
                                            </div>
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

                        <!-- examens reussis -->
                        <div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
                            <div class="content">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction --card-historical">
                                            <div class="row">
                                                <div class="col-12">
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
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Type</h3>
                                                        <p class="paragraph">Examen</p>
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
                                                        <p class="paragraph">Mathématique</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Temps mis</h3>
                                                        <p class="paragraph">1h 45 munites</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Note obtenue</h3>
                                                        <p class="paragraph">14/20</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Mention</h3>
                                                        <p class="paragraph">Assez bien</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="content-th">
                                                        <h3 class="title mb-3">Professeur</h3>
                                                        <div class="content-prof">
                                                            <div class="avatar">
                                                                <img src="../images/user_image1.png" alt="photo">
                                                            </div>
                                                            <p class="paragraph">Ayemou Emmanuel</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- buttons -->
                                            <div class="box-btn">
                                                <a href="view-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                                <button class="btn-standard-dash --green btnAttribution" 
                                                data-toggle="modal" data-target="#modalAttribution">
                                                    Réattribuer
                                                </button>
                                            </div>
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

                        <!-- examens echoué -->
                        <div class="tab-pane fade" id="tabs4" role="tabpanel" aria-labelledby="tabs4-tab">
                            <div class="content">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction --card-historical">
                                            <div class="row">
                                                <div class="col-12">
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
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Type</h3>
                                                        <p class="paragraph">Examen</p>
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
                                                        <p class="paragraph">Philosophie</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Temps mis</h3>
                                                        <p class="paragraph">1h 50 munites</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Note obtenue</h3>
                                                        <p class="paragraph">04/20</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="content-th underline-dot">
                                                        <h3 class="title mb-3">Mention</h3>
                                                        <p class="paragraph">Mal</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="content-th">
                                                        <h3 class="title mb-3">Professeur</h3>
                                                        <div class="content-prof">
                                                            <div class="avatar">
                                                                <img src="../images/user_image1.png" alt="photo">
                                                            </div>
                                                            <p class="paragraph">Ayemou Emmanuel</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- buttons -->
                                            <div class="box-btn">
                                                <a href="view-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                                <button class="btn-standard-dash --green btnAttribution" 
                                                data-toggle="modal" data-target="#modalAttribution">
                                                    Réattribuer
                                                </button>
                                            </div>
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('other-content')
<div class="modal fade modalAttribution" id="modalAttribution" tabindex="-1" aria-labelledby="modalAttributionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content content">
            <p class="paragraph">Attribution</p>
            <form action="" class="form-row form-note">
                <div class="col-12">
                    <div class="form--group">
                        <label for="#">Selectionner votre enfant</label>
                        <select class="custom-select form--group__select" id="enseignement">
                            <option selected>Choisir ...</option>
                            <option value="m1">Elidje Hoba Nick Jefferson</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="box-btn">
                <button class="btn-standard-dash --red" data-dismiss="modal">Retour</button>
                <button class="btn-standard-dash --green">Attribuer</button>
            </div>
        </div>
    </div>
</div>
@endsection