@extends('backend/enseignant/layout/default', ['title' => "CEL || Gestion des oraux"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-gestion-general">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Gestion des oraux</span></li>
                    </ul>
                    <h3 class="title">Gestion des oraux</h3>
                </div>
                <div class="oraux">
                    <h3 class="title-oral">Liste des élèves et étudiants pour l'oral</h3>
                    <div class="response-table">
                        <table class="table table-striped table-gestion" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom &amp; prénom(s)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Classe</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Heure de début</th>
                                    <th scope="col">Heure de fin</th>
                                    <th scope="col">Envoyer le sujet</th>
                                    <th scope="col">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>cel236</td>
                                    <td>Elidje grâce emmanuella</td>
                                    <td>élève</td>
                                    <td>Troisième</td>
                                    <td>01 01 01 01 01</td>
                                    <td>Oral d'anglais</td>
                                    <td>18 juin 2021</td>
                                    <td>09:20</td>
                                    <td>10:00</td>
                                    <td>
                                        <a href="#">
                                            <button class="btn-view">Envoyer le sujet</button>
                                        </a>
                                    </td>
                                    <td class="action">
                                        <button class="btn-view btnOpen" data-toggle="modal" data-target="#modalNote">Noter</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>cel021</td>
                                    <td>Prao ange christelle</td>
                                    <td>élève</td>
                                    <td>Terminale</td>
                                    <td>07 07 07 07 07</td>
                                    <td>Oral de français</td>
                                    <td>19 juin 2021</td>
                                    <td>09:20</td>
                                    <td>10:00</td>
                                    <td>
                                        <a href="#">
                                            <button class="btn-view">Envoyer le sujet</button>
                                        </a>
                                    </td>
                                    <td class="action">
                                        <button class="btn-view" data-toggle="modal" data-target="#modalNote">Noter</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('other-content')
    <div class="modal fade modal-note" id="modalNote" tabindex="-1" aria-labelledby="modalNoteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content content">
                <p class="paragraph">Note de l'oral</p>
                <form action="" class="form-row form-note">
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Note</label>
                            <input type="text" class="form--group__input">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form--group">
                            <label for="#">Noter sur</label>
                            <input type="text" class="form--group__input">
                        </div>
                    </div>
                </form>
                <div class="box-btn">
                    <button class="btn-standard-dash --blue" data-dismiss="modal">Retour</button>
                    <button class="btn-standard-dash --green">Valider la note</button>
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
        } );
    </script>
@endsection