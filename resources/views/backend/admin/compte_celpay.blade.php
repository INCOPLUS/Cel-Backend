@extends('backend/admin/layout/default', ['title' => "CEL || Compte CELPAY"])

@section('css-personnel')
<link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="box-compte">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Compte général</span></li>
                </ul>
                <h3 class="title">Liste des opérations compte CELPAY</h3>
            </div>
            <button class="btn-standard-2" data-toggle="modal" data-target="#modalRechargeCompte">Recharger un compte</button>
            <div class="box-compte--content">
                <h3 class="title">Liste des transactions efféctuées</h3>
                <div class="response-table-2 mt-5">
                    <table class="table table-striped table-gestion" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">Nom & prénom(s)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Bénéficiaire</th>
                                <th scope="col">Numero du bénéficiaire</th>
                                <th scope="col">Date</th>
                                <th scope="col">Moyen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Koffi Fabrice Benoit</td>
                                <td>Etudiant</td>
                                <td>15.000 fcfa</td>
                                <td>nom du Bénéficiaire</td>
                                <td>02 02 02 02</td>
                                <td>10/07/2021</td>
                                <td>CELPAY</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-compte--content">
                <h3 class="title">Liste des retraits</h3>
                <div class="response-table-2 mt-5">
                    <table class="table table-striped table-gestion" id="table2">
                        <thead>
                            <tr>
                                <th scope="col">Nom & prénom(s)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Bénéficiaire</th>
                                <th scope="col">Numero du bénéficiaire</th>
                                <th scope="col">Date</th>
                                <th scope="col">Moyen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Koffi Fabrice Benoit</td>
                                <td>Etudiant</td>
                                <td>15.000 fcfa</td>
                                <td>nom du Bénéficiaire</td>
                                <td>02 02 02 02</td>
                                <td>10/07/2021</td>
                                <td>CELPAY</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-compte--content">
                <h3 class="title">Liste des transferts</h3>
                <div class="response-table-2 mt-5">
                    <table class="table table-striped table-gestion" id="table3">
                        <thead>
                            <tr>
                                <th scope="col">Nom & prénom(s)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Bénéficiaire</th>
                                <th scope="col">Numero du bénéficiaire</th>
                                <th scope="col">Date</th>
                                <th scope="col">Moyen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Koffi Fabrice Benoit</td>
                                <td>Etudiant</td>
                                <td>15.000 fcfa</td>
                                <td>nom du Bénéficiaire</td>
                                <td>02 02 02 02</td>
                                <td>10/07/2021</td>
                                <td>CELPAY</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-compte--content">
                <h3 class="title">Liste des dépenses</h3>
                <div class="response-table-2 mt-5">
                    <table class="table table-striped table-gestion" id="table4">
                        <thead>
                            <tr>
                                <th scope="col">Nom & prénom(s)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Bénéficiaire</th>
                                <th scope="col">Numero du bénéficiaire</th>
                                <th scope="col">Date</th>
                                <th scope="col">Moyen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Koffi Fabrice Benoit</td>
                                <td>Etudiant</td>
                                <td>15.000 fcfa</td>
                                <td>nom du Bénéficiaire</td>
                                <td>02 02 02 02</td>
                                <td>10/07/2021</td>
                                <td>CELPAY</td>
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
<!-- Modal change rôle -->
<div class="modal fade modalRechargeCompte" id="modalRechargeCompte" tabindex="-1" aria-labelledby="modalRechargeCompteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content content">
            <p class="paragraph">Recharger un compte</p>
            <form action="" class="form-row form-note">
                <div class="col-12">
                    <div class="form--group">
                        <label for="identifiant">Identifiant</label>
                        <input type="text" name="identifiant" id="identifiant" class="form--group__input">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form--group">
                        <label for="name">Nom & prénom(s)</label>
                        <input type="text" name="name" id="name" class="form--group__input">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form--group">
                        <label for="montant">Montant</label>
                        <input type="text" name="montant" id="montant" class="form--group__input">
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
<!-- datatable -->
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
    } );
</script>
@endsection