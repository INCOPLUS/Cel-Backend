@extends('backend/enseignant/layout/default', ['title' => "CEL || Distinctions"])

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="profil">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Distinctions</span></li>
                    </ul>
                    <h3 class="title">Distinctions</h3>
                </div>
                <div class="box-distinction">
                    <!-- tabs -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; Tableaux d'honneur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">&#10070; Challenges</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">&#10070; Prix remportés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs4-tab" data-toggle="pill" href="#tabs4" role="tab" aria-controls="tabs4" aria-selected="false">&#10070; Examens réussis</a>
                        </li>
                    </ul>

                    <!-- content -->
                    <div class="tab-content" id="pills-tabContent">
                        <!-- tableau d'honneur -->
                        <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                            <div class="content">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Text d'encouragement</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">
                                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut aspernatur, 
                                                    fuga soluta architecto fugiat animi, temporibus optio dignissimos nihil 
                                                    amet quia repellat dolores non accusamus. Alias laudantium distinctio quod tempora.
                                                </p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Classe</h3>
                                                <p class="paragraph">Terminale D</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Moyenne</h3>
                                                <p class="paragraph">17.55</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Année Académique</h3>
                                                <p class="paragraph">2020 - 2021</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Distinctions</h3>
                                                <p class="paragraph">
                                                    Tableau d'honneur + Encouragement + Felicitation
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Text d'encouragement</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">
                                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut aspernatur, 
                                                    fuga soluta architecto fugiat animi, temporibus optio dignissimos nihil 
                                                    amet quia repellat dolores non accusamus. Alias laudantium distinctio quod tempora.
                                                </p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Classe</h3>
                                                <p class="paragraph">Terminale D</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Moyenne</h3>
                                                <p class="paragraph">17.55</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Année Académique</h3>
                                                <p class="paragraph">2020 - 2021</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Distinctions</h3>
                                                <p class="paragraph">
                                                    Tableau d'honneur + Encouragement + Felicitation
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Text d'encouragement</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">
                                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut aspernatur, 
                                                    fuga soluta architecto fugiat animi, temporibus optio dignissimos nihil 
                                                    amet quia repellat dolores non accusamus. Alias laudantium distinctio quod tempora.
                                                </p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Classe</h3>
                                                <p class="paragraph">Terminale D</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Moyenne</h3>
                                                <p class="paragraph">17.55</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Année Académique</h3>
                                                <p class="paragraph">2020 - 2021</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Distinctions</h3>
                                                <p class="paragraph">
                                                    Tableau d'honneur + Encouragement + Felicitation
                                                </p>
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

                        <!-- challenges (defis) -->
                        <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                            <div class="content">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Matière</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Français</p>
                                            </div>
                                            <div class="content-th">
                                                <p class="paragraph">Vous avez rélévé le défis avec succès</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Note</h3>
                                                <p class="paragraph">17/20</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Temps mis</h3>
                                                <p class="paragraph">10min</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Matière</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Français</p>
                                            </div>
                                            <div class="content-th">
                                                <p class="paragraph">Vous avez rélévé le défis avec succès</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Note</h3>
                                                <p class="paragraph">17/20</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Temps mis</h3>
                                                <p class="paragraph">10min</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Matière</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Français</p>
                                            </div>
                                            <div class="content-th">
                                                <p class="paragraph">Vous avez rélévé le défis avec succès</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Note</h3>
                                                <p class="paragraph">17/20</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Temps mis</h3>
                                                <p class="paragraph">10min</p>
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

                        <!-- prix remporté -->
                        <div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
                            <div class="content">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Catégorie</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Meilleur éléve de sa promotion</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Classe</h3>
                                                <p class="paragraph">Terminale D</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Récompense obtenue</h3>
                                                <p class="paragraph">Bonus de 25.000 Fcfa sur CELPAY</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Moyenne générale obtenue</h3>
                                                <p class="paragraph">18.25/20</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Catégorie</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Meilleur éléve de sa promotion</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Classe</h3>
                                                <p class="paragraph">Terminale D</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Récompense obtenue</h3>
                                                <p class="paragraph">Bonus de 25.000 Fcfa sur CELPAY</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Moyenne générale obtenue</h3>
                                                <p class="paragraph">18.25/20</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Catégorie</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Meilleur éléve de sa promotion</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Classe</h3>
                                                <p class="paragraph">Terminale D</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Récompense obtenue</h3>
                                                <p class="paragraph">Bonus de 25.000 Fcfa sur CELPAY</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Moyenne générale obtenue</h3>
                                                <p class="paragraph">18.25/20</p>
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

                        <!-- examen reussis -->
                        <div class="tab-pane fade" id="tabs4" role="tabpanel" aria-labelledby="tabs4-tab">
                            <div class="content">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Type</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Examen Blanc</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Matière</h3>
                                                <p class="paragraph">Anglais</p>
                                            </div>
                                            <div class="content-th">
                                                <p class="paragraph">Vous avez réussis l'examen avec succès</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Points</h3>
                                                <p class="paragraph">170/200</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Type</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Examen Blanc</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Matière</h3>
                                                <p class="paragraph">Anglais</p>
                                            </div>
                                            <div class="content-th">
                                                <p class="paragraph">Vous avez réussis l'examen avec succès</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Points</h3>
                                                <p class="paragraph">170/200</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card-distinction">
                                            <div class="content-th">
                                                <div class="top">
                                                    <h3 class="title mb-3">Type</h3>
                                                    <div class="partage">
                                                        <div class="text-partage">Partager</div>
                                                        <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                                                        <div class="box-link-partage">
                                                            <a href="#">
                                                                <div class="icone --facebook">
                                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --instagram">
                                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --whatsapp">
                                                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <div class="icone --chat">
                                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="paragraph">Examen Blanc</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Matière</h3>
                                                <p class="paragraph">Anglais</p>
                                            </div>
                                            <div class="content-th">
                                                <p class="paragraph">Vous avez réussis l'examen avec succès</p>
                                            </div>
                                            <div class="content-th">
                                                <h3 class="title mb-3">Points</h3>
                                                <p class="paragraph">170/200</p>
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