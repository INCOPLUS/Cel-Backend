@extends('backend/eleve/layout/default', ['title' => "CEL || Mon panier"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="composition">
            <div class="dash-heading mb-3">
                <ul class="my-breadcrumb">
                    <li><a href="{{route('eleve-accueil')}}">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><a href="{{route('eleve-sujets')}}"><span>Sujets mis en ligne</span></a></li>
                </ul>
            </div>
            <div class="composition-content">
                <div class="top-element">
                    <div class="dash-heading"><h3 class="title">Mon panier <span class="ml-3 sujets-panier">{{$panier->count()}} sujet(s)</span></h3></div>
                    @if ($panier->count() >= 1)
                    <div>
                        <button class="btn-standard-2 mr-2" onclick="achatPanier({{$montant_panier}})"><i class="fa fa-check"></i>&nbsp; Valider Panier</button>
                        <button class="btn-standard-2" onclick="viderPanier()"><i class="fa fa-trash"></i>&nbsp; Vider Panier</button>
                    </div>
                    @endif
                </div>
                <div class="row mt-5">
                    @if ($panier->count() >= 1)
                        @foreach ($panier as $panier)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card-distinction">
                                    <div class="img-illust"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-th underline-dot">
                                                <div class="top">
                                                    <h3 class="title mb-3">Titre</h3>
                                                    <div class="add-panier" onclick="retraitSujetPanier({{ $panier->sujet->id_sujet }})">
                                                        <div class="text-partage">Retirer du panier</div>
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                        <span class="prix-sujet">{{$panier->sujet->type_sujet->montant}} XOF</span>
                                                    </div>
                                                </div>
                                                <p class="paragraph">{{ $panier->sujet->type_sujet->libelle }} - {{ $panier->sujet->matiere->libelle}}</p>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Niveau</h3>
                                                <p class="paragraph">{{ $panier->sujet->niveau->libelle }} {{ $panier->sujet->serie->libelle ?? ""}}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Durée</h3>
                                                <p class="paragraph">{{ get_duree_string($panier->sujet->duree) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Chapitre</h3>
                                                <p class="paragraph">{{ $panier->sujet->chapitre->libelle ?? "" }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Leçon</h3>
                                                <p class="paragraph">{{ $panier->sujet->lecon->libelle ?? "Aucune précision" }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Description</h3>
                                                <p class="paragraph">{{ $panier->sujet->description ?? "Aucune description" }}</p>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Enseignant</h3>
                                                <div class="content-prof">
                                                    <div class="avatar">
                                                        <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                    </div>
                                                    <p class="paragraph">{{ $panier->sujet->enseignant->utilisateur->nom_prenom }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <button class="btn-standard-dash --blue" onclick="achatSujet({{ $panier->sujet->id_sujet }}, {{ $panier->sujet->type_sujet->montant }})"><i class="fa fa-credit-card"></i>&nbsp; Acheter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <h3 style="color: #f2f5ff; font-size: 3rem;">Aucun sujet pour le moment...</h3><br>
                            <p style="color: #f2f5ff; font-size: 1.5rem;">Veuillez consuler la liste des sujets mis en ligne par les enseignants.</p><br><br>
                            <a href="{{ route('eleve-sujets') }}" class="btn-standard-2"><i class="fa fa-file-text"></i>&nbsp; Sujets mis en ligne</a>
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
   
@endsection