@extends('backend/parent/layout/default', ['title' => "CEL || Composition"])

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="composition">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Composition</span></li>
                    </ul>
                    <h3 class="title">Composition</h3>
                </div>
                <a href="#">
                    <button class="btn-standard-2 mb-4" data-toggle="modal" data-target="#modalInscription">Inscrire une tierce personne pour un exam ou test</button>
                </a>
                <div class="composition-content">
                    <div class="top-element">
                        <h3 class="title-all-sujet">Mes sujets</h3>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card-sujet">
                                <div class="logo-arrierePlan">
                                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                                </div>
                                <div class="card-sujet--content">
                                    <div class="logo">
                                        <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                                    </div>
                                    <div class="desc">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="infor">
                                                    <h4>Titre</h4>
                                                    <p class="paragraph">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="infor">
                                                    <h4>Type</h4>
                                                    <p class="paragraph">Interrogation</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="infor">
                                                    <h4>Date mise en ligne</h4>
                                                    <p class="paragraph">12/06/2021</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="infor">
                                                    <h4>Heure mise en ligne</h4>
                                                    <p class="paragraph">Il y a 12 minute</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="infor">
                                                    <h4>Durée du sujet</h4>
                                                    <p class="paragraph">30 minutes</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <div class="infor">
                                                    <h4>Auteur</h4>
                                                    <p class="paragraph">Zogbande ouede jean</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="infor">
                                                    <h4>Pays / ville</h4>
                                                    <p class="paragraph">Côte d'ivoire / Bingerville</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn-standard-2 mt-4" 
                                    data-toggle="modal" data-target="#modalAttribution">
                                        Attribuer à un enfant
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
@endsection

@section('other-content')
    <!-- Modal Inscription -->
    <div class="modal fade modalInscription" id="modalInscription" tabindex="-1" aria-labelledby="modalInscriptionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content content">
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
                <form id="msform" class="progress-form">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active icon"><strong>Inscrirption</strong></li>
                        <li class="icon"><strong>Payement</strong></li>
                    </ul>

                    <fieldset>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="identifiant">ID</label>
                                    <input type="text" name="identifiant" id="identifiant" class="form--group__input" value="CEL025" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="name">Nom &amp; prénom(s)</label>
                                    <input type="text" name="name" id="name" class="form--group__input" value="Elidje Hiba Nick Jefferson" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="type">Type d'examen</label>
                                    <select class="custom-select form--group__select" id="type">
                                        <option selected>Choisir ...</option>
                                        <option value="exam">EXamen</option>
                                        <option value="test">Test de mise à niveau</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="serie">Serie</label>
                                    <select class="custom-select form--group__select" id="serie">
                                        <option selected>Choisir ...</option>
                                        <option value="A1">Série A1</option>
                                        <option value="A2">Série A2</option>
                                        <option value="C">Serie C</option>
                                        <option value="D">Série D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="session">Session</label>
                                    <select class="custom-select form--group__select" id="session">
                                        <option selected>Choisir ...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="classe">Classe</label>
                                    <select class="custom-select form--group__select" id="classe">
                                        <option selected>Choisir ...</option>
                                        <option value="cm2">CM2</option>
                                        <option value="3eme">Troisième (3eme)</option>
                                        <option value="Tle">Terminale (Tle)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="hour">Heure d'oral</label>
                                    <input type="text" name="hour" id="hour" class="form--group__input">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="pays">Pays</label>
                                    <input type="text" name="pays" id="pays" class="form--group__input">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form--group">
                                    <label for="ville">Ville</label>
                                    <input type="text" name="ville" id="ville" class="form--group__input">
                                </div>
                            </div>
                        </div>
                        <input type="button" name="next" class="next btn-standard-dash --green" value="Suivant" />
                    </fieldset>
                    <fieldset>
                        <h3 class="title">Recap des informations</h3>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>ID</h4>
                                    <div class="recap">
                                        <span>CEL025</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>Nom &amp; prénom(s)</h4>
                                    <div class="recap">
                                        <span>Elidje Hoba Nick Jefferson</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>Type d'examen</h4>
                                    <div class="recap">
                                        <span>Examen</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>Serie</h4>
                                    <div class="recap">
                                        <span>Série D</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>Session</h4>
                                    <div class="recap">
                                        <span>--</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>Classe</h4>
                                    <div class="recap">
                                        <span>Terminale (Tle)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>Heure d'oral</h4>
                                    <div class="recap">
                                        <span>15:00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>Pays</h4>
                                    <div class="recap">
                                        <span>Côte d'Ivoire</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-recap">
                                    <h4>Ville</h4>
                                    <div class="recap">
                                        <span>Abidjan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5"></div>
                        <input type="button" name="previous" class="previous btn-standard-dash --blue" value="Précedent" />
                        <input type="submit" name="next" class="btn-standard-dash --green" value="Effectué le paiement" /> 
                    </fieldset>
                </form>
                <div class="box-btn">
                    <button class="btn-standard-dash --red" data-dismiss="modal">Sortir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal attribution -->
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