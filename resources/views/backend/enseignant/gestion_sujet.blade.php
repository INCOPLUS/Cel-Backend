@extends('backend/enseignant/layout/default', ['title' => "CEL || Gestion des sujets"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="box-gestion-general">
            <div class="dash-heading mb-3">
                <ul class="my-breadcrumb">
                    <li><a href="{{ route('enseignant-accueil') }}">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Gestion des sujets</span></li>
                </ul>
            </div>
            <div class="historical">
                <div class="heading-search">
                    <div class="dash-heading"><h3 class="title">Gestion des sujets</h3></div>
                    <div>
                        <a href="{{ route('enseignant-ajout-sujet') }}">
                            <button class="btn-standard-2"><i class="fa fa-plus"></i>&nbsp; Ajouter un nouveau sujet</button>
                        </a>
                        {{-- <form action="" class="form-search">
                            <input type="text" placeholder="Rechercher ici...">
                        </form> --}}
                    </div>
                </div>
                <hr class="underline">
                <div class="historical-content">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; Brouillons &nbsp;<span class="badge badge-info">{{ $brouillons->count() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">&#10070; Interrogations &nbsp;<span class="badge badge-info">{{ $interrogations->count() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">&#10070; Devoirs &nbsp;<span class="badge badge-info">{{ $devoirs->count() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs4-tab" data-toggle="pill" href="#tabs4" role="tab" aria-controls="tabs4" aria-selected="false">&#10070; En attente de correction &nbsp;<span class="badge badge-info">0</span></a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        {{-- Brouillons --}}
                        <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                            <div class="content">
                                <div class="row">
                                    @foreach ($brouillons as $brouillon)
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
                                                        {{ $brouillon->type_sujet->libelle}} - {{ $brouillon->matiere->libelle}}
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Niveau</h3>
                                                            <p class="paragraph">{{ $brouillon->niveau->libelle }} {{ $brouillon->serie->libelle ?? ""}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Durée</h3>
                                                            <p class="paragraph">{{ get_duree_string($brouillon->duree) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Chapitre</h3>
                                                            <p class="paragraph">{{ $brouillon->chapitre->libelle ?? "" }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Leçon</h3>
                                                            <p class="paragraph">{{ $brouillon->lecon->libelle ?? "Aucune précision" }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-12">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Description</h3>
                                                            <p class="paragraph">{{ $brouillon->description ?? "Aucune description" }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center mt-4">
                                                    <a class="btn-standard-dash --blue" href="{{ route('enseignant-modifier-sujet', $brouillon->id_sujet) }}">Modifier</a>
                                                    <a class="btn-standard-dash --green" href="{{ route('enseignant-previsualiser-sujet', $brouillon->id_sujet) }}">Prévisualiser</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-12 col-md-6 col-lg-4">
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
                                            <div class="box-btn">
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                                <a href="#">
                                                    <button class="btn-standard-3">Envoyer le sujet</button>
                                                </a>
                                            </div>
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
                                            <div class="box-btn">
                                                <a href="preview-sujet.html">
                                                    <button class="btn-standard-2">Visualiser le sujet</button>
                                                </a>
                                                <a href="#">
                                                    <button class="btn-standard-3">Envoyer le sujet</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                                {{-- Pagination --}}
                                {{-- <div class="my-pagination mt-5">
                                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                    <div class="number">
                                        <span><a href="#" class="active">1</a></span>
                                        <span><a href="#">2</a></span>
                                        <span>...</span>
                                        <span><a href="#">6</a></span>
                                    </div>
                                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div> --}}
                            </div>
                        </div>

                        {{-- Interrogations --}}
                        <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                            <div class="content">
                                <div class="row">
                                    @foreach ($interrogations as $interrogation)
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
                                                        {{ $interrogation->type_sujet->libelle}} - {{ $interrogation->matiere->libelle}}
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Niveau</h3>
                                                            <p class="paragraph">{{ $interrogation->niveau->libelle }} {{ $interrogation->serie->libelle ?? ""}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Durée</h3>
                                                            <p class="paragraph">{{ get_duree_string($interrogation->duree) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Chapitre</h3>
                                                            <p class="paragraph">{{ $interrogation->chapitre->libelle ?? "" }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Leçon</h3>
                                                            <p class="paragraph">{{ $interrogation->lecon->libelle ?? "Aucune précision" }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-12">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Description</h3>
                                                            <p class="paragraph">{{ $interrogation->description ?? "Aucune description" }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center mt-4">
                                                    <a class="btn-standard-dash --blue" href="{{ route('enseignant-modifier-sujet', $interrogation->id_sujet) }}">Modifier</a>
                                                    <a class="btn-standard-dash --green" href="{{ route('enseignant-previsualiser-sujet', $interrogation->id_sujet) }}">Prévisualiser</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-12 col-md-6 col-lg-4">
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
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
                                                <button class="btn-standard-2">Visualiser le sujet</button>
                                            </a>
                                        </div>
                                    </div> --}}

                                    <!-- pagination -->
                                    {{-- <div class="my-pagination mt-5">
                                        <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                        <div class="number">
                                            <span><a href="#" class="active">1</a></span>
                                            <span><a href="#">2</a></span>
                                            <span>...</span>
                                            <span><a href="#">6</a></span>
                                        </div>
                                        <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        {{-- Devoirs --}}
                        <div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
                            <div class="content">
                                <div class="row">
                                    @foreach ($devoirs as $devoir)
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
                                                        {{ $devoir->type_sujet->libelle}} - {{ $devoir->matiere->libelle}}
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Niveau</h3>
                                                            <p class="paragraph">{{ $devoir->niveau->libelle }} {{ $devoir->serie->libelle ?? ""}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Durée</h3>
                                                            <p class="paragraph">{{ get_duree_string($devoir->duree) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Chapitre</h3>
                                                            <p class="paragraph">{{ $devoir->chapitre->libelle ?? "" }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Leçon</h3>
                                                            <p class="paragraph">{{ $devoir->lecon->libelle ?? "Aucune précision" }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-12">
                                                        <div class="content-th underline-dot">
                                                            <h3 class="title mb-3">Description</h3>
                                                            <p class="paragraph">{{ $devoir->description ?? "Aucune description" }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center mt-4">
                                                    <a class="btn-standard-dash --blue" href="{{ route('enseignant-modifier-sujet', $devoir->id_sujet) }}">Modifier</a>
                                                    <a class="btn-standard-dash --green" href="{{ route('enseignant-previsualiser-sujet', $devoir->id_sujet) }}">Prévisualiser</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-12 col-md-6 col-lg-4">
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
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
                                                <button class="btn-standard-2">Visualiser le sujet</button>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>

                                <!-- pagination -->
                                {{-- <div class="my-pagination mt-5">
                                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                    <div class="number">
                                        <span><a href="#" class="active">1</a></span>
                                        <span><a href="#">2</a></span>
                                        <span>...</span>
                                        <span><a href="#">6</a></span>
                                    </div>
                                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div> --}}
                            </div>
                        </div>

                        {{-- Autres sujets --}}
                        <div class="tab-pane fade" id="tabs4" role="tabpanel" aria-labelledby="tabs4-tab">
                            <div class="content">
                                <div class="row">
                                    {{-- <div class="col-12 col-md-6 col-lg-4">
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
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
                                                <button class="btn-standard-2">Visualiser le sujet</button>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>

                                <!-- pagination -->
                                {{-- <div class="my-pagination mt-5">
                                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                    <div class="number">
                                        <span><a href="#" class="active">1</a></span>
                                        <span><a href="#">2</a></span>
                                        <span>...</span>
                                        <span><a href="#">6</a></span>
                                    </div>
                                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection