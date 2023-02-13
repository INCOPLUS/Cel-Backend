@extends('backend/enseignant/layout/default', ['title' => "CEL || Mis à jour du profil"])

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
                        <li><a href="{{ route('enseignant-accueil') }}">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><a href="{{ route('enseignant-profil') }}">Profil</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Mis à jour du profil</span></li>
                    </ul>
                    <h3 class="title">Mis à jour du profil</h3>
                </div>
                <div class="box-update-profil">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                <a class="nav-link active" id="tabs1-tab" data-toggle="pill" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">&#10070; Informations personnelles</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" id="tabs2-tab" data-toggle="pill" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">&#10070; Pièce d'identité</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" id="tabs3-tab" data-toggle="pill" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">&#10070; Curriculum Vitae</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" id="tabs4-tab" data-toggle="pill" href="#tabs4" role="tab" aria-controls="tabs4" aria-selected="false">&#10070; Diplômes / Certifications</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
                                    <div class="content">
                                        <h2 class="title-content">Informations personnelles</h2>
                                        <form action="{{route('enseignant-maj-infos-perso')}}" class="form-row form-update-profil" id="form_infos_perso">
                                            {{ csrf_field() }}
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="nom">Nom & Prénom(s) <span class="text-danger">*</span></label>
                                                    <input type="text" id="nom" class="form--group__input" value="{{$user->nom_prenom}}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="date_naissance">Date de naissance <span class="text-danger">*</span></label>
                                                    <input type="date" id="date_naissance" class="form--group__input" value="{{$user->date_naissance}}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="genre">Genre <span class="text-danger">*</span></label>
                                                    <select class="custom-select form--group__select" id="genre" required>
                                                        <option value="0"></option>
                                                        <option value="1" {{$user->genre=='1' ? 'selected' : ''}}>Masculin</option>
                                                        <option value="2" {{$user->genre=='2' ? 'selected' : ''}}>Féminin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="email">Adresse E-mail <span class="text-danger">*</span></label>
                                                    <input type="email" id="email" class="form--group__input" value="{{$user->email}}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="contact1">Contact 1 <sup>(Whatsapp)</sup> <span class="text-danger">*</span></label>
                                                    <input type="text" id="contact1" class="form--group__input" value="{{$user->telephone}}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="contact2">Contact 2</label>
                                                    <input type="text" id="contact2" class="form--group__input" value="{{$user->telephone2}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="pays">Pays de résidence <span class="text-danger">*</span></label>
                                                    <select class="custom-select form--group__select" id="pays" onchange="afficherVille()" required>
                                                        <option value=""></option>
                                                        @foreach ($pays as $pay)
                                                        <option value="{{ $pay->id_pays }}" {{$user->id_pays == $pay->id_pays ? 'selected' : ''}}>{{ $pay->nom_pays }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="ville">Ville de résidence <span class="text-danger">*</span></label>
                                                    <select class="custom-select form--group__select" id="ville" required>
                                                        <option value=""></option>
                                                        @foreach ($villes as $ville)
                                                        <option value="{{ $ville->id_ville }}" {{$user->id_ville == $ville->id_ville ? 'selected' : ''}}>{{ $ville->nom_ville }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="quartier">Lieu de résidence <sup>(Quartier)</sup> <span class="text-danger">*</span></label>
                                                    <input type="text" id="quartier" class="form--group__input" value="{{$user->quartier}}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn-standard-2 mb-5" id="btn_save_infos_perso"><i class="fa fa-save"></i>&nbsp; Sauvegarder</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
                                    <div class="content">
                                        <h2 class="title-content">Informations sur la pièce d'identité</h2>
                                        <form action="{{ route('enseignant-maj-piece') }}" class="form-row form-update-profil" id="form_piece">
                                            {{ csrf_field() }}
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="type_piece">Type de pièce <span class="text-danger">*</span></label>
                                                    <select class="custom-select form--group__select" id="type_piece" required>
                                                        <option value=""></option>
                                                        @foreach ($typepieces as $typepiece)
                                                        <option value="{{ $typepiece->id_typepiece }}" {{$user->enseignant->id_typepiece == $typepiece->id_typepiece ? 'selected' : ''}}>{{ $typepiece->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="numero_piece">Numéro de la pièce <span class="text-danger">*</span></label>
                                                    <input type="text" id="numero_piece" class="form--group__input" value="{{$user->enseignant->num_piece}}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="date_delivrance">Date de délivrance <span class="text-danger">*</span></label>
                                                    <input type="date" id="date_delivrance" class="form--group__input" value="{{$user->enseignant->date_delivrance_piece}}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="date_expiration">Date d'expiration</label>
                                                    <input type="date" id="date_expiration" class="form--group__input" value="{{$user->enseignant->date_expiration_piece}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <label class="form-label">Importez votre pièce <sup>(PDF)</sup> <span class="text-danger">*</span></label>
                                                <input type="file" name="file_piece" id="file_piece" required>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn-standard-2 mb-5" id="btn_save_piece"><i class="fa fa-save"></i>&nbsp; Sauvegarder</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
                                    <div class="content">
                                        <h2 class="title-content">Informations sur le CV</h2>
                                        <form action="{{ route('enseignant-maj-cv') }}" class="form-row form-update-profil" id="form_cv">
                                            {{ csrf_field() }}
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="enseignement">Enseignant du <span class="text-danger">*</span></label>
                                                    <select class="custom-select form--group__select" id="enseignement" onchange="afficherMatiere()" required>
                                                        <option value=""></option>
                                                        @foreach ($enseignements as $enseignement)
                                                        <option value="{{ $enseignement->id_enseignement }}" {{$user->enseignant->id_enseignement == $enseignement->id_enseignement ? 'selected' : ''}}>{{ $enseignement->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="matiere">Discipline enseignée <span class="text-danger">*</span></label>
                                                    <select class="custom-select form--group__select" id="matiere" required>
                                                        <option value=""></option>
                                                        @foreach ($matieres as $matiere)
                                                        <option value="{{ $matiere->id_matiere }}" {{$user->enseignant->id_matiere == $matiere->id_matiere ? 'selected' : ''}}>{{ $matiere->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="experience">Expériences professionnelles <span class="text-danger">*</span></label>
                                                    <select class="custom-select form--group__select" id="experience" required>
                                                        <option value=""></option>
                                                        @foreach ($experiences as $experience)
                                                        <option value="{{ $experience->id_experience }}" {{$user->enseignant->id_experience == $experience->id_experience ? 'selected' : ''}}>{{ $experience->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="etablissement">Etablissement actuel</label>
                                                    <input type="text" id="etablissement" class="form--group__input" value="{{$user->enseignant->etablissement}}">
                                                </div>
                                            </div>
                                            {{-- <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form--group">
                                                    <label for="import">Importer votre CV <span class="text-danger">*</span></label>
                                                    <div class="input-group input-file" id="fichier_cv">
                                                        <input type="text" class="form-control form--group__input"/>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <label class="form-label">Importez votre CV <sup>(PDF)</sup> <span class="text-danger">*</span></label>
                                                <input type="file" name="file_cv" id="file_cv" required>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn-standard-2 mb-5" id="btn_save_cv"><i class="fa fa-save"></i>&nbsp; Sauvegarder</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs4" role="tabpanel" aria-labelledby="tabs4-tab">
                                    <div class="content">
                                        <h2 class="title-content">Informations sur les Diplômes / Certifications</h2>
                                        <div class="infor-dispo mt-5">
                                            <div class="list-infor response-table-2">
                                                <table class="table table-striped" id="tableauDiplome">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th scope="col">Année d'obtention</th>
                                                            <th scope="col">Intutilé du diplôme</th>
                                                            <th scope="col">Fichier <sup> (PDF)</sup></th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @if (count($user->enseignant->diplomes()->get()) >= 1)
                                                            @foreach ($user->enseignant->diplomes()->get() as $diplome)
                                                            <tr>
                                                                <td>{{ $diplome->annee_obtention }}</td>
                                                                <td contenteditable="true">{{ $diplome->intitule_diplome }}</td>
                                                                <td>{{ $diplome->fichier_diplome }}</td>
                                                                <td class="action">
                                                                    <button class="icon --update"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                                    <button class="icon --delete" onclick="supprimerDiplome('{{ $diplome->id_diplome }}')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn-standard-2" data-toggle="modal" data-target="#add_diplome"><i class="fa fa-plus"></i> Ajouter</button>
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
    {{-- Modal Add Diplome --}}
    <div class="modal fade modalCreateAdmin" id="add_diplome" tabindex="-1" role="dialog" aria-labelledby="addSujetTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Ajout d'un diplôme</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ route('enseignant-maj-diplome') }}" class="form-row form-note" id="form_diplome">
                        {{ csrf_field() }}
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="annee_obtention">Année d'obtention <span class="text-danger">*</span></label>
                                <select class="custom-select form--group__select" id="annee_obtention" required>
                                    <option value=""></option>
                                    @for ($i = date("Y"); $i > date("Y")-60; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option> 
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="intitule_diplome">Intitulé du diplôme <span class="text-danger">*</span></label>
                                <input type="text" class="form--group__input" id="intitule_diplome" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Importez votre diplôme <sup>(PDF)</sup> <span class="text-danger">*</span></label>
                            <input type="file" name="file_diplome" id="file_diplome" required>
                        </div>
                        <div class="col-12 box-btn text-center"><hr>
                            <button class="btn-standard-dash --red mr-3" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                            <button type="submit" class="btn-standard-dash --blue" id="btn_save_diplome"><i class="fa fa-check"></i> Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-personnel')
    <script src="{{asset('assets/js/filepond.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
    <script>
        // Get a reference to the file input element
        // const inputElement = document.querySelector('input[id="piece_identite"]');
        const inputElement = document.querySelector('input[name="file_piece"]');
        const inputElement2 = document.querySelector('input[name="file_cv"]');
        const inputElement3 = document.querySelector('input[name="file_diplome"]');
    
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        const pond2 = FilePond.create(inputElement2);
        const pond3 = FilePond.create(inputElement3);

        //Connecting to server
        FilePond.setOptions({
            server: {
                url: '/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tableauDiplome').DataTable();
        } );
    </script>

    {{-- script img preview --}}
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
        });
    </script>

    {{-- input type file --}}
    <script>
        function bs_input_file() {
            $(".input-file").before(
                function() {
                    if ( ! $(this).prev().hasClass('input-ghost') ) {
                        var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name",$(this).attr("name"));
                        element.change(function(){
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function(){
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function(){
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                        });
                        $(this).find('input').css("cursor","pointer");
                        $(this).find('input').mousedown(function() {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }
        $(function() {
            bs_input_file();
        });
    </script>
@endsection