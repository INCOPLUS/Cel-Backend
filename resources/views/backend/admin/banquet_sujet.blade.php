@extends('backend/admin/layout/default', ['title' => "CEL || Banquet des sujets"])

@section('css-personnel')
    
@endsection

@section('page-content')
<!-- page content -->
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="box-gestion-general">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Banquet des sujets</span></li>
                </ul>
                <h3 class="title">Banquet des sujets</h3>
            </div>
            <div class="historical">
                <div class="heading-search">
                    <h3 class="title">Historique des sujets</h3>
                    <form action="" class="form-search">
                        <input type="text" placeholder="Rechercher ici...">
                    </form>
                </div>
                <hr class="underline">
                <div class="historical-content">

                    <div class="content">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card-distinction --card-historical">
                                    <div class="content-th">
                                        <h3 class="title mb-3">Titre</h3>
                                        <p class="paragraph">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Type</h3>
                                                <p class="paragraph">Devoir</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Date</h3>
                                                <p class="paragraph">05 juin 2021</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Classe</h3>
                                                <p class="paragraph">Terminale D</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="content-th underline-dot">
                                                <h3 class="title mb-3">Matière</h3>
                                                <p class="paragraph">Physique-chimie</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-th">
                                        <h3 class="title mb-3">Professeur</h3>
                                        <div class="content-prof">
                                            <div class="avatar">
                                                <img src="../images/user_image1.png" alt="photo">
                                            </div>
                                            <p class="paragraph">Ayemou Emmanuel</p>
                                        </div>
                                    </div>
                                    <div class="box-btn">
                                        <button class="btn-standard-2" data-toggle="modal" data-target="#modalSujetExam">Mettre en ligne</button>
                                        <div class="box-icon">
                                            <a href="#"><div class="icon --update"><i class="fa fa-pencil" aria-hidden="true"></i></div></a>
                                            <div class="icon --delete"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
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
    </div>
</div>
@endsection

@section('other-content')
<div class="modal fade modalSujetExam" id="modalSujetExam" tabindex="-1" aria-labelledby="modalSujetExamLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content content">
            <p class="paragraph">Configuration</p>
            <form action="" class="form-row form-note">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form--group">
                        <label for="classe">Classe</label>
                        <select class="custom-select form--group__select" id="classe">
                            <option selected>Choisir ...</option>
                            <option value="v1">CP1</option>
                            <option value="v2">CP2</option>
                            <option value="v3">CE1</option>
                            <option value="v4">CE2</option>
                            <option value="v5">CM1</option>
                            <option value="v6">CM2</option>
                            <option value="v7">6eme</option>
                            <option value="v8">5eme</option>
                            <option value="v9">4eme</option>
                            <option value="v10">3eme</option>
                            <option value="v11">2nd A</option>
                            <option value="v12">2nd C</option>
                            <option value="v13">1ere A1</option>
                            <option value="v14">1ere A2</option>
                            <option value="v15">1ere C</option>
                            <option value="v16">1ere D</option>
                            <option value="v17">Tle A1</option>
                            <option value="v18">Tle A2</option>
                            <option value="v19">Tle C</option>
                            <option value="v20">Tle D</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form--group">
                        <label for="matiere">Matière</label>
                        <select class="custom-select form--group__select" id="matiere">
                            <option selected>Choisir ...</option>
                            <option value="v1">Physique-chimie</option>
                            <option value="v2">Allemand</option>
                            <option value="v3">Anglais</option>
                            <option value="v4">Mathematique</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form--group">
                        <label for="typeExam">Type d'exam</label>
                        <select class="custom-select form--group__select" id="typeExam">
                            <option selected>Choisir ...</option>
                            <option value="v1"></option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form--group">
                        <label for="session">Session</label>
                        <select class="custom-select form--group__select" id="session">
                            <option selected>Choisir ...</option>
                            <option value="v1"></option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form--group">
                        <label for="serie">Série</label>
                        <select class="custom-select form--group__select" id="serie">
                            <option selected>Choisir ...</option>
                            <option value="v1"></option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="box-btn">
                <button class="btn-standard-dash --red btnChangeReturn" data-dismiss="modal">Retour</button>
                <button class="btn-standard-dash --green">Mettre en ligne</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-personnel')
    
@endsection