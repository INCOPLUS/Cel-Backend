@extends('backend/eleve/layout/default', ['title' => "CEL || Compte CelPay"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-compte">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="{{route('eleve-accueil')}}">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Compte CELPAY</span></li>
                    </ul>
                    <h3 class="title">Mon compte CELPAY</h3>
                </div>
                {{-- Infos Compte CELPAY --}}
                <div class="box-examen mb-5">
                    <div class="card-infor-exam">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <div class="box-type-exam">
                                    <h3 class="title">Solde CELPAY</h3>
                                    <p class="text-center mt-5"><span class="solde-celpay">{{ money_format($user->celpay->solde) }} FCFA</span></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="box-infor-inscription">
                                    <p class="paragraph">Cliquez sur l'un des boutons ci-dessous pour effectuer une opération.</p>
                                    <div class="box-btn">
                                        <button class="btn-standard-dash --blue" data-toggle="modal" data-target="#modalRecharge"><i class="fa fa-credit-card"></i>&nbsp; Recharger</button>
                                        <button class="btn-standard-dash --red" data-toggle="modal" data-target="#modalTransfert"><i class="fa fa-share"></i>&nbsp; Transférer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Liste des rechargements effectués --}}
                <div class="box-compte--content">
                    <h3 class="title">Liste des rechargements effectués</h3>
                    <div class="response-table mt-5">
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
                {{-- Liste des transferts effectués --}}
                <div class="box-compte--content">
                    <h3 class="title">Liste des transferts effectués</h3>
                    <div class="response-table mt-5">
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
                {{-- Liste des transferts reçus --}}
                <div class="box-compte--content">
                    <h3 class="title">Liste des transferts reçus</h3>
                    <div class="response-table mt-5">
                        <table class="table table-striped table-gestion" id="table3">
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

@section('other-content')
    {{-- Modal Rechargement --}}
    <div class="modal fade modalBlack" id="modalRecharge" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Recharger mon compte CELPAY</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('eleve-rechargement-celpay') }}" class="form-row form-note" id="form_rechargement_celpay">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="montant_rechargement">Montant <sup>(XOF)</sup> <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="montant_rechargement" required>
                                    <option value=""></option>
                                    @foreach ($montant_recharges as $mrecharge)
                                        <option value="{{$mrecharge->id_montant}}">{{ money_format($mrecharge->libelle_montant) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label>Identifiant CEL <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" value="{{ $user->identifiant }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center">
                            <button class="btn-standard-dash --blue" id="btn_rechargement_celpay" onclick="validerRechargementCelPay()"><i class="fa fa-check"></i> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Transfert --}}
    <div class="modal fade modalBlack" id="modalTransfert" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Transférer vers un autre compte</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="#" class="form-row form-note" id="form_recharge_compte">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="type_devoir">Montant du transfert <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="type_devoir" required>
                                    <option value=""></option>
                                    <option value="">500</option>
                                    <option value="">1.000</option>
                                    <option value="">2.000</option>
                                    <option value="">3.000</option>
                                    <option value="">5.000</option>
                                    <option value="">10.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="intitule_diplome">Numéro téléphone</label>
                                <input type="text" class="form--group__input" id="intitule_diplome">
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center">
                            {{-- <button class="btn-standard-dash --red mr-3" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button> --}}
                            <button type="submit" class="btn-standard-dash --blue" id="btn_search_sujet"><i class="fa fa-check"></i> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-personnel')
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
    <script src="{{asset('assets/js/eleve.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
            $('#table2').DataTable();
            $('#table3').DataTable();
        } );
    </script>
@endsection