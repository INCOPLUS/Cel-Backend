@extends('backend/admin/layout/default', ['title' => "CEL || Gestion du site web"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="../index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Gestion du site</span></li>
                </ul>
                <h3 class="title">Gestion du site</h3>
            </div>
            <div class="content-table">
                <div class="box-btn">
                    <a href="#">
                        <button class="btn-standard-2">Ajouter un menu</button>
                    </a>
                    <a href="#">
                        <button class="btn-standard-3">Supprimer tout</button>
                    </a>
                </div>
                <h3 class="title">&nbsp;</h3>
                <div class="response-table-2">
                    <table class="table table-striped table-gestion" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <label class="checkbox">
                                        <input type="checkbox" value="">
                                        <span></span>
                                    </label>
                                </th>
                                <th scope="col">Menus</th>
                                <th scope="col">Derniere mis à jour</th>
                                <th scope="col">Heure</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" value="">
                                        <span></span>
                                    </label>
                                </td>
                                <td>Accueil</td>
                                <td>12 Juin 2021</td>
                                <td>15h30</td>
                                <td class="statut">
                                    <div class="content-statut">
                                        <a href="#">
                                            <div class="icon --active">
                                                <i class="fa fa-check" aria-hidden="true"></i> 
                                                Activé
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon --desactive --valide">
                                                <i class="fa fa-close" aria-hidden="true"></i>
                                                Désactivé
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="icon --update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </div>
                                    <div class="icon --delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" value="">
                                        <span></span>
                                    </label>
                                </td>
                                <td>A propos</td>
                                <td>12 Juin 2021</td>
                                <td>16h45</td>
                                <td class="statut">
                                    <div class="content-statut">
                                        <a href="#">
                                            <div class="icon --active">
                                                <i class="fa fa-check" aria-hidden="true"></i> 
                                                Activé
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon --desactive --valide">
                                                <i class="fa fa-close" aria-hidden="true"></i>
                                                Désactivé
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="icon --update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </div>
                                    <div class="icon --delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" value="">
                                        <span></span>
                                    </label>
                                </td>
                                <td>Enseignements</td>
                                <td>12 Juin 2021</td>
                                <td>16h45</td>
                                <td class="statut">
                                    <div class="content-statut">
                                        <a href="#">
                                            <div class="icon --active --valide">
                                                <i class="fa fa-check" aria-hidden="true"></i> 
                                                Activé
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon --desactive">
                                                <i class="fa fa-close" aria-hidden="true"></i>
                                                Désactivé
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td class="action">
                                    <a href="list-menu-content.html">
                                        <div class="icon --update">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="icon --delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" value="">
                                        <span></span>
                                    </label>
                                </td>
                                <td>Blogs</td>
                                <td>12 Juin 2021</td>
                                <td>08h45</td>
                                <td class="statut">
                                    <div class="content-statut">
                                        <a href="#">
                                            <div class="icon --active">
                                                <i class="fa fa-check" aria-hidden="true"></i> 
                                                Activé
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon --desactive --valide">
                                                <i class="fa fa-close" aria-hidden="true"></i>
                                                Désactivé
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="icon --update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </div>
                                    <div class="icon --delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" value="">
                                        <span></span>
                                    </label>
                                </td>
                                <td>Annonces publicitaires</td>
                                <td>12 Juin 2021</td>
                                <td>08h45</td>
                                <td class="statut">
                                    <div class="content-statut">
                                        <a href="#">
                                            <div class="icon --active">
                                                <i class="fa fa-check" aria-hidden="true"></i> 
                                                Activé
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon --desactive --valide">
                                                <i class="fa fa-close" aria-hidden="true"></i>
                                                Désactivé
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="icon --update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </div>
                                    <div class="icon --delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" value="">
                                        <span></span>
                                    </label>
                                </td>
                                <td>Contacts</td>
                                <td>12 Juin 2021</td>
                                <td>08h45</td>
                                <td class="statut">
                                    <div class="content-statut">
                                        <a href="#">
                                            <div class="icon --active">
                                                <i class="fa fa-check" aria-hidden="true"></i> 
                                                Activé
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon --desactive --valide">
                                                <i class="fa fa-close" aria-hidden="true"></i>
                                                Désactivé
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td class="action">
                                    <div class="icon --update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </div>
                                    <div class="icon --delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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