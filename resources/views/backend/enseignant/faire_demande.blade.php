@extends('backend/enseignant/layout/default', ['title' => "CEL || Faire une demande"])

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="profil">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Demande</span></li>
                    </ul>
                    <h3 class="title">Faire une demande</h3>
                </div>
                <div class="box-demande">
                    <form action="" class="form-row form-demande">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="lastName">Prénom(s)</label>
                                <input type="text" name="lastName" id="lastName" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="tel">Téléphone</label>
                                <input type="text" name="tel" id="tel" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="Status">Status</label>
                                <input type="text" name="Status" id="Status" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="country">Pays</label>
                                <input type="text" name="country" id="country" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="typeDemande">Type de la demande</label>
                                <input type="text" name="typeDemande" id="typeDemande" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form--group">
                                <label for="demande">Demande</label>
                                <textarea name="demande" id="demande" class="form--group__textarea"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-standard-2">Soumettre ma demande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection