@extends('backend/parent/layout/default', ['title' => "CEL || Liste des enfants"])

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
                    <li><span>Liste des enfants</span></li>
                </ul>
                <h3 class="title">Liste des enfants</h3>
            </div>
            <div class="content-table">
                <div class="response-table-2">
                    <table class="table table-striped table-gestion" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom &amp; prénom(s)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Distinctions</th>
                                <th scope="col">Historique</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>cel201</td>
                                <td>Elidje Hoba Nick Jefferson</td>
                                <td>Eleve</td>
                                <td>Masculin</td>
                                <td>Terminale</td>
                                <td>
                                    <a href="historique-note.html">
                                        <button class="btn-view">Voir</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="distinction.html">
                                        <button class="btn-view --green">Voir</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="historique-sujet.html">
                                        <button class="btn-view">Voir</button>
                                    </a>
                                </td>
                                <td class="actionMultiple">
                                    <div class="btn-action">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        actions
                                    </div>
                                    <div class="box-actions">
                                        <a href="profil-view.html" class="link">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <p class="paragraph">Voir le profil</p>
                                        </a>
                                        <a href="#" class="link">
                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            <p class="paragraph">Suspendre</p>
                                        </a>
                                        <a href="#" class="link">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            <p class="paragraph">Supprimer</p>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>cel331</td>
                                <td>Kouadio Epiphanie</td>
                                <td>Etudiante</td>
                                <td>Feminin</td>
                                <td>Licence 1</td>
                                <td>
                                    <a href="historique-note.html">
                                        <button class="btn-view">Voir</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="distinction.html">
                                        <button class="btn-view  --green">Voir</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="historique-sujet.html">
                                        <button class="btn-view">Voir</button>
                                    </a>
                                </td>
                                <td class="actionMultiple">
                                    <div class="btn-action">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        actions
                                    </div>
                                    <div class="box-actions">
                                        <a href="profil-view.html" class="link">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <p class="paragraph">Voir le profil</p>
                                        </a>
                                        <a href="#" class="link">
                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                            <p class="paragraph">Suspendre</p>
                                        </a>
                                        <a href="#" class="link">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            <p class="paragraph">Supprimer</p>
                                        </a>
                                    </div>
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