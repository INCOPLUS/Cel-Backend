@extends('backend/admin/layout/default', ['title' => "CEL || Gestion des examens"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-gestion-general">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="{{route('admin-accueil')}}">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Gestion des examens</span></li>
                    </ul>
                    <h3 class="title">Gestion des examens</h3>
                </div>
                <button class="btn-standard-2 mr-3" data-toggle="modal" data-target="#modalProgramme">Programmer un examen</button>
                <a href="{{route('admin-banquet-sujet')}}"><button class="btn-standard-4">Banquet de sujet</button></a>
                <div class="content-exam">
                    <!-- tabs -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; En cours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">&#10070; Terminer</a>
                        </li>
                    </ul>

                    <!-- content -->
                    <div class="tab-content" id="pills-tabContent">
                        <!-- tableau exam en cours -->
                        <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                            <!-- CEPE -->
                            <div class="content-table">
                                <div class="box-heading-table">
                                    <h3 class="title">Liste des candidats (CEPE)</h3>
                                </div>
                                <div class="response-table-2">
                                    <table class="table table-striped table-gestion" id="table1">
                                        <thead>
                                            <tr>
                                                <th scope="col">N° d'ordre</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom &amp; prénom(s)</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0026</td>
                                                <td>CEL0025</td>
                                                <td>Elidje Hoba Nick Jefferson</td>
                                                <td>Côte d'Ivoire</td>
                                                <td>Abidjan</td>
                                                <td>18 Novembre 2021</td>
                                                <td class="action">
                                                    <a href="{{route('admin-detail-candidat-examen')}}">
                                                        <div class="icon --view">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- BEPC -->
                            <div class="content-table">
                                <div class="box-heading-table">
                                    <h3 class="title">Liste des candidats (BEPC)</h3>
                                </div>
                                <div class="response-table-2">
                                    <table class="table table-striped table-gestion" id="table2">
                                        <thead>
                                            <tr>
                                                <th scope="col">N° d'ordre</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom &amp; prénom(s)</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0026</td>
                                                <td>CEL0025</td>
                                                <td>Elidje Hoba Nick Jefferson</td>
                                                <td>Côte d'Ivoire</td>
                                                <td>Abidjan</td>
                                                <td>18 Novembre 2021</td>
                                                <td class="action">
                                                    <a href="{{route('admin-detail-candidat-examen')}}">
                                                        <div class="icon --view">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- BAC -->
                            <div class="content-table">
                                <div class="box-heading-table">
                                    <h3 class="title">Liste des candidats (BAC)</h3>
                                </div>
                                <div class="response-table-2">
                                    <table class="table table-striped table-gestion" id="table3">
                                        <thead>
                                            <tr>
                                                <th scope="col">N° d'ordre</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom &amp; prénom(s)</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0026</td>
                                                <td>CEL0025</td>
                                                <td>Elidje Hoba Nick Jefferson</td>
                                                <td>Côte d'Ivoire</td>
                                                <td>Abidjan</td>
                                                <td>18 Novembre 2021</td>
                                                <td class="action">
                                                    <a href="{{route('admin-detail-candidat-examen')}}">
                                                        <div class="icon --view">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- CLASSE INTERMEDIAIRE -->
                            <div class="content-table">
                                <div class="box-heading-table">
                                    <h3 class="title">Liste des candidats (CLASSES INTERMEDIAIRES)</h3>
                                </div>
                                <div class="response-table-2">
                                    <table class="table table-striped table-gestion" id="table4">
                                        <thead>
                                            <tr>
                                                <th scope="col">N° d'ordre</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom &amp; prénom(s)</th>
                                                <th scope="col">Classe</th>
                                                <th scope="col">Type examen</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0026</td>
                                                <td>CEL0025</td>
                                                <td>Elidje Hoba Nick Jefferson</td>
                                                <td>CM1</td>
                                                <td>Test de mise à niveau</td>
                                                <td>Côte d'Ivoire</td>
                                                <td>Abidjan</td>
                                                <td>18 Novembre 2021</td>
                                                <td class="action">
                                                    <a href="{{route('admin-detail-candidat-examen')}}">
                                                        <div class="icon --view">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- tableau exam terminé -->
                        <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                            <!-- CEPE -->
                            <div class="content-table">
                                <div class="box-heading-table">
                                    <h3 class="title">Liste des candidats (CEPE)</h3>
                                </div>
                                <div class="response-table-2">
                                    <table class="table table-striped table-gestion" id="table5">
                                        <thead>
                                            <tr>
                                                <th scope="col">N° d'ordre</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom &amp; prénom(s)</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0026</td>
                                                <td>CEL0025</td>
                                                <td>Elidje Hoba Nick Jefferson</td>
                                                <td>Côte d'Ivoire</td>
                                                <td>Abidjan</td>
                                                <td>18 Novembre 2021</td>
                                                <td class="action">
                                                    <a href="{{route('admin-detail-candidat-examen')}}">
                                                        <div class="icon --view">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- BEPC -->
                            <div class="content-table">
                                <div class="box-heading-table">
                                    <h3 class="title">Liste des candidats (BEPC)</h3>
                                </div>
                                <div class="response-table-2">
                                    <table class="table table-striped table-gestion" id="table6">
                                        <thead>
                                            <tr>
                                                <th scope="col">N° d'ordre</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom &amp; prénom(s)</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0026</td>
                                                <td>CEL0025</td>
                                                <td>Elidje Hoba Nick Jefferson</td>
                                                <td>Côte d'Ivoire</td>
                                                <td>Abidjan</td>
                                                <td>18 Novembre 2021</td>
                                                <td class="action">
                                                    <a href="{{route('admin-detail-candidat-examen')}}">
                                                        <div class="icon --view">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- BAC -->
                            <div class="content-table">
                                <div class="box-heading-table">
                                    <h3 class="title">Liste des candidats (BAC)</h3>
                                </div>
                                <div class="response-table-2">
                                    <table class="table table-striped table-gestion" id="table7">
                                        <thead>
                                            <tr>
                                                <th scope="col">N° d'ordre</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom &amp; prénom(s)</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0026</td>
                                                <td>CEL0025</td>
                                                <td>Elidje Hoba Nick Jefferson</td>
                                                <td>Côte d'Ivoire</td>
                                                <td>Abidjan</td>
                                                <td>18 Novembre 2021</td>
                                                <td class="action">
                                                    <a href="{{route('admin-detail-candidat-examen')}}">
                                                        <div class="icon --view">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- CLASSE INTERMEDIAIRE -->
                            <div class="content-table">
                                <div class="box-heading-table">
                                    <h3 class="title">Liste des candidats (CLASSES INTERMEDIAIRES)</h3>
                                </div>
                                <div class="response-table-2">
                                    <table class="table table-striped table-gestion" id="table8">
                                        <thead>
                                            <tr>
                                                <th scope="col">N° d'ordre</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom &amp; prénom(s)</th>
                                                <th scope="col">Classe</th>
                                                <th scope="col">Type examen</th>
                                                <th scope="col">Pays</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Date d'inscription</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0026</td>
                                                <td>CEL0025</td>
                                                <td>Elidje Hoba Nick Jefferson</td>
                                                <td>CM1</td>
                                                <td>Test de mise à niveau</td>
                                                <td>Côte d'Ivoire</td>
                                                <td>Abidjan</td>
                                                <td>18 Novembre 2021</td>
                                                <td class="action">
                                                    <a href="{{route('admin-detail-candidat-examen')}}">
                                                        <div class="icon --view">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </a>
                                                </td>
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
    {{-- Modal programme examen --}}
    <div class="modal fade modalProgramme" id="modalProgramme" tabindex="-1" aria-labelledby="modalProgrammeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content content">
                <p class="paragraph">Programmation de l'examen</p>
                <form action="" class="form-row form-programmeExam">
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Date de début</label>
                            <input type="date" class="form--group__input">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Date de fin</label>
                            <input type="date" class="form--group__input">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Heure d'ouverture</label>
                            <input type="text" class="form--group__input">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Heure de fermeture</label>
                            <input type="text" class="form--group__input">
                        </div>
                    </div>
                </form>
                <div class="box-btn">
                    <button class="btn-standard-dash --red btnChangeReturn" data-dismiss="modal">Retour</button>
                    <button class="btn-standard-dash --green">Changer</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-personnel')
<script src="{{asset('assets/js/datatable/datatable.advanced.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.basic.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.init.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
            $('#table2').DataTable();
            $('#table3').DataTable();
            $('#table4').DataTable();
            $('#table5').DataTable();
            $('#table6').DataTable();
            $('#table7').DataTable();
            $('#table8').DataTable();
        } );
    </script>
@endsection