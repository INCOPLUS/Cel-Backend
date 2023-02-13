@extends('backend/parent/layout/default', ['title' => "CEL || Documents"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="releve-note">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Documents</span></li>
                </ul>
                <h3 class="title">Documents</h3>
            </div>
            <hr class="underline">
            <div class="box-form-doc">
                <h3 class="title">Rélévé de note</h3>
                <form action="" class="form-row form-doc">
                    <div class="col-12 col-md-4">
                        <div class="form--group">
                            <label for="children">Enfants</label>
                            <select class="custom-select form--group__select" id="annee">
                                <option selected>Sélectionnez votre enfant</option>
                                <option value="v1">Elidje Hoba Nick Jefferson</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form--group">
                            <label for="annee">Année Academique</label>
                            <select class="custom-select form--group__select" id="annee">
                                <option selected>Sélectionnez une année</option>
                                <option value="v1">2021 - 2022</option>
                                <option value="v2">2020 - 2021</option>
                                <option value="v2">2019 - 2020</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form--group">
                            <label for="niveau">Niveau d'etude</label>
                            <select class="custom-select form--group__select" id="niveau">
                                <option selected>Sélectionnez une année</option>
                                <option value="v1"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="paragraph --red mb-5">NB: Pour télécharger votre relevé de note, veuillez cliquer sur le bouton "Télécharger", ci-dessous.</p>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn-standard-2">Afficher</button>
                    </div>
                </form>
            </div>
            <div class="box-releve">
                <p class="paragraph">Espace pour le rélévé de note</p>

                <!-- btn download -->
                <div class="btn-download">
                    <a href="#" target="_blank">
                        <button class="btn-standard-3">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Télécharger
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection