@extends('backend/admin/layout/default', ['title' => "CEL || Détails Candidat Examen"])

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
                    <li><a href="gestion-examen.html">Gestion des examens</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Information</span></li>
                </ul>
                <h3 class="title">Information du candidat</h3>
            </div>
            <button class="btn-standard-2 mb-5" data-toggle="modal" data-target="#modalReleveNote">Relévé de note</button>
            <div class="content-exam">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">N° d'ordre</h4>
                            <div class="text"><span>0026</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">ID</h4>
                            <div class="text"><span>CEL0025</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Nom &amp; prénom(s)</h4>
                            <div class="text"><span>Elidje Hoba Nick Jefferson</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Type d'examen</h4>
                            <div class="text"><span>Examen</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Série</h4>
                            <div class="text"><span>Série D</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Session</h4>
                            <div class="text"><span>--</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Classe</h4>
                            <div class="text"><span>Terminale</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Heure d'oral</h4>
                            <div class="text"><span>15:00</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Pays</h4>
                            <div class="text"><span>Côte d'Ivoire</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Ville</h4>
                            <div class="text"><span>Abidjan</span></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box-infor-candidat">
                            <h4 class="title">Date d'inscription</h4>
                            <div class="text"><span>18 Novembre 2021</span></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="box-infor-candidat">
                            <h4 class="title">Notes des epreuves</h4>
                            <div class="response-table-2">
                                <table class="table table-striped table-gestion">
                                    <thead>
                                        <tr>
                                            <th scope="col">Anglais</th>
                                            <th scope="col">Français</th>
                                            <th scope="col">Mathématique</th>
                                            <th scope="col">SVT</th>
                                            <th scope="col">Philosophie</th>
                                            <th scope="col">Physique-chimie</th>
                                            <th scope="col">Espagnol</th>
                                            <th scope="col">Allemand</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12/20</td>
                                            <td>11/20</td>
                                            <td>16/20</td>
                                            <td>13/20</td>
                                            <td>10/20</td>
                                            <td>16/20</td>
                                            <td>12/20</td>
                                            <td>14/20</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('other-content')
<!-- Modal programme examen -->
<div class="modal fade modalReleveNote" id="modalReleveNote" tabindex="-1" aria-labelledby="modalReleveNoteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content content">
            <h3 class="main-title">Relevé de notes</h3>
            <div class="releve">
                <h3 class="title">Baccalauréat de l'Enseignement Secondaire</h3>
                <div class="head">
                    <div class="serie-session">
                        <div class="mini-card">
                            <h4>Session</h4>
                            <span>2021</span>
                        </div>
                        <div class="mini-card">
                            <h4>Série</h4>
                            <span>D</span>
                        </div>
                    </div>
                    <h3 class="title-releve">Relevé de notes ou Attestation de réussite</h3>
                </div>
                <div class="content-text">
                    <div class="logocel"><img src="{{asset('assets/images/logo-cel.png')}}" alt="logo"></div>
                    <p class="paragraph text-center mt-4 mb-4">Vu le procès verbal de délibération, le Président de jury, soussigné, certifie que:</p>
                    <p class="paragraph"><strong>M/Mlle</strong><span>Elidje Hoba Nick Jefferson</span><br>
                        Né(e) le <span>10/02/1998</span> à <span>Yopougon</span><br>
                        Espace de composition <span>Plateforme Compo En Ligne (CEL)</span><br>
                        A été declaré(e): <span>Admin</span> avec une mention <span>Passable</span><br>
                        Avec les notes suivantes:
                    </p>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" class="--largeur">Epreuves</th>
                            <th scope="col">Coefficients</th>
                            <th scope="col">Notes</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="--align-initial">Mathématique</td>
                            <td>04</td>
                            <td class="--bold">36</td>
                          </tr>
                          <tr>
                            <td class="--align-initial">Science de la vie et de la terre</td>
                            <td>04</td>
                            <td class="--bold">40</td>
                          </tr>
                          <tr>
                            <td class="--align-initial">Physique-chimie</td>
                            <td>04</td>
                            <td class="--bold">64</td>
                          </tr>
                          <tr>
                            <td class="--align-initial">Français Ecrit</td>
                            <td>02</td>
                            <td class="--bold">18</td>
                          </tr>
                          <tr>
                            <td class="--align-initial">Français Oral</td>
                            <td>01</td>
                            <td class="--bold">12</td>
                          </tr>
                          <tr>
                            <td class="--align-initial">Philosophie</td>
                            <td>02</td>
                            <td class="--bold">12</td>
                          </tr>
                          <tr>
                            <td class="--align-initial">Histoire et Géographie</td>
                            <td>02</td>
                            <td class="--bold">18</td>
                          </tr>
                          <tr>
                            <td class="--align-initial">Anglais Oral</td>
                            <td>01</td>
                            <td class="--bold">12</td>
                          </tr>
                          <tr>
                            <td class="--align-initial --bold --uppercase">Total Général</td>
                            <td>20</td>
                            <td class="--bold">218</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
            <div class="box-btn">
                <button class="btn-standard-dash --red btnChangeReturn" data-dismiss="modal">Retour</button>
                <button class="btn-standard-dash --green">Envoyer le bulletin</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-personnel')
    
@endsection