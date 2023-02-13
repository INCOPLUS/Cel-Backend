@extends('backend/admin/layout/default', ['title' => "CEL || Emploi du temps"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-emploisDuTemps">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Emploi du temps</span></li>
                    </ul>
                    <h3 class="title">Emploi du temps</h3>
                </div>
                
                <!-- liste oral -->
                <hr class="underline">
                <div class="box-list-dispo">
                    <h3 class="title">Liste des profs/ enseignants disponible pour l'oral</h3>
                    <div class="response-table">
                        <table class="table table-striped table-gestion" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom &amp; prénom(s)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Matière</th>
                                    <th scope="col">Enseignement</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Heure de disponibilité</th>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>cel201</td>
                                    <td>Elidje Hoba Nick Jefferson</td>
                                    <td>Professeur</td>
                                    <td>Mathematique</td>
                                    <td>Enseignement secondaire</td>
                                    <td class="--email">jeffersonelidje@gmail.com</td>
                                    <td>10h - 16h</td>
                                    <td>00 00 00 00 00</td>
                                    <td>
                                        <button type="button" class="btn-standard-2" data-toggle="modal" data-target="#attribution">Attribuer un élève / étudiant</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- liste explication de cours -->
                <hr class="underline">
                <div class="box-list-dispo">
                    <h3 class="title">Liste des profs / enseignants disponible pour l'explication de cours</h3>
                    <div class="response-table">
                        <table class="table table-striped table-gestion" id="table2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom &amp; prénom(s)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Matière</th>
                                    <th scope="col">Enseignement</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Heure de disponibilité</th>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>cel201</td>
                                    <td>Elidje Hoba Nick Jefferson</td>
                                    <td>Professeur</td>
                                    <td>Mathematique</td>
                                    <td>Enseignement secondaire</td>
                                    <td class="--email">jeffersonelidje@gmail.com</td>
                                    <td>10h - 16h</td>
                                    <td>00 00 00 00 00</td>
                                    <td>
                                        <button type="button" class="btn-standard-2" data-toggle="modal" data-target="#attribution">Attribuer un élève / étudiant</button>
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
    <div class="modal fade modalAttribution" id="attribution" tabindex="-1" role="dialog" aria-labelledby="attribution" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Attribution d'un Elève / Etudiant pour l'oral</h4>
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
                                <label for="#">Numero</label>
                                <input type="text" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="#">E-mail</label>
                                <input type="email" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form--group">
                                <label for="#">Classe</label>
                                <input type="text" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form--group">
                                <label for="#">Heure de début</label>
                                <input type="time" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form--group">
                                <label for="#">Heure de fin</label>
                                <input type="time" class="form--group__input">
                            </div>
                        </div>
                    </form>
                    <div class="box-btn">
                        <button class="btn-standard-dash --blue mr-3" data-dismiss="modal">Retour</button>
                        <button class="btn-standard-dash --green">Attribuer</button>
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
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
        $('#table2').DataTable();
    });
</script>
@endsection