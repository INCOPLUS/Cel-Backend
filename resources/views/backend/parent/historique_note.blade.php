@extends('backend/parent/layout/default', ['title' => "CEL || Historique des notes"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="profil">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><a href="liste-enfant.html">Liste des enfants</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Historique des notes</span></li>
                    </ul>
                    <h3 class="title">Historique des notes</h3>
                </div>
                <div class="content-table">
                    <div class="response-table-2">
                        <table class="table table-striped table-gestion" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom &amp; prénom(s)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Classe</th>
                                    <th scope="col">Matières</th>
                                    <th scope="col">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>cel201</td>
                                    <td>Elidje Hoba Nick Jefferson</td>
                                    <td>Eleve</td>
                                    <td>Terminale</td>
                                    <td>Interrogation</td>
                                    <td>Anglais</td>
                                    <td>15/20</td>
                                </tr>
                                <tr>
                                    <td>cel201</td>
                                    <td>Elidje Hoba Nick Jefferson</td>
                                    <td>Eleve</td>
                                    <td>Terminale</td>
                                    <td>Devoir</td>
                                    <td>Mathématique</td>
                                    <td>12/20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
    <script src="{{asset('assets/js/sidebarToggle.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        } );
    </script>
@endsection