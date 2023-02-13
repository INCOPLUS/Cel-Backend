@extends('backend/enseignant/layout/default')

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="welcome">
            <h2 class="title">Bienvenue sur votre Espace <span>cel</span></h2>
            <div class="box-infor">
                {{-- <div class="status">Enseignant</div> --}}
                {{-- <div class="academic-year">Année Academique: 2021 - 2022</div> --}}
                <div class="academic-year">Enseignant du {{ $user->enseignant->enseignement->libelle }}</div>
            </div>
        </div>
        <div class="row">
            @if ($pourcentage_profil <= 80)
            <div class="col-12 col-md-7">
                <div class="flash-info">
                    <p class="paragraph"><strong>A votre attention :</strong></p>
                    <p class="paragraph" style="font-size: 1.6rem">Veuillez mettre à jour votre profil afin de profiter pleinement de la plateforme. &nbsp;<a href="{{ route('enseignant-maj-profil') }}">Cliquez ici...</a></p>
                    
                    <div class="progress mt-4" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ $pourcentage_profil }}%;" aria-valuenow="{{ $pourcentage_profil }}" aria-valuemin="0" aria-valuemax="100">{{ $pourcentage_profil }}%</div>
                    </div>
                </div>
            </div>
            @endif
            {{-- <div class="col-12 col-md-6">
                <div class="mis-a-jour">
                    <p class="paragraph"><span>Obligatoire:</span> Veuillez mettre à jour votre profil.</p>
                    <a href="{{ route('enseignant-maj-profil') }}">Cliquez ici...</a>
                </div>
            </div> --}}
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-stat-compo">
                        <h3 class="title">Sujet(s) mis en ligne</h3>
                        <p class="number">{{ Auth::user()->enseignant->sujets()->where('top_actif', 1)->count() }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-stat-compo">
                        <h3 class="title">Sujet(s) traité(s)</h3>
                        <p class="number">{{ $sujets_traites }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-stat-compo">
                        <h3 class="title">Interrogation(s) orale(s)</h3>
                        <p class="number">0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-content">
            <h4 class="title-content">Annonces publicitaires</h4>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-annonce">
                            <p class="paragraph">Annonce publicitaire ici...</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-annonce">
                            <p class="paragraph">Annonce publicitaire ici...</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#">
                        <div class="card-annonce">
                            <p class="paragraph">Annonce publicitaire ici...</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection