@extends('backend/admin/layout/default', ['title' => "CEL || Liste des enseignants"])

@section('css-personnel')
    <link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Liste des enseignants</span></li>
                </ul>
                <h3 class="title">Liste des enseignants</h3>
            </div>
            <div class="content-table">
                <hr class="underline">
                <div class="response-table-2">
                    <table class="table table-striped table-gestion" id="tableEnseignant">
                        <thead>
                            <tr>
                                <th scope="col">ID CEL</th>
                                <th scope="col">Nom &amp; Prénom(s)</th>
                                <th scope="col">Date de naissance</th>
                                <th scope="col">Genre</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Publication</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enseignants as $enseignant)
                                <tr>
                                    <td>{{ $enseignant->identifiant }}</td>
                                    <td>{{ $enseignant->utilisateur->nom_prenom }}</td>
                                    <td>{{ format_date_french($enseignant->utilisateur->date_naissance) }}</td>
                                    <td>
                                        @if ($enseignant->utilisateur->genre == '1')
                                            Masculin
                                        @elseif ($enseignant->utilisateur->genre == '2')
                                            Feminin
                                        @endif
                                    </td>
                                    <td class="--email">{{ $enseignant->utilisateur->email }}</td>
                                    <td>{{ $enseignant->utilisateur->telephone }}</td>
                                    <td class="statut">
                                        <div class="content-statut">
                                            @if ($enseignant->top_publication == '1')
                                                <a href="#" onclick='activerPublication("{{ $enseignant->identifiant }}", 0)'>
                                                    <div class="icon --active">
                                                        <i class="fa fa-check" aria-hidden="true"></i> Activé
                                                    </div>
                                                </a>
                                            @else
                                                <a href="#" onclick='activerPublication("{{ $enseignant->identifiant }}", 1)'>
                                                    <div class="icon --desactive --valide">
                                                        <i class="fa fa-close" aria-hidden="true"></i> Désactivé
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="actionMultiple">
                                        <div class="btn-action">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            actions
                                        </div>
                                        <div class="box-actions">
                                            <a href="#"  class="link">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <p class="paragraph">Voir le profil</p>
                                            </a>
                                            <a href="#"  class="link">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                <p class="paragraph">Suspendre</p>
                                            </a>
                                            <a href="#"  class="link">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                <p class="paragraph">Supprimer</p>
                                            </a>
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
@endsection

@section('other-content')
    
@endsection

@section('script-personnel')
    <script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
    <script src="{{asset('assets/js/admin-enseignant.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#tableEnseignant').DataTable();
        } );
    </script>
@endsection