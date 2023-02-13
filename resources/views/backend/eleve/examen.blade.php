@extends('backend/eleve/layout/default', ['title' => "CEL || Examen"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="profil">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Examen</span></li>
                </ul>
                <h3 class="title">Examen</h3>
            </div>
            <div class="box-examen">
                <div class="card-infor-exam">
                    <div class="row">
                        <div class="col-12 col-12 col-lg-5">
                            <div class="box-type-exam">
                                <h3 class="title">Type d'examen</h3>
                                <ul class="list">
                                    <li><p class="paragraph"><span>Examen :</span>CM2, 3<sup>éme</sup>, T<sup>le</sup></p></li>
                                    <li><p class="paragraph"><span>Test de mise à niveau:</span>Les classes intermédiaires</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="box-infor-inscription">
                                <p class="paragraph">Cliquer sur un bouton ci-dessous pour s'inscrire à un examen ou test de mise à niveau</p>
                                <div class="box-btn">
                                    <button class="btn-standard-dash --green" data-toggle="modal" data-target="#modalInscription">Je m'inscrire</button>
                                    <button class="btn-standard-dash --blue" data-toggle="modal" data-target="#modalInscription">Inscrire un tiers</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- liste des epreuves -->
                <div class="box-list-epreuve">
                    <div class="dispo-epreuve">
                        <p class="paragraph">Ouverture des épreuves: <span>le 20/11/2021</span> à 23h59min59s</p>
                        <p class="paragraph">Fermeture des épreuves: <span>le 30/11/2021</span> à 23h59min59s</p>
                    </div>
                    <h3 class="title">Liste des épreuves</h3>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="#">
                                <div class="epreuve disabled"><span>Anglais</span></div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="space-composition.html">
                                <div class="epreuve"><span>Français</span></div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="space-composition.html">
                                <div class="epreuve"><span>Mathématique</span></div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="space-composition.html">
                                <div class="epreuve"><span>SVT</span></div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="space-composition.html">
                                <div class="epreuve"><span>Philosophie</span></div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="space-composition.html">
                                <div class="epreuve"><span>Physique-chimie</span></div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="space-composition.html">
                                <div class="epreuve"><span>Espagnol</span></div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="space-composition.html">
                                <div class="epreuve"><span>Allemand</span></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- information -->
                <div class="box-information">
                    <h3 class="title">Information</h3>
                    <ul class="list">
                        <li><p class="paragraph">Les résultats sont proclamés le lendemain de la composition à partir de 12h</p></li>
                        <li><p class="paragraph">L’examen se tient chaque dernière semaine du mois. La compo se déroule sur 7 jours</p></li>
                        <li><p class="paragraph">Le candidat compose sur une semaine selon les horaires propre à lui dans la limite du temps de compo d’une semaine</p></li>
                        <li><p class="paragraph">Une matière ouverte doit être immédiatement traitée. Elle ne peut pas être reportée dèsqu’elle est ouverte sauf dans les délais du compte à rebours</p></li>
                        <li><p class="paragraph">Le nombre de place à l’examen est illimité</p></li>
                        <li><p class="paragraph">Les inscriptions pour participer à l’examen débutent chaque 1er du mois et sont ouvert jusqu’à la veille de la composition.</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('other-content')
<!-- Modal Inscription -->
<div class="modal fade modalInscription" id="modalInscription" tabindex="-1" aria-labelledby="modalInscriptionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content content">
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
            <form id="msform" class="progress-form">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active icon"><strong>Inscrirption</strong></li>
                    <li class="icon"><strong>Payement</strong></li>
                </ul>

                <fieldset>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="identifiant">ID</label>
                                <input type="text" name="identifiant" id="identifiant" class="form--group__input" value="CEL025" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="name">Nom &amp; prénom(s)</label>
                                <input type="text" name="name" id="name" class="form--group__input" value="Elidje Hiba Nick Jefferson" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="type">Type d'examen</label>
                                <select class="custom-select form--group__select" id="type">
                                    <option selected>Choisir ...</option>
                                    <option value="exam">EXamen</option>
                                    <option value="test">Test de mise à niveau</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="serie">Serie</label>
                                <select class="custom-select form--group__select" id="serie">
                                    <option selected>Choisir ...</option>
                                    <option value="A1">Série A1</option>
                                    <option value="A2">Série A2</option>
                                    <option value="C">Serie C</option>
                                    <option value="D">Série D</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="session">Session</label>
                                <select class="custom-select form--group__select" id="session">
                                    <option selected>Choisir ...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="classe">Classe</label>
                                <select class="custom-select form--group__select" id="classe">
                                    <option selected>Choisir ...</option>
                                    <option value="cm2">CM2</option>
                                    <option value="3eme">Troisième (3eme)</option>
                                    <option value="Tle">Terminale (Tle)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="hour">Heure d'oral</label>
                                <input type="text" name="hour" id="hour" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="pays">Pays</label>
                                <input type="text" name="pays" id="pays" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="ville">Ville</label>
                                <input type="text" name="ville" id="ville" class="form--group__input">
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next" class="next btn-standard-dash --green" value="Suivant" />
                </fieldset>
                <fieldset>
                    <h3 class="title">Recap des informations</h3>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>ID</h4>
                                <div class="recap">
                                    <span>CEL025</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>Nom &amp; prénom(s)</h4>
                                <div class="recap">
                                    <span>Elidje Hoba Nick Jefferson</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>Type d'examen</h4>
                                <div class="recap">
                                    <span>Examen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>Serie</h4>
                                <div class="recap">
                                    <span>Série D</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>Session</h4>
                                <div class="recap">
                                    <span>--</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>Classe</h4>
                                <div class="recap">
                                    <span>Terminale (Tle)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>Heure d'oral</h4>
                                <div class="recap">
                                    <span>15:00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>Pays</h4>
                                <div class="recap">
                                    <span>Côte d'Ivoire</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="box-recap">
                                <h4>Ville</h4>
                                <div class="recap">
                                    <span>Abidjan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5"></div>
                    <input type="button" name="previous" class="previous btn-standard-dash --blue" value="Précedent" />
                    <input type="submit" name="next" class="btn-standard-dash --green" value="Effectué le paiement" /> 
                </fieldset>
            </form>
            <div class="box-btn">
                <button class="btn-standard-dash --red" data-dismiss="modal">Sortir</button>
            </div>
        </div>
    </div>
</div>
@endsection