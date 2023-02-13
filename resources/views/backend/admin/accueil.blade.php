@extends('backend/admin/layout/default')

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="welcome">
                <h2 class="title">Bienvenue sur votre Espace <span>cel</span></h2>
                <div class="box-infor">
                    {{-- <div class="status">Administrateur</div> --}}
                    <div class="academic-year">Administrateur</div>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card-stat-compo">
                            <h3 class="title">Enseignants inscrits</h3>
                            <p class="number">{{ $enseignants }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card-stat-compo">
                            <h3 class="title">Apprenants inscrits</h3>
                            <p class="number">{{ $eleves }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card-stat-compo">
                            <h3 class="title">Parents d'élèves</h3>
                            <p class="number">{{ $parents }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card-stat-compo">
                            <h3 class="title">Sujets mis en ligne</h3>
                            <p class="number">{{ $sujets }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card-stat-compo">
                            <h3 class="title">Examens mis en ligne</h3>
                            <p class="number">0</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card-stat-compo">
                            <h3 class="title">Apprenants interrogés</h3>
                            <p class="number">0</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="content-table">
                <div class="box-heading-table">
                    <h3 class="title">Liste des Administrateurs</h3>
                    <button class="btn-standard-2" data-toggle="modal" data-target="#createAdmin">Créer un nouveau administrateur</button>
                </div>
                <div class="response-table-2">
                    <table class="table table-striped table-gestion" id="table2">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom &amp; prénom(s)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Dernière connexion</th>
                                <th scope="col">Heure</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>cel0026</td>
                                <td>Elidje Hoba Nick Jefferson</td>
                                <td>Administrateur</td>
                                <td>Modifier</td>
                                <td>18 juin 2021</td>
                                <td>09:20</td>
                                <td class="action">
                                    <div class="icon --update" data-toggle="modal" data-target="#modalChangeRole">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </div>
                                    <a href="profil-view.html">
                                        <div class="icon --view">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('other-content')
    {{-- Modal create new admin --}}
    <div class="modal fade modalCreateAdmin" id="createAdmin" tabindex="-1" role="dialog" aria-labelledby="addSujetTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Créer un nouveau administrateur</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" class="form-row form-note">
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="#">Nom & prénom(s)</label>
                                <input type="text" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="#">Statut</label>
                                <input type="text" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="#">Rôle</label>
                                <select class="custom-select form--group__select" id="enseignement">
                                    <option selected>Choisir ...</option>
                                    <option value="m1">Validateur de sujet</option>
                                    <option value="m2">Visiteur</option>
                                    <option value="m3">Modifier</option>
                                    <option value="m4">Comptable</option>
                                    <option value="m5">Ajouter - Modifier - Supprimer</option>
                                    <option value="m6">Administrateur principal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="#">Mot de passe</label>
                                <input type="password" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="#">Confirmer le mot de passe</label>
                                <input type="password" class="form--group__input">
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

    {{-- Modal change rôle --}}
    <div class="modal fade modalChangeRole" id="modalChangeRole" tabindex="-1" aria-labelledby="modalChangeRoleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content content">
                <p class="paragraph">Modifier le rôle</p>
                <form action="" class="form-row form-note">
                    <div class="col-12">
                        <div class="form--group">
                            <label for="#">Rôle</label>
                            <select class="custom-select form--group__select" id="enseignement">
                                <option selected>Choisir ...</option>
                                <option value="m1">Visiteur</option>
                                <option value="m2">Validateur de sujet </option>
                                <option value="m3">Comptable</option>
                                <option value="m4">Modifier</option>
                                <option value="m5">Ajouter - Modifier - Supprimer</option>
                                <option value="m6">Administrateur principal</option>
                            </select>
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
        } );
    </script>
@endsection