@extends('backend/admin/layout/default', ['title' => "CEL || Tutoriels"])

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
                    <li><span>Tutoriels</span></li>
                </ul>
                <h3 class="title">Les Tutoriels</h3>
            </div>
            <!-- add tutorial -->
            <div class="box-tuto">
                <div class="box-btn">
                    <button class="btn-standard-2" data-toggle="modal" data-target="#createTuto">Ajouter un nouveau tutoriel</button>
                </div>
                <hr class="underline">
                <div class="row mt-5">
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#">
                            <div class="card-tuto">
                                <div class="image">
                                    <img src="{{asset('assets/images/user_image1.png')}}" alt="">
                                </div>
                                <div class="desc">
                                    <h2 class="title">Lorem ipsum dolor sit amet.</h2>
                                    <p class="paragraph">Il y a 12 minutes</p>
                                </div>
                                <div class="box-btn">
                                    <a href="#"><button class="btn-standard-dash --green">Mise en ligne</button></a>
                                    <a href="#"><button class="btn-standard-dash --red">Supprimer</button></a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#">
                            <div class="card-tuto">
                                <div class="image">
                                    <img src="{{asset('assets/images/user_image1.png')}}" alt="">
                                </div>
                                <div class="desc">
                                    <h2 class="title">Lorem ipsum dolor sit amet.</h2>
                                    <p class="paragraph">Il y a 12 minutes</p>
                                </div>
                                <div class="box-btn">
                                    <a href="#"><button class="btn-standard-dash --green">Mise en ligne</button></a>
                                    <a href="#"><button class="btn-standard-dash --red">Supprimer</button></a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#">
                            <div class="card-tuto">
                                <div class="image">
                                    <img src="{{asset('assets/images/user_image1.png')}}" alt="">
                                </div>
                                <div class="desc">
                                    <h2 class="title">Lorem ipsum dolor sit amet.</h2>
                                    <p class="paragraph">Il y a 12 minutes</p>
                                </div>
                                <div class="box-btn">
                                    <a href="#"><button class="btn-standard-dash --green">Mise en ligne</button></a>
                                    <a href="#"><button class="btn-standard-dash --red">Supprimer</button></a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#">
                            <div class="card-tuto">
                                <div class="image">
                                    <img src="{{asset('assets/images/user_image1.png')}}" alt="">
                                </div>
                                <div class="desc">
                                    <h2 class="title">Lorem ipsum dolor sit amet.</h2>
                                    <p class="paragraph">Il y a 12 minutes</p>
                                </div>
                                <div class="box-btn">
                                    <a href="#"><button class="btn-standard-dash --green">Mise en ligne</button></a>
                                    <a href="#"><button class="btn-standard-dash --red">Supprimer</button></a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- pagination -->
                <div class="my-pagination mt-5">
                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                    <div class="number">
                        <span><a href="#" class="active">1</a></span>
                        <span><a href="#">2</a></span>
                        <span>...</span>
                        <span><a href="#">6</a></span>
                    </div>
                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- add docs -->
            <div class="box-tuto">
                <div class="box-btn">
                    <button class="btn-standard-2" data-toggle="modal" data-target="#createDocs">Ajouter un nouveau documents</button>
                </div>
                <hr class="underline">
                <div class="row mt-5">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card-docs">
                            <div class="title-docs"><span>Titre du documents</span></div>
                        </div>
                    </div>
                </div>

                <!-- pagination -->
                <div class="my-pagination mt-5">
                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                    <div class="number">
                        <span><a href="#" class="active">1</a></span>
                        <span><a href="#">2</a></span>
                        <span>...</span>
                        <span><a href="#">6</a></span>
                    </div>
                    <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('other-content')
<!-- Modal create tuto -->
<div class="modal fade modalcreateTuto" id="createTuto" tabindex="-1" role="dialog" aria-labelledby="addSujetTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title">Créer un nouveau tutoriel</h4>
                <div class="icon-close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
            </div>
            <div class="modal-body">
                <form action="" class="form-row form-note">
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Titre du tutoriel</label>
                            <input type="text" class="form--group__input">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Lien du tutoriel</label>
                            <input type="text" class="form--group__input">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="import">Importer une image</label>
                            <div class="input-group input-file" name="Fichier1">
                                <input type="text" class="form-control form--group__input"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Date de mise en ligne</label>
                            <input type="date" class="form--group__input">
                        </div>
                    </div>
                </form>
                <div class="box-btn">
                    <button class="btn-standard-dash --blue mr-3" data-dismiss="modal">Retour</button>
                    <button class="btn-standard-dash --green">Créer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal create docs -->
<div class="modal fade modalcreateDocs" id="createDocs" tabindex="-1" role="dialog" aria-labelledby="addSujetTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title">Créer un nouveau document</h4>
                <div class="icon-close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
            </div>
            <div class="modal-body">
                <form action="" class="form-row form-note">
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Titre du document</label>
                            <input type="text" class="form--group__input">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="import">Importer une image</label>
                            <div class="input-group input-file" name="Fichier1">
                                <input type="text" class="form-control form--group__input"/>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="box-btn">
                    <button class="btn-standard-dash --blue mr-3" data-dismiss="modal">Retour</button>
                    <button class="btn-standard-dash --green">Créer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-personnel')
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