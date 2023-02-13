@extends('backend/admin/layout/default', ['title' => "CEL || Parametrages"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/filepond.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="profil">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="{{ route('admin-accueil') }}">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Paramétrages</span></li>
                    </ul>
                    <h3 class="title">Paramétrages</h3>
                </div>
                <hr class="underline mb-5">
                <div class="box-update-profil">
                    <div class="row">
                        <div class="col-lg-2 col-sm-3">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="tab-enseignement" data-toggle="pill" href="#tab-enseignement-content" role="tab" aria-controls="tab-enseignement-content" aria-selected="true">&#10070; Enseignement</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-niveau" data-toggle="pill" href="#tab-niveau-content" role="tab" aria-controls="tab-niveau-content" aria-selected="false">&#10070; Niveau</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-sujet" data-toggle="pill" href="#tab-sujet-content" role="tab" aria-controls="tab-sujet-content" aria-selected="false">&#10070; Type Sujet</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-matiere" data-toggle="pill" href="#tab-matiere-content" role="tab" aria-controls="tab-matiere-content" aria-selected="false">&#10070; Matière</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-chapitre" data-toggle="pill" href="#tab-chapitre-content" role="tab" aria-controls="tab-chapitre-content" aria-selected="false">&#10070; Chapitre</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-lecon" data-toggle="pill" href="#tab-lecon-content" role="tab" aria-controls="tab-lecon-content" aria-selected="false">&#10070; Leçon</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-serie" data-toggle="pill" href="#tab-serie-content" role="tab" aria-controls="tab-serie-content" aria-selected="false">&#10070; Série</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-mention" data-toggle="pill" href="#tab-mention-content" role="tab" aria-controls="tab-mention-content" aria-selected="false">&#10070; Mention</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-montant" data-toggle="pill" href="#tab-montant-content" role="tab" aria-controls="tab-montant-content" aria-selected="false">&#10070; Montant</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-pays" data-toggle="pill" href="#tab-pays-content" role="tab" aria-controls="tab-pays-content" aria-selected="false">&#10070; Pays</a></li>
                                <li class="nav-item"><a class="nav-link" id="tab-ville" data-toggle="pill" href="#tab-ville-content" role="tab" aria-controls="tab-ville-content" aria-selected="false">&#10070; Ville</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" id="tab-matiere" data-toggle="pill" href="#tab-matiere-content" role="tab" aria-controls="tab-matiere-content" aria-selected="false">&#10070; Type Pièce</a></li> --}}
                            </ul>
                        </div>
                        <div class="col-lg-10 col-sm-9">
                            <div class="tab-content" id="pills-tabContent">
                                {{-- Liste des types d'enseignement --}}
                                <div class="tab-pane fade show active" id="tab-enseignement-content" role="tabpanel" aria-labelledby="tab-enseignement">
                                    <div class="content">
                                        <h2 class="title-content">Liste des types d'enseignement <button class="btn-add-parameter" data-toggle="modal" data-target="#modal_add_enseignement"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauEnseignement">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Enseignement</th>
                                                        <th scope="col">Apprenant</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($enseignements as $index => $enseignement)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $enseignement->libelle }}</td>
                                                            <td>{{ $enseignement->statut }}</td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($enseignement->top_actif == '0')
                                                                        <a href="#" onclick="activerEnseignement({{ $enseignement->id_enseignement }}, 1)">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#" onclick="activerEnseignement({{ $enseignement->id_enseignement }}, 0)">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="action">
                                                                <div class="icon --update" onclick='modalModifierEnseignement({{$enseignement->id_enseignement}}, "{{$enseignement->libelle}}", "{{$enseignement->statut}}")'>
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="icon --delete" onclick="supprimerEnseignement({{ $enseignement->id_enseignement }})">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des niveaux (classes) --}}
                                <div class="tab-pane fade" id="tab-niveau-content" role="tabpanel" aria-labelledby="tab-niveau">
                                    <div class="content">
                                        <h2 class="title-content">Liste des niveaux (classes) <button class="btn-add-parameter" data-toggle="modal" data-target="#modal_add_niveau"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauNiveau">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Enseignement</th>
                                                        <th scope="col">Niveau</th>
                                                        <th scope="col">Abréviation</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($niveaux as $index => $niveau)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $niveau->enseignement->libelle }}</td>
                                                            <td>{{ $niveau->libelle }}</td>
                                                            <td>{{ $niveau->abreviation }}</td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($niveau->top_actif == '0')
                                                                        <a href="#" onclick="activerNiveau({{ $niveau->id_niveau }}, 1)">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#" onclick="activerNiveau({{ $niveau->id_niveau }}, 0)">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="action">
                                                                <div class="icon --update" onclick='modalModifierNiveau({{$niveau->id_niveau}}, {{$niveau->id_enseignement}}, "{{$niveau->libelle}}", "{{$niveau->abreviation}}")'>
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="icon --delete" onclick="supprimerNiveau({{ $niveau->id_niveau }})">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des types de sujet --}}
                                <div class="tab-pane fade" id="tab-sujet-content" role="tabpanel" aria-labelledby="tab-sujet">
                                    <div class="content">
                                        <h2 class="title-content">Liste des types de sujet <button class="btn-add-parameter" data-toggle="modal" data-target="#modal_add_typesujet"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauTypeSujet">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Type sujet</th>
                                                        <th scope="col">Montant</th>
                                                        <th scope="col">Part Enseignant</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($typesujets as $index => $typesujet)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $typesujet->libelle }}</td>
                                                            <td>{{ money_format($typesujet->montant) }} XOF</td>
                                                            <td>{{ $typesujet->pourcentage }} %</td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($typesujet->top_actif == '0')
                                                                        <a href="#" onclick="activerTypeSujet({{ $typesujet->id_typesujet }}, 1)">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#" onclick="activerTypeSujet({{ $typesujet->id_typesujet }}, 0)">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="action">
                                                                <div class="icon --update" onclick='modalModifierTypeSujet({{$typesujet->id_typesujet}}, "{{$typesujet->libelle}}", "{{$typesujet->montant}}", "{{$typesujet->pourcentage}}")'>
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="icon --delete" onclick="supprimerTypeSujet({{ $typesujet->id_typesujet }})">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des matières --}}
                                <div class="tab-pane fade" id="tab-matiere-content" role="tabpanel" aria-labelledby="tab-matiere">
                                    <div class="content">
                                        <h2 class="title-content">Liste des matières <button class="btn-add-parameter" data-toggle="modal" data-target="#modal_add_matiere"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauMatiere">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Matière</th>
                                                        <th scope="col">Enseignement</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($matieres as $index => $matiere)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $matiere->libelle }}</td>
                                                            <td>
                                                                @if ($matiere->top_primaire == '1')
                                                                    &bull; Primaire
                                                                @endif
                                                                @if ($matiere->top_secondaire == '2')
                                                                    &bull; Secondaire
                                                                @endif
                                                                @if ($matiere->top_superieur == '3')
                                                                    &bull; Supérieur
                                                                @endif
                                                            </td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($matiere->top_actif == '0')
                                                                        <a href="#" onclick="activerMatiere({{ $matiere->id_matiere }}, 1)">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#" onclick="activerMatiere({{ $matiere->id_matiere }}, 0)">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="action">
                                                                <div class="icon --update" onclick='modalModifierMatiere({{$matiere->id_matiere}}, "{{$matiere->libelle}}", "{{$matiere->top_primaire}}", "{{$matiere->top_secondaire}}", "{{$matiere->top_superieur}}")'>
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="icon --delete" onclick="supprimerMatiere({{ $matiere->id_matiere }})">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des chapitres --}}
                                <div class="tab-pane fade" id="tab-chapitre-content" role="tabpanel" aria-labelledby="tab-chapitre">
                                    <div class="content">
                                        <h2 class="title-content">Liste des chapitres <button class="btn-add-parameter" data-toggle="modal" data-target="#modal_add_chapitre"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauChapitre">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Chapitre</th>
                                                        <th scope="col">Matière</th>
                                                        <th scope="col">Niveau</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($chapitres as $index => $chapitre)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $chapitre->libelle }}</td>
                                                            <td>{{ $chapitre->matiere->libelle }}</td>
                                                            <td>{{ $chapitre->niveau->abreviation }}</td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($chapitre->top_actif == '0')
                                                                        <a href="#" onclick="activerChapitre({{ $chapitre->id_chapitre }}, 1)">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#" onclick="activerChapitre({{ $chapitre->id_chapitre }}, 0)">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="action">
                                                                <div class="icon --update" onclick='modalModifierChapitre({{$chapitre->id_chapitre}}, "{{$chapitre->libelle}}", "{{$chapitre->id_niveau}}", "{{$chapitre->id_matiere}}")'>
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="icon --delete" onclick="supprimerChapitre({{ $chapitre->id_chapitre }})">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des leçons --}}
                                <div class="tab-pane fade" id="tab-lecon-content" role="tabpanel" aria-labelledby="tab-lecon">
                                    <div class="content">
                                        <h2 class="title-content">Liste des leçons <button class="btn-add-parameter" data-toggle="modal" data-target="#modal_add_lecon"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauLecon">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Leçon</th>
                                                        <th scope="col">Chapitre</th>
                                                        <th scope="col">Matière</th>
                                                        <th scope="col">Niveau</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($lecons as $index => $lecon)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $lecon->libelle }}</td>
                                                            <td>{{ $lecon->chapitre->libelle }}</td>
                                                            <td>{{ $lecon->chapitre->matiere->libelle }}</td>
                                                            <td>{{ $lecon->chapitre->niveau->abreviation }}</td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($lecon->top_actif == '0')
                                                                        <a href="#" onclick="activerLecon({{ $lecon->id_lecon }}, 1)">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#" onclick="activerLecon({{ $lecon->id_lecon }}, 0)">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="action">
                                                                <div class="icon --update" onclick='modalModifierLecon({{$lecon->id_lecon}}, "{{$lecon->libelle}}", "{{$lecon->id_chapitre}}")'>
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="icon --delete" onclick="supprimerLecon({{ $lecon->id_lecon }})">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des séries --}}
                                <div class="tab-pane fade" id="tab-serie-content" role="tabpanel" aria-labelledby="tab-serie">
                                    <div class="content">
                                        <h2 class="title-content">Liste des séries <button class="btn-add-parameter" data-toggle="modal" data-target="#add_diplome"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauSerie">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Série</th>
                                                        <th scope="col">Seconde</th>
                                                        <th scope="col">Première</th>
                                                        <th scope="col">Terminale</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($series as $index => $serie)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $serie->libelle }}</td>
                                                            <td class="text-center">
                                                                @if ($serie->top_seconde == '11')
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="fa fa-close" aria-hidden="true"></i>  
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($serie->top_premiere == '12')
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="fa fa-close" aria-hidden="true"></i>  
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($serie->top_terminale == '13')
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="fa fa-close" aria-hidden="true"></i>  
                                                                @endif
                                                            </td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($serie->top_actif == '0')
                                                                        <a href="#">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
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
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des mentions --}}
                                <div class="tab-pane fade" id="tab-mention-content" role="tabpanel" aria-labelledby="tab-mention">
                                    <div class="content">
                                        <h2 class="title-content">Liste des mentions <button class="btn-add-parameter" data-toggle="modal" data-target="#add_diplome"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauMention">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Note</th>
                                                        <th scope="col">Mention</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($mentions as $index => $mention)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $mention->note < 10 ? '0'.$mention->note : $mention->note }} / 20</td>
                                                            <td>{{ $mention->libelle }}</td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($mention->top_actif == '0')
                                                                        <a href="#">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
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
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des montants --}}
                                <div class="tab-pane fade" id="tab-montant-content" role="tabpanel" aria-labelledby="tab-montant">
                                    <div class="content">
                                        <h2 class="title-content">Liste des montants <button class="btn-add-parameter" data-toggle="modal" data-target="#add_diplome"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauMontant">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Montant (XOF)</th>
                                                        <th scope="col">Transfert CelPay</th>
                                                        <th scope="col">Rechargement CinetPay</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($montants as $index => $montant)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ money_format($montant->libelle_montant) }}</td>
                                                            <td class="text-center">
                                                                @if ($montant->top_transfert == '1')
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="fa fa-close" aria-hidden="true"></i>  
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($montant->top_recharge == '1')
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="fa fa-close" aria-hidden="true"></i>  
                                                                @endif
                                                            </td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($montant->top_actif == '0')
                                                                        <a href="#">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
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
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des pays --}}
                                <div class="tab-pane fade" id="tab-pays-content" role="tabpanel" aria-labelledby="tab-pays">
                                    <div class="content">
                                        <h2 class="title-content">Liste des pays <button class="btn-add-parameter" data-toggle="modal" data-target="#add_diplome"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauPays">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Nom du pays</th>
                                                        <th scope="col">Code Pays</th>
                                                        <th scope="col">Code ISO</th>
                                                        <th scope="col">Dévise monétaire</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pays as $index => $pay)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $pay->nom_pays }}</td>
                                                            <td>{{ $pay->code_pays }}</td>
                                                            <td>{{ $pay->code_iso }}</td>
                                                            <td>{{ $pay->devise_monetaire }}</td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($pay->top_actif == '0')
                                                                        <a href="#">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
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
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {{-- Liste des villes --}}
                                <div class="tab-pane fade" id="tab-ville-content" role="tabpanel" aria-labelledby="tab-ville">
                                    <div class="content">
                                        <h2 class="title-content">Liste des villes <button class="btn-add-parameter" data-toggle="modal" data-target="#add_diplome"><i class="fa fa-plus"></i> Ajouter</button></h2>
                                        <div class="response-table-2 mt-5">
                                            <table class="table table-striped table-gestion" id="tableauVille">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Ville</th>
                                                        <th scope="col">Pays</th>
                                                        <th scope="col">Statut</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($villes as $index => $ville)
                                                        <tr>
                                                            <td>{{ $index+1 }}</td>
                                                            <td>{{ $ville->nom_ville }}</td>
                                                            <td>{{ $ville->pays->nom_pays }}</td>
                                                            <td class="statut">
                                                                <div class="content-statut">
                                                                    @if ($ville->top_actif == '0')
                                                                        <a href="#">
                                                                            <div class="icon --active">
                                                                                <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a href="#">
                                                                            <div class="icon --desactive --valide">
                                                                                <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                                            </div>
                                                                        </a>
                                                                    @endif
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
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('other-content')
    {{-- Modal Add Enseignement --}}
    <div class="modal fade modalCreateAdmin" id="modal_add_enseignement" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Ajout d'un type d'enseignement</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-add-enseignement') }}" class="form-row form-note" id="form_add_enseignement">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="libelle_add_enseignement">Type d'enseignement <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_add_enseignement" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="statut_add_enseignement">Statut de l'apprenant <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="statut_add_enseignement" required>
                                    <option value=""></option>
                                    <option value="Elève">Elève</option>
                                    <option value="Etudiant">Etudiant</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_add_enseignement"><i class="fa fa-check"></i> Valider</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Enseignement --}}
    <div class="modal fade modalCreateAdmin" id="modal_update_enseignement" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Modification d'un type d'enseignement</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-update-enseignement') }}" class="form-row form-note" id="form_update_enseignement">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="libelle_update_enseignement">Type d'enseignement <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_update_enseignement" required>
                                <input type="text" id="id_update_enseignement" disabled style="display: none">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="statut_update_enseignement">Statut de l'apprenant <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="statut_update_enseignement" required>
                                    <option value=""></option>
                                    <option value="Elève">Elève</option>
                                    <option value="Etudiant">Etudiant</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_update_enseignement"><i class="fa fa-pencil"></i> Modifier</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add Niveau --}}
    <div class="modal fade modalCreateAdmin" id="modal_add_niveau" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Ajout d'un niveau (Classe)</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-add-niveau') }}" class="form-row form-note" id="form_add_niveau">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="enseignement_add_niveau">Type d'enseignement <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="enseignement_add_niveau" required>
                                    <option value=""></option>
                                    @foreach ($enseignements as $enseign)
                                        <option value="{{$enseign->id_enseignement}}">{{$enseign->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="libelle_add_niveau">Niveau (Classe) <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_add_niveau" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="abreviation_add_niveau">Abréviation <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="abreviation_add_niveau" required>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_add_niveau"><i class="fa fa-check"></i> Valider</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Niveau --}}
    <div class="modal fade modalCreateAdmin" id="modal_update_niveau" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Modification d'un niveau (Classe)</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-update-niveau') }}" class="form-row form-note" id="form_update_niveau">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="enseignement_update_niveau">Type d'enseignement <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="enseignement_update_niveau" required>
                                    <option value=""></option>
                                    @foreach ($enseignements as $enseign)
                                        <option value="{{$enseign->id_enseignement}}">{{$enseign->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="libelle_update_niveau">Niveau (Classe) <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_update_niveau" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="abreviation_update_niveau">Abréviation <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="abreviation_update_niveau" required>
                                <input type="text" id="id_update_niveau" disabled style="display: none">
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_update_niveau"><i class="fa fa-pencil"></i> Modifier</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add Type Sujet --}}
    <div class="modal fade modalCreateAdmin" id="modal_add_typesujet" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Ajout d'un type de sujet</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-add-typesujet') }}" class="form-row form-note" id="form_add_typesujet">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="libelle_add_typesujet">Type de sujet <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_add_typesujet" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="montant_add_typesujet">Prix (XOF) <span class="text-danger">*</span></label>
                                <input type="number" class="form--group__input" id="montant_add_typesujet" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="pourcentage_add_typesujet">Pourcentage de l'enseignant <span class="text-danger">*</span></label>
                                <input type="number" min="0" max="100" class="form--group__input" id="pourcentage_add_typesujet" required>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_add_typesujet"><i class="fa fa-check"></i> Valider</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Type Sujet --}}
    <div class="modal fade modalCreateAdmin" id="modal_update_typesujet" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Modification d'un typesujet (Classe)</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-update-typesujet') }}" class="form-row form-note" id="form_update_typesujet">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="libelle_update_typesujet">Type de sujet <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_update_typesujet" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="montant_update_typesujet">Prix (XOF) <span class="text-danger">*</span></label>
                                <input type="number" class="form--group__input" id="montant_update_typesujet" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="pourcentage_update_typesujet">Pourcentage de l'enseignant <span class="text-danger">*</span></label>
                                <input type="number" min="0" max="100" class="form--group__input" id="pourcentage_update_typesujet" required>
                                <input type="text" id="id_update_typesujet" disabled style="display: none">
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_update_typesujet"><i class="fa fa-pencil"></i> Modifier</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add Matiere --}}
    <div class="modal fade modalCreateAdmin" id="modal_add_matiere" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Ajout d'une matière</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-add-matiere') }}" class="form-row form-note" id="form_add_matiere">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-12">
                            <div class="form--group">
                                <label for="libelle_add_matiere">Libéllé de la matière <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_add_matiere" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mt-3">
                            <div class="form--group">
                                <label class="checkbox">
                                    <input type="checkbox" id="primaire_add_matiere">
                                    <span></span>
                                </label>    
                                <label for="primaire_add_matiere">Primaire</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mt-3">
                            <div class="form--group">
                                <label class="checkbox">
                                    <input type="checkbox" id="secondaire_add_matiere">
                                    <span></span>
                                </label>
                                <label for="secondaire_add_matiere">Secondaire</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mt-3">
                            <div class="form--group">
                                <label class="checkbox">
                                    <input type="checkbox" id="superieur_add_matiere">
                                    <span></span>
                                </label>    
                                <label for="superieur_add_matiere">Supérieur</label>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_add_matiere"><i class="fa fa-check"></i> Valider</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Matiere --}}
    <div class="modal fade modalCreateAdmin" id="modal_update_matiere" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Modification d'une matière</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-update-matiere') }}" class="form-row form-note" id="form_update_matiere">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-12">
                            <div class="form--group">
                                <label for="libelle_update_matiere">Libéllé de la matière <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_update_matiere" required>
                                <input type="text" id="id_update_matiere" disabled style="display: none">
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mt-3">
                            <div class="form--group">
                                <label class="checkbox">
                                    <input type="checkbox" id="primaire_update_matiere">
                                    <span></span>
                                </label>    
                                <label for="primaire_update_matiere">Primaire</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mt-3">
                            <div class="form--group">
                                <label class="checkbox">
                                    <input type="checkbox" id="secondaire_update_matiere">
                                    <span></span>
                                </label>
                                <label for="secondaire_update_matiere">Secondaire</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mt-3">
                            <div class="form--group">
                                <label class="checkbox">
                                    <input type="checkbox" id="superieur_update_matiere">
                                    <span></span>
                                </label>    
                                <label for="superieur_update_matiere">Supérieur</label>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_update_matiere"><i class="fa fa-pencil"></i> Modifier</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add Chapitre --}}
    <div class="modal fade modalCreateAdmin" id="modal_add_chapitre" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Ajout d'un chapitre</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-add-chapitre') }}" class="form-row form-note" id="form_add_chapitre">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="niveau_add_chapitre">Niveau <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="niveau_add_chapitre" required>
                                    <option value=""></option>
                                    @foreach ($niveaux as $niveau)
                                    @if ($niveau->top_actif == '0')
                                        <option value="{{$niveau->id_niveau}}">{{$niveau->abreviation}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="matiere_add_chapitre">Matière <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="matiere_add_chapitre" required>
                                    <option value=""></option>
                                    @foreach ($matieres as $matiere)
                                    @if ($matiere->top_actif == '0')
                                        <option value="{{$matiere->id_matiere}}">{{$matiere->libelle}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form--group">
                                <label for="libelle_add_chapitre">Libéllé du chapitre <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_add_chapitre" required>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_add_chapitre"><i class="fa fa-check"></i> Valider</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Chapitre --}}
    <div class="modal fade modalCreateAdmin" id="modal_update_chapitre" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Modification d'un chapitre</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-update-chapitre') }}" class="form-row form-note" id="form_update_chapitre">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="niveau_update_chapitre">Niveau <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="niveau_update_chapitre" required>
                                    <option value=""></option>
                                    @foreach ($niveaux as $niveau)
                                    @if ($niveau->top_actif == '0')
                                        <option value="{{$niveau->id_niveau}}">{{$niveau->abreviation}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="matiere_update_chapitre">Matière <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="matiere_update_chapitre" required>
                                    <option value=""></option>
                                    @foreach ($matieres as $matiere)
                                    @if ($matiere->top_actif == '0')
                                        <option value="{{$matiere->id_matiere}}">{{$matiere->libelle}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form--group">
                                <label for="libelle_update_chapitre">Libéllé du chapitre <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_update_chapitre" required>
                                <input type="text" id="id_update_chapitre" disabled style="display: none">
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_update_chapitre"><i class="fa fa-pencil"></i> Modifier</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add Leçon --}}
    <div class="modal fade modalCreateAdmin" id="modal_add_lecon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Ajout d'une leçon</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-add-lecon') }}" class="form-row form-note" id="form_add_lecon">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="chapitre_add_lecon">Chapitre <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="chapitre_add_lecon" required>
                                    <option value=""></option>
                                    @foreach ($chapitres as $chapitre)
                                        <option value="{{$chapitre->id_chapitre}}">{{$chapitre->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="libelle_add_lecon">Leçon <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_add_lecon" required>
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_add_lecon"><i class="fa fa-check"></i> Valider</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Leçon --}}
    <div class="modal fade modalCreateAdmin" id="modal_update_lecon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Modification d'une leçon</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin-update-lecon') }}" class="form-row form-note" id="form_update_lecon">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="chapitre_update_lecon">Chapitre <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="chapitre_update_lecon" required>
                                    <option value=""></option>
                                    @foreach ($chapitres as $chapitre)
                                        <option value="{{$chapitre->id_chapitre}}">{{$chapitre->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="libelle_update_lecon">Leçon <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="libelle_update_lecon" required>
                                <input type="text" id="id_update_lecon" disabled style="display: none">
                            </div>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button type="submit" class="btn-standard-dash --blue mr-3" id="btn_update_lecon"><i class="fa fa-pencil"></i> Modifier</button>
                            <button class="btn-standard-dash --red" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-personnel')
<script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
<script src="{{asset('assets/js/admin-parametrage.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#tableauEnseignement').DataTable();
            $('#tableauNiveau').DataTable();
            $('#tableauTypeSujet').DataTable();
            $('#tableauMatiere').DataTable();
            $('#tableauChapitre').DataTable();
            $('#tableauLecon').DataTable();
            $('#tableauSerie').DataTable();
            $('#tableauMention').DataTable();
            $('#tableauMontant').DataTable();
            $('#tableauPays').DataTable();
            $('#tableauVille').DataTable();
        });
    </script>
@endsection