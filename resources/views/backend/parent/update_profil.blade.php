@extends('backend/parent/layout/default', ['title' => "CEL || Mise à jour du profil"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="profil">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><a href="profil.html">Profil</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Paramètre</span></li>
                </ul>
                <h3 class="title">Paramètre</h3>
            </div>
            <div class="box-update-profil">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; Informations générales</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">&#10070; Mot de passe</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">&#10070; Adresse E-mail</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                                <div class="content">
                                    <h2 class="title-content">Informations générales</h2>
                                    <form action="" class="form-row form-update-profil">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form--group">
                                                <label for="name">Nom & prénom(s)</label>
                                                <input type="text" name="name" id="name" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form--group">
                                                <label for="genre">Genre</label>
                                                <div class="button-radio-form">
                                                    <label class="radio">
                                                        <input type="radio" value="masculin" name="sexe">
                                                        <p class="paragraph">Masculin</p>
                                                        <span></span>
                                                    </label>
                                        
                                                    <label class="radio">
                                                        <input type="radio" value="feminin" name="sexe">
                                                        <p class="paragraph">Feminin</p>
                                                        <span></span>
                                                    </label>
                                                </div>
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
                                                <label for="profession">Profession</label>
                                                <input type="text" name="profession" id="profession" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form--group">
                                                <label for="children">Nombre d'enfant</label>
                                                <input type="number" name="children" id="children" min="1" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form--group">
                                                <label for="birth">Date de naissance</label>
                                                <input type="text" name="birth" id="birth" class="form--group__input">
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
                                                <label for="city">Ville</label>
                                                <input type="text" name="city" id="city" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form--group">
                                                <label for="common">Commune</label>
                                                <input type="text" name="common" id="common" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn-standard-2 mb-5">Sauvegarder</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                                <div class="content">
                                    <h2 class="title-content">Modification mot de passe</h2>
                                    <form action="" class="form-row form-update-profil">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form--group">
                                                <label for="password">Mot de passe actuel</label>
                                                <input type="password" name="password" id="password" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form--group">
                                                <label for="newPassword">Nouveau mot de passe</label>
                                                <input type="password" name="newPassword" id="newPassword" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form--group">
                                                <label for="confirmPassword">Confirmer le mot de passe</label>
                                                <input type="password" name="confirmPassword" id="confirmPassword" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn-standard-2 mb-5">Sauvegarder</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
                                <div class="content">
                                    <h2 class="title-content">Adresse E-mail</h2>
                                    <form action="" class="form-row form-update-profil">
                                        <div class="col-lg-8">
                                            <div class="form--group">
                                                <label for="email">Adresse E-mail</label>
                                                <input type="email" name="email" id="email" class="form--group__input">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn-standard-2 mb-5">Sauvegarder</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-personnel')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
        });
    </script>
@endsection