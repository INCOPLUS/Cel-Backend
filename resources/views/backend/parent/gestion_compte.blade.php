@extends('backend/parent/layout/default', ['title' => "CEL || Gestion des comptes"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="profil">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Gestion compte enfants</span></li>
                </ul>
                <h3 class="title">Gestion des comptes</h3>
            </div>
        </div>
        <hr class="underline">
        <div class="box-gestion">
            <h2 class="title-create">Créer un compte pour son enfant</h2>
            <div class="box-form">
                <form action="" class="form-update-profil">
                    <fieldset class="form-row">
                        <div class="col-12">
                            <h3 class="title-form">&#10070; Photo de profil</h3>
                        </div>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('images/user.svg');">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-row">
                        <div class="col-12">
                            <h3 class="title-form">&#10070; Informations générales</h3>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="name">Nom & prénom(s)</label>
                                <input type="text" name="name" id="name" class="form--group__input">
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
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="email" class="form--group__input">
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
                                <label for="school">Etablissement</label>
                                <input type="text" name="school" id="school" class="form--group__input">
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
                    </fieldset>
                    <fieldset class="form-row">
                        <div class="col-12">
                            <h3 class="title-form">&#10070; Mot de passe</h3>
                        </div>
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
                    </fieldset>
                </form>
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