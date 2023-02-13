@extends('backend/eleve/layout/default', ['title' => "CEL || Sujets mis en ligne"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="composition">
            <div class="dash-heading mb-3">
                <ul class="my-breadcrumb">
                    <li><a href="{{route('eleve-accueil')}}">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Gestion des sujets</span></li>
                </ul>
            </div>
            <div class="composition-content">
                <div class="top-element">
                    <div class="dash-heading"><h3 class="title">Sujets mis en ligne</h3></div>
                    <div>
                        <a href="{{ route('eleve-panier') }}" class="btn-standard-2 mr-2"><i class="fa fa-shopping-cart"></i>&nbsp; Mon panier</a>
                        <button class="btn-standard-2" data-toggle="modal" data-target="#search_sujet"><i class="fa fa-search"></i>&nbsp; Rechercher</button>
                    </div>
                </div>
                <div class="row mt-5">
                    @if ($sujets->count() >= 1)
                        @foreach ($sujets as $sujet)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card-distinction">
                                    <div class="img-illust"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-th underline-dot">
                                                <div class="top">
                                                    <h3 class="title mb-3">Titre</h3>
                                                    <div class="add-panier" onclick="ajoutSujetPanier({{ $sujet->id_sujet }})">
                                                        <div class="text-partage">Ajouter au panier</div>
                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                        <span class="prix-sujet">{{ $sujet->type_sujet->montant }} XOF</span>
                                                    </div>
                                                </div>
                                                <p class="paragraph">{{ $sujet->type_sujet->libelle }} - {{ $sujet->matiere->libelle}}</p>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Niveau</h3>
                                                <p class="paragraph">{{ $sujet->niveau->libelle }} {{ $sujet->serie->libelle ?? ""}}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Durée</h3>
                                                <p class="paragraph">{{ get_duree_string($sujet->duree) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Chapitre</h3>
                                                <p class="paragraph">{{ $sujet->chapitre->libelle ?? "" }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Leçon</h3>
                                                <p class="paragraph">{{ $sujet->lecon->libelle ?? "Aucune précision" }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Description</h3>
                                                <p class="paragraph">{{ $sujet->description ?? "Aucune description" }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Enseignant</h3>
                                                <div class="content-prof">
                                                    <div class="avatar">
                                                        <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                    </div>
                                                    <p class="paragraph">{{ $sujet->enseignant->utilisateur->nom_prenom }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <button class="btn-standard-dash --blue" onclick="achatSujet({{ $sujet->id_sujet }}, {{ $sujet->type_sujet->montant }})"><i class="fa fa-credit-card"></i>&nbsp; Acheter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <h1 style="color: #f2f5ff; font-size: 6rem;">Oops...</h1><br><br>
                            <h3 style="color: #f2f5ff; font-size: 3rem;">Aucun sujet mis en ligne pour le moment...</h3>
                        </div>
                    @endif
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
    </div>
</div>
@endsection

@section('other-content')
    {{-- Modal Recherche Sujet --}}
    <div class="modal fade modalBlack" id="search_sujet" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Formulaire de recherche de sujet</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="#" class="form-row form-note" id="form_search_sujet">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="type_devoir">Type de sujet <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="type_devoir" required>
                                    <option value=""></option>
                                    @foreach ($typesujets as $typesujet)
                                    <option value="{{ $typesujet->id_typesujet }}">{{ $typesujet->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="niveau">Niveau</label>
                                <select class="custom-select form--group__select" id="niveau">
                                    <option value=""></option>
                                    @foreach ($niveaux as $niveau)
                                    <option value="{{ $niveau->id_niveau }}">{{ $niveau->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="matiere">Matière</label>
                                <select class="custom-select form--group__select" id="matiere">
                                    <option value=""></option>
                                    @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->id_matiere }}">{{ $matiere->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="chapitre">Chapitre</label>
                                <select class="custom-select form--group__select" id="chapitre">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="intitule_diplome">Intitulé du diplôme</label>
                                <input type="text" class="form--group__input" id="intitule_diplome">
                            </div>
                        </div> --}}
                        <div class="col-12 box-btn text-center">
                            <button class="btn-standard-dash --red mr-3" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                            <button type="submit" class="btn-standard-dash --blue" id="btn_search_sujet"><i class="fa fa-search"></i> Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal sujet terminé --}}
    <div class="modal-sujet-termine" id="modalConfirm">
        <div class="content text-center">
            {{-- <p class="paragraph">Vous serez débité de 200 XOF pour l'achat de ce sujet.</p> --}}
            <h3>Vous serez débité de 200 XOF pour l'achat de ce sujet.</h3><br>
            <h3>Voulez-vous continuer ?</h3><br>
            <div class="text-center">
                <button class="btn-standard-dash --red" onclick="">Annuler</button>
                <button class="btn-standard-dash --green" onclick="">Oui, Continuer</button>
            </div>
        </div>
    </div>
@endsection