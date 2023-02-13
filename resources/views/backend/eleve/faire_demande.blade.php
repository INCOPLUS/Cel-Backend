@extends('backend/eleve/layout/default', ['title' => "CEL || Faire une demande"])

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
                <!-- tabs -->
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; Demande pour l'oral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">&#10070; Demande pour explication de cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">&#10070; Demande divers</a>
                    </li>
                </ul>

                <!-- content -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- demande oral -->
                    <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                        <div class="content">
                            <form action="" class="form-row form-demande">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="name">Nom & prénom(s)</label>
                                        <input type="text" name="name" id="name" class="form--group__input">
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
                                        <label for="matiere">Matière</label>
                                        <input type="text" name="matiere" id="matiere" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="type">Type de la demande</label>
                                        <input type="text" name="type" id="type" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="tel">Numero</label>
                                        <input type="text" name="tel" id="tel" class="form--group__input">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="classe">Classe</label>
                                        <input type="text" name="classe" id="classe" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="typeDemande">Heure pour l'oral</label>
                                        <input type="text" name="typeDemande" id="typeDemande" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-standard-2">Soumettre ma demande</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- demande explication de cours -->
                    <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                        <div class="content">
                            <form action="" class="form-row form-demande">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="name">Nom & prénom(s)</label>
                                        <input type="text" name="name" id="name" class="form--group__input">
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
                                        <label for="matiere">Matière</label>
                                        <input type="text" name="matiere" id="matiere" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="type">Type de la demande</label>
                                        <input type="text" name="type" id="type" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="tel">Numero</label>
                                        <input type="text" name="tel" id="tel" class="form--group__input">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="classe">Classe</label>
                                        <input type="text" name="classe" id="classe" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="typeDemande">Heure pour l'oral</label>
                                        <input type="text" name="typeDemande" id="typeDemande" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-standard-2">Soumettre ma demande</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- demande divers -->
                    <div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
                        <div class="content">
                            <form action="" class="form-row form-demande">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="name">Nom & prénom(s)</label>
                                        <input type="text" name="name" id="name" class="form--group__input">
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
                                        <label for="type">Type de la demande</label>
                                        <input type="text" name="type" id="type" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="tel">Numero</label>
                                        <input type="text" name="tel" id="tel" class="form--group__input">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="classe">Classe</label>
                                        <input type="text" name="classe" id="classe" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form--group">
                                        <label for="country">Pays / ville</label>
                                        <input type="text" name="country" id="country" class="form--group__input">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form--group">
                                        <label for="message">Message</label>
                                        <textarea name="messafe" id="message" class="form--group__textarea"></textarea>
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
        </div>
    </div>
</div>
@endsection