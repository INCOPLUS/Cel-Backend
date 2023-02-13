@extends('backend/parent/layout/default', ['title' => "CEL || Compte CelPay"])

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
                        <li><span>Mon compte</span></li>
                    </ul>
                    <h3 class="title">Mon compte</h3>
                </div>
                <div class="box-btn-transfert">
                    <a href="#">
                        <button class="btn-standard-2">Transférer de l'argent</button>
                    </a>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card-compte">
                            <h3 class="title">Compte principale</h3>
                            <p class="number">15.500 fcfa</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-compte">
                            <h3 class="title">Solde CELPAY</h3>
                            <p class="number">6.000 fcfa</p>
                        </div>
                    </div>
                </div>
                <div class="box-compte--content">
                    <h3 class="title">Liste des transactions reçus</h3>
                    <div class="response-table-2 mt-5">
                        <table class="table table-striped table-gestion" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Moyen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15.000 fcfa</td>
                                    <td>02 02 02 02</td>
                                    <td>10/07/2021</td>
                                    <td>Dépot</td>
                                    <td>CELPAY</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-compte--content">
                    <h3 class="title">Liste des transfert</h3>
                    <div class="response-table-2 mt-5">
                        <table class="table table-striped table-gestion" id="table2">
                            <thead>
                                <tr>
                                    <th scope="col">Montant débité</th>
                                    <th scope="col">Numero du bénéficiaire</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Moyen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5.000 fcfa</td>
                                    <td>04 04 04 04</td>
                                    <td>10/07/2021</td>
                                    <td>Transfert</td>
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
        } );
    </script>
@endsection