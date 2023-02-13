@extends('backend/eleve/layout/default_parent', ['title' => "CEL || Compte CelPay"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-compte">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="{{route('parent-accueil')}}">Tableau de bord</a></li>
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
                        <table class="table table-striped table-gestion" id="tableRechargement">
                            <thead>
                                <tr>
                                    <th scope="col">ID Transaction</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Moyen de paiement</th>
                                    <th scope="col">Date de paiement</th>
                                    <th scope="col">ID Opérateur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->cinetpay_succes()->get() as $rechargement)
                                    <tr>
                                        <td>{{ $rechargement->id_transaction }}</td>
                                        <td>{{ money_format($rechargement->montant) }} XOF</td>
                                        <td>{{ $rechargement->moyen_paiement }}</td>
                                        <td>{{ (new DateTime($rechargement->date_paiement))->format("d/m/Y H:i:s") }}</td>
                                        <td>{{ $rechargement->id_operateur }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Liste des transferts effectués --}}
                <div class="box-compte--content mt-5">
                    <h3 class="title">Liste des transferts effectués</h3>
                    <div class="response-table mt-5">
                        <table class="table table-striped table-gestion" id="tableTransfert1">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Bénéficiaire</th>
                                    <th scope="col">Date du transfert</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->celpay_expediteur_transactions()->get() as $key => $etransfert)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ money_format($etransfert->montant) }} XOF</td>
                                    <td>{{ get_user($etransfert->beneficiaire)->nom_prenom }}</td>
                                    <td>{{ (new DateTime($etransfert->created_at))->format("d/m/Y H:i:s") }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Liste des transferts reçus --}}
                <div class="box-compte--content mt-5">
                    <h3 class="title">Liste des transferts reçus</h3>
                    <div class="response-table mt-5">
                        <table class="table table-striped table-gestion" id="tableTransfert2">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Expéditeur</th>
                                    <th scope="col">Date du transfert</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->celpay_beneficiaire_transactions()->get() as $key => $btransfert)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ money_format($btransfert->montant) }} XOF</td>
                                    <td>{{ get_user($btransfert->expediteur)->nom_prenom }}</td>
                                    <td>{{ (new DateTime($btransfert->created_at))->format("d/m/Y H:i:s") }}</td>
                                </tr>
                                @endforeach
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
                    <form action="{{ route('parent-rechargement-celpay') }}" class="form-row form-note" id="form_rechargement_celpay">
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
                    <form action="{{ route('parent-transfert-celpay') }}" class="form-row form-note" id="form_transfert_celpay">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="montant_transfert">Montant du transfert <sup>(XOF)</sup> <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="montant_transfert" required>
                                    <option value=""></option>
                                    @foreach ($montant_transferts as $mtransfert)
                                        <option value="{{$mtransfert->id_montant}}">{{ money_format($mtransfert->libelle_montant) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="statut_beneficiaire">Statut du bénéficiaire <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="statut_beneficiaire" onchange="afficherNomBeneficiaire()" required>
                                    <option value=""></option>
                                    <option value="2">Apprenant</option>
                                    <option value="3">Enseignant</option>
                                    <option value="4">Parent d'élève</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="nom_beneficiaire">Nom & Prénom(s) <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="nom_beneficiaire" onchange="afficherIdBeneficiaire()" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="intitule_diplome">Identifiant CEL <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="identifiant_beneficiaire" disabled required>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center">
                            <button type="submit" class="btn-standard-dash --blue" id="btn_transfert_celpay" onclick="validerTransfertCelPay()"><i class="fa fa-check"></i> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-personnel')
    <script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableRechargement').DataTable();
            $('#tableTransfert1').DataTable();
            $('#tableTransfert2').DataTable();
        });
    </script>
@endsection