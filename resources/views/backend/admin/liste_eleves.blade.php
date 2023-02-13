@extends('backend/admin/layout/default', ['title' => "CEL || Liste des élèves"])

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
                    <li><span>Liste des apprenants</span></li>
                </ul>
                <h3 class="title">Liste des apprenants</h3>
            </div>
            <div class="content-table">
                <div class="response-table-2">
                    <table class="table table-striped table-gestion" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">ID CEL</th>
                                <th scope="col">Nom &amp; Prénom(s)</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eleves as $eleve)
                                <tr>
                                    <td>{{ $eleve->identifiant }}</td>
                                    <td>{{ $eleve->utilisateur->nom_prenom }}</td>
                                    {{-- <td>{{ format_date_french($eleve->utilisateur->date_naissance) }}</td> --}}
                                    <td>
                                        @if ($eleve->utilisateur->genre == '1')
                                        Masculin
                                        @elseif ($eleve->utilisateur->genre == '2')
                                        Feminin
                                        @endif
                                    </td>
                                    <td>{{ $eleve->niveau->abreviation }}</td>
                                    <td class="--email">{{ $eleve->utilisateur->email }}</td>
                                    <td>{{ $eleve->utilisateur->telephone }}</td>
                                    <td>
                                        <a href="#">
                                            <button class="btn-view">Voir</button>
                                        </a>
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