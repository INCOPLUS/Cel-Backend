@extends('backend/enseignant/layout/default', ['title' => "CEL || Ajout d'un nouveau sujet"])

@section('css-personnel')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
@endsection

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="main-content">
            <div class="box-gestion-general" id="top">
                <div class="dash-heading mb-5">
                    <ul class="my-breadcrumb">
                        <li><a href="{{ route('enseignant-accueil') }}">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><a href="{{ route('enseignant-gestion-sujet') }}">Gestion des sujets</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Création d'un sujet</span></li>
                    </ul>
                    <h3 class="title">Informations sur le sujet</h3>
                </div>
                <hr class="underline">
                <div class="box-create-sujet">
                    {{-- <h3 class="title-form">Informations sur le sujet</h3> --}}
                    <div class="box-create">
                        <div class="box-form-create">
                            {{-- Formulaire de creation de sujet --}}
                            <form action="{{ route('enseignant-add-sujet') }}" class="form-create-sujet" id="form_create_sujet">
                                {{ csrf_field() }}
                                <fieldset class="form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Type de sujet <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="type_sujet" required>
                                                <option value=""></option>
                                                @foreach ($typesujets as $typesujet)
                                                <option value="{{ $typesujet->id_typesujet }}">{{ $typesujet->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Niveau <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="niveau" onchange="afficherChapitre(); afficherSerie();" required>
                                                <option value=""></option>
                                                @foreach ($niveaux as $niveau)
                                                <option value="{{ $niveau->id_niveau }}">{{ $niveau->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Série</label>
                                            <select class="custom-select form--group__select" id="serie">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Matière <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="matiere" onchange="afficherChapitre()" required>
                                                <option value=""></option>
                                                @foreach ($matieres as $matiere)
                                                <option value="{{ $matiere->id_matiere }}">{{ $matiere->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Chapitre <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="chapitre" onchange="afficherLecon()" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Leçon</label>
                                            <select class="custom-select form--group__select" id="lecon">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Durée <sup>(h:m)</sup> <span class="text-danger">*</span></label>
                                            <input type="time" id="duree" step="60" class="form--group__input" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8 col-lg-8">
                                        <div class="form--group">
                                            <label>Brève description du sujet</label>
                                            <input type="text" id="description_sujet" class="form--group__input">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="box-section-2">
                                            <legend class="label-white"><i class="fa fa-file-text"></i>&nbsp; Texte d'illustration
                                                <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-down"></i></span></a>
                                            </legend>
                                            <hr class="underline">
                                            <div class="editor-text hidden">
                                                <div id="main_editor"></div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <div class="bloc-exercices"></div>
                                <hr class="underline">

                                {{-- Bouton validation sujet --}}
                                <div class="col-12">
                                    <div class="box-btn-valid">
                                        <button class="btn-standard-2" onclick="ajouterExercice()">Ajouter Exercice</button>
                                        <button class="btn-standard-2" id="btn_save_brouillon" onclick="saveBrouillon()">Enregister Brouillon</button>
                                        <button class="btn-standard-3" id="btn_save_publish" onclick="savePublish()">Enregister & Publier</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('other-content')
{{-- button top --}}
<a href="#top">
    <div class="button-return">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </div>
</a>
<div style="display: none">
    @for ($i = 1; $i <= 100; $i++)
    <div class="col-12" id="bloc_text_editor_{{$i}}">
        <div class="editor-text">
            <div id="editor{{$i}}"></div>
        </div>
    </div>
    @endfor
</div>
@endsection

@section('script-personnel')
    <script src="{{asset('assets/js/quill.core.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'align': [] }],
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            // ['link', 'image'],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }]
        ];

        var editor_num = 1;
        var edittexts = [];
        for (let i = 1; i < 101; i++) {
            edittexts[i] = new Quill('#editor'+i, {
                modules: {toolbar: toolbarOptions},
                placeholder: 'Rediger votre texte ici ...',
                theme: 'snow'
            });
        }

        var text_intro = new Quill('#main_editor', {
            modules: {toolbar: toolbarOptions},
            placeholder: 'Rediger votre texte ici ...',
            theme: 'snow'
        });
    </script>
@endsection