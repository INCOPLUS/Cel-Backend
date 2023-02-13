@extends('backend/admin/layout/default', ['title' => "CEL || Mon profil"])

@section('css-personnel')
    
@endsection

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="profil">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Profil</span></li>
                </ul>
                <h3 class="title">Mon profil</h3>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="card-profil">
                        <form>
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
                            <h2 class="name">Zogbande ouede jean</h2>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn-standard-dash --blue" style="width: 100%;">Valider</button>
                            </div>
                        </form>
                    </div>
                    <div class="box-sociaux">
                        <a href="#">
                            <div class="icon-social --facebook">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-social --instagram">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-social --whatsapp">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="infor-perso">
                        <h2 class="title-principal">Informations personnelles</h2>
                        <div class="row mt-5">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Identifiant</h4>
                                    <div class="min-banner">
                                        <p class="paragraph">cel00243</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Nom & prénom(s)</h4>
                                    <div class="min-banner">
                                        <p class="paragraph">Zogbande ouede jean</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Adresse E-mail</h4>
                                    <div class="min-banner">
                                        <p class="paragraph --email">incoplus@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Genre</h4>
                                    <div class="min-banner">
                                        <p class="paragraph">Masculin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Téléphone</h4>
                                    <div class="min-banner">
                                        <p class="paragraph --email">07 07 07 07 07</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Status</h4>
                                    <div class="min-banner">
                                        <p class="paragraph">Administrateur</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8">
                                <div class="box-infor">
                                    <h4 class="title">Rôle</h4>
                                    <div class="min-banner">
                                        <p class="paragraph">Ajouter / Modifier / supprimer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Pays</h4>
                                    <div class="min-banner">
                                        <p class="paragraph">Côte d'Ivoire</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Ville</h4>
                                    <div class="min-banner">
                                        <p class="paragraph">Abidjan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="box-infor">
                                    <h4 class="title">Commune</h4>
                                    <div class="min-banner">
                                        <p class="paragraph">Yopougon</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="update-profil.html">
                            <button class="btn-standard-2 --right mb-5">Modifier mes informations</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

@section('other-content')
    
@endsection

@section('script-personnel')
<script>
    // Script img preview
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