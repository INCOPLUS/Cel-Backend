@extends('backend/enseignant/layout/default', ['title' => "CEL || Modifier mon mot de passe"])

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
                        <li><span>Mot de passe</span></li>
                    </ul>
                    <h3 class="title">Mot de passe</h3>
                </div>
                <div class="box-update-profil">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; Mot de passe</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                                    <div class="content">
                                        <h2 class="title-content">Mis à jour du mot de passe</h2>
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
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-personnel')
    <!-- script img preview -->
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

    <!-- input type file -->
    <script>
        function bs_input_file() {
            $(".input-file").before(
                function() {
                    if ( ! $(this).prev().hasClass('input-ghost') ) {
                        var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name",$(this).attr("name"));
                        element.change(function(){
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function(){
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function(){
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                        });
                        $(this).find('input').css("cursor","pointer");
                        $(this).find('input').mousedown(function() {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }
        $(function() {
            bs_input_file();
        });
    </script>
@endsection