@extends('backend/eleve/layout/default', ['title' => "CEL || Composition"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="composition">
            <div class="dash-heading mb-3">
                <ul class="my-breadcrumb">
                    <li><a href="{{route('eleve-accueil')}}">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Gestion des compositions</span></li>
                </ul>
            </div>
            <div class="composition-content">
                <div class="top-element">
                    <div class="dash-heading"><h3 class="title">Mes sujets</h3></div>
                    <a href="#" class="btn-standard-2"><i class="fa fa-file-text"></i>&nbsp; Historique des compositions</a>
                </div>
                <div class="row mt-5">
                    @if ($sujets_eleves->count() >= 1)
                        @foreach ($sujets_eleves as $sujets_eleve)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card-sujet">
                                    <div class="logo-arrierePlan">
                                        <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo">
                                    </div>
                                    <div class="card-sujet--content">
                                        <div class="desc">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="infor">
                                                        <h4>Titre</h4>
                                                        <p class="paragraph">{{ $sujets_eleve->sujet->type_sujet->libelle}} - {{ $sujets_eleve->sujet->matiere->libelle}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="infor">
                                                        <h4>Niveau</h4>
                                                        <p class="paragraph">{{ $sujets_eleve->sujet->niveau->libelle }} {{ $sujets_eleve->sujet->serie->libelle ?? ""}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="infor">
                                                        <h4>Durée</h4>
                                                        <p class="paragraph">{{ get_duree_string($sujets_eleve->sujet->duree) }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="infor">
                                                        <h4>Chapitre</h4>
                                                        <p class="paragraph">{{ $sujets_eleve->sujet->chapitre->libelle ?? "" }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="infor">
                                                        <h4>Leçon</h4>
                                                        <p class="paragraph">{{ $sujets_eleve->sujet->lecon->libelle ?? "Aucune précision" }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="infor">
                                                        <h4>Description</h4>
                                                        <p class="paragraph">{{ $sujets_eleve->sujet->description ?? "Aucune description" }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="infor">
                                                        <h4>Enseignant</h4>
                                                        <div class="content-prof">
                                                            <div class="avatar">
                                                                <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
                                                            </div>
                                                            <p class="paragraph">{{ $sujets_eleve->sujet->enseignant->utilisateur->nom_prenom }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-4">
                                            <a href="{{route('eleve-composition', $sujets_eleve->id_sujet_eleve)}}" class="btn-standard-dash --green"><i class="fa fa-pencil"></i> Composer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <h3 style="color: #f2f5ff; font-size: 3rem;">Vous n'avez aucun sujet pour le moment...</h3><br>
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