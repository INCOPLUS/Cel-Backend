@extends('backend/eleve/layout/default')

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="welcome">
            <h2 class="title">Bienvenue sur votre Espace <span>cel</span></h2>
            <div class="box-infor">
                {{-- <div class="status">Elève</div> --}}
                <div class="academic-year">Apprenant</div>
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
                        <h3 class="title">Composition(s) effectuée(s)</h3>
                        <p class="number">{{ $compo_effectues->count() }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-stat-compo">
                        <h3 class="title">Composition(s) réussie(s)</h3>
                        <p class="number">{{ $compo_effectues->where('top_resultat', 1)->count() }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-stat-compo">
                        <h3 class="title">Composition(s) échouée(s)</h3>
                        <p class="number">{{ $compo_effectues->where('top_resultat', 0)->count() }}</p>
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