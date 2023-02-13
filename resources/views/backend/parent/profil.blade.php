@extends('backend/parent/layout/default', ['title' => "CEL || Mon profil"])

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
                                <h2 class="name">Elidje Hoba Nick Jefferson</h2>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn-standard-dash --blue" style="width: 100%;">Valider</button>
                                </div>
                            </form>
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
                                            <p class="paragraph">00125</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="box-infor">
                                        <h4 class="title">Nom & prénom(s)</h4>
                                        <div class="min-banner">
                                            <p class="paragraph">Elidje Hoba Nick Jefferson</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="box-infor">
                                        <h4 class="title">E-mail</h4>
                                        <div class="min-banner">
                                            <p class="paragraph --email">jeffersonelidje@gmail.com</p>
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
                                            <p class="paragraph">01 01 01 01 01</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="box-infor">
                                        <h4 class="title">Profession</h4>
                                        <div class="min-banner">
                                            <p class="paragraph">Avocat</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="box-infor">
                                        <h4 class="title">Nombre d'enfant</h4>
                                        <div class="min-banner">
                                            <p class="paragraph">3</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="box-infor">
                                        <h4 class="title">Date de naissance</h4>
                                        <div class="min-banner">
                                            <p class="paragraph">10/02/1988</p>
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