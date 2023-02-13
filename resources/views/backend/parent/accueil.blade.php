@extends('backend/parent/layout/default')

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="welcome">
            <h2 class="title">Bienvenue sur votre Espace <span>cel</span></h2>
            <div class="box-infor">
                {{-- <div class="status">Parent d'Elève</div> --}}
                <div class="academic-year">Parent d'élève</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7">
                <div class="flash-info">
                    <p class="paragraph"><strong>A votre attention :</strong></p>
                    <p class="paragraph" style="font-size: 1.6rem">Veuillez mettre à jour votre profil afin de profiter pleinement de la plateforme. &nbsp;<a href="#">Cliquez ici...</a></p>
                    <div class="progress mt-4" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ $pourcentage_profil }}%;" aria-valuenow="{{ $pourcentage_profil }}" aria-valuemin="0" aria-valuemax="100">{{ $pourcentage_profil }}%</div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 col-md-6 col-lg-5">
                <div class="mis-a-jour">
                    <p class="paragraph"><span>Obligatoire:</span> Veuillez mettre à jour votre profil</p>
                    <a href="profil.html">Cliquer ici...</a>
                </div>
            </div> --}}
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-stat-compo">
                        <h3 class="title">Enfant(s) Inscrit(s)</h3>
                        <p class="number">{{ $enfants_inscrits }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-stat-compo">
                        <h3 class="title">Sujet(s) Traité(s)</h3>
                        <p class="number">0</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-stat-compo">
                        <h3 class="title">Sujet(s) Réussi(s)</h3>
                        <p class="number">0</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-content">
            <h4 class="title-content">Annonces publicitaires</h4>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-annonce">
                        <p class="paragraph">Annonce publicitaire ici...</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-annonce">
                        <p class="paragraph">Annonce publicitaire ici...</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-annonce">
                        <p class="paragraph">Annonce publicitaire ici...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection