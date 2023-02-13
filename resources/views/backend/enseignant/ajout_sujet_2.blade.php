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
                            <div action="" class="form-create-sujet">
                                <fieldset class="form-row" style="display: none">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="type">Type de sujet <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="" required>
                                                <option value=""></option>
                                                <option value="">Devoir</option>
                                                <option value="">Interrogation</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="type">Titre du sujet <span class="text-danger">*</span></label>
                                            <input type="text" id="" class="form--group__input" placeholder="Ex: Devoir N° 1">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="type">Brève description du sujet</label>
                                            <input type="text" id="" class="form--group__input" placeholder="Ex: Ce sujet comporte 4 exerices">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="classe">Niveau <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="" required>
                                                <option value=""></option>
                                                <option value="">Quatrième (4ème)</option>
                                                <option value="">Troisième (3ème)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="classe">Série</label>
                                            <select class="custom-select form--group__select" id="">
                                                <option value=""></option>
                                                <option value="">A1</option>
                                                <option value="">C</option>
                                                <option value="">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="matiere">Matière <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="matiere" required>
                                                <option value=""></option>
                                                <option value="">Anglais</option>
                                                <option value="">Mathématiques</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="matiere">Chapitre <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="matiere" required>
                                                <option value=""></option>
                                                <option value="">Etude des fonctions</option>
                                                <option value="">Probabilité</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="">Leçon</label>
                                            <select class="custom-select form--group__select" id="matiere" required>
                                                <option value=""></option>
                                                <option value="">Nombres aléatoires</option>
                                                <option value="">Fonctions affines</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="hour">Durée <sup>(h:m)</sup> <span class="text-danger">*</span></label>
                                            <input type="time" name="hour" id="hour" step="60" class="form--group__input">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn-standard-2" onclick="ajouterExercice()"><i class="fa fa-plus"></i> Ajouter un exercice</button>
                                    </div>
                                </fieldset>
                                <hr class="underline">

                                <div class="bloc-exercices mt-5">
                                    <div class="box-section" style="display: block">
                                        <legend class="label-white"><i class="fa fa-file-o"></i>&nbsp; Exercice
                                            <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                        </legend>
                                        <hr class="underline">
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group-create">
                                                    <input type="text" class="form-group-create__input" placeholder="Titre de l'exercice (Ex: Exercice N°1)">
                                                </div>
                                            </div>
                                            <div class="col-12 bloc-questions">
                                                <div class="box-sous-exercice">
                                                    <legend class="label-white"><i class="fa fa-files-o"></i>&nbsp; Sous-Exercice
                                                        <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                                    </legend>
                                                    <hr class="underline">
                                                    <div class="form-row">
                                                        <div class="col-12">
                                                            <div class="form-group-create">
                                                                <input type="text" class="form-group-create__input" placeholder="Titre du sous-exercice">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 bloc-questions"></div>
                                                    </div>
                                                    <div class="box-btn-action">
                                                        <button class="icon --blue" onclick="ajouterQuestion(this)" title="Ajouter une question"><i class="fa fa-question"></i></button>
                                                        <button class="icon --red" onclick="supprimerSousExercice(this)" title="Supprimer le sous-exercice"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-btn-action">
                                            <button class="icon --green" onclick="ajouterSousExercice(this)" title="Ajouter un sous-exercice"><i class="fa fa-files-o"></i></button>
                                            <button class="icon --blue" onclick="ajouterQuestion(this)" title="Ajouter une question"><i class="fa fa-question"></i></button>
                                            <button class="icon --red" onclick="supprimerExercice(this)" title="Supprimer l'exercice"><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </div>

                                    <div class="box-section" style="display: none">
                                        <legend class="label-white"><i class="fa fa-file-o"></i>&nbsp; Exercice
                                            <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                        </legend>
                                        <hr class="underline">
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group-create">
                                                    <label class="form-label">Titre de l'exercice</label>
                                                    <input type="text" class="form-group-create__input" placeholder="Ex: Exercice N°1">
                                                </div>
                                            </div>
                                            <div class="col-12 bloc-questions">
                                                <div class="question-box">
                                                    <legend class="label-white">Question
                                                        <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                                    </legend>
                                                    <hr class="underline">
                                                    <div class="form-row">
                                                        {{-- Type de question --}}
                                                        <div class="col-12 type-question">
                                                            <div class="box-proposal" onclick="choisirTypeQuestion(this)">
                                                                <div class="response-proposal">
                                                                    <div class="option">
                                                                        <i class="fa fa-question" aria-hidden="true"></i>
                                                                        <span>Type de question</span>
                                                                    </div>
                                                                    <div class="response-proposal--content">
                                                                        <div class="proposal" onclick="ajouterQuestionCourte(this)">
                                                                            <i class="fa fa-paragraph" aria-hidden="true"></i>
                                                                            <span>Question Courte</span>
                                                                        </div>
                                                                        <div class="proposal" onclick="ajouterQuestionTexte(this)">
                                                                            <i class="fa fa-align-left" aria-hidden="true"></i>
                                                                            <span>Texte</span>
                                                                        </div>
                                                                        <div class="proposal" onclick="ajouterQuestionRadio(this)">
                                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                            <span>Choix Unique</span>
                                                                        </div>
                                                                        <div class="proposal" onclick="ajouterQuestionCheckbox(this)">
                                                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                                                            <span>Choix Multiples</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="added-option">
                                                                    <button class="btn-add-option" onclick="ajouterOption(this, 'circle')"><i class="fa fa-circle-o"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Question + Options de reponse --}}
                                                        <div class="col-12 option-reponse">
                                                            {{-- Question --}}
                                                            <div class="col-12">
                                                                <div class="form-group-create">
                                                                    <div class="editor-text">
                                                                        {{-- <div id="toolbar"></div> --}}
                                                                        {{-- <div id="editor"></div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Réponse(s) attendue(s) --}}
                                                        <div class="col-12 form-row fieldset-rcpe mt-5">
                                                            <div class="col-12 mb-5">
                                                                <h3 class="border-white">Réponse(s) - Point(s) - Explication(s)</h3>
                                                            </div>
                                                            <div class="col-12 col-md-5">
                                                                <div class="form--group">
                                                                    <label for="">Réponse(s) attendue(s) <span class="text-danger">*</span></label>
                                                                    {{-- <input type="text" class="form--group__input"> --}}
                                                                    <textarea class="form--group__textarea" placeholder="NB: Séparez chaque réponse par un retour à la ligne."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-2">
                                                                <div class="form--group">
                                                                    <label>Point(s) <span class="text-danger">*</span></label>
                                                                    <input type="number" min="0" max="20" class="form--group__input">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-5">
                                                                <div class="form--group">
                                                                    <label>Explication(s)</label>
                                                                    <textarea class="form--group__textarea" placeholder="Explications éventuelles..."></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Suppression de la question --}}
                                                        <div class="col-12 box-btn-action-2 .--red">
                                                            <button class="icon --red" onclick="supprimerQuestion(this)"><i class="fa fa-trash-o"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="question-box" style="display: none">
                                                    <legend class="label-white">Question
                                                        <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                                    </legend>
                                                    <hr class="underline">
                                                    <div class="form-row">
                                                        {{-- Type de question --}}
                                                        <div class="col-12 type-question">
                                                            <div class="box-proposal">
                                                                <div class="response-proposal" onclick="choisirTypeQuestion(this)">
                                                                    <div class="option">
                                                                        <i class="fa fa-question" aria-hidden="true"></i>
                                                                        <span>Type de question</span>
                                                                    </div>
                                                                    <!-- option type de reponse -->
                                                                    <div class="response-proposal--content">
                                                                        <div class="proposal" onclick="ajouterQuestionCourte(this)">
                                                                            <i class="fa fa-paragraph" aria-hidden="true"></i>
                                                                            <span>Question Courte</span>
                                                                        </div>
                                                                        <div class="proposal" onclick="ajouterQuestionTexte(this)">
                                                                            <i class="fa fa-align-left" aria-hidden="true"></i>
                                                                            <span>Texte</span>
                                                                        </div>
                                                                        <div class="proposal" onclick="ajouterQuestionRadio(this)">
                                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                            <span>Choix Unique</span>
                                                                        </div>
                                                                        <div class="proposal" onclick="ajouterQuestionCheckbox(this)">
                                                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                                                            <span>Choix Multiples</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="added-option">
                                                                    <button class="btn-add-option" onclick="ajouterOption(this, 'circle')"><i class="fa fa-circle-o"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Question + Options de reponse --}}
                                                        <div class="col-12 option-reponse">
                                                            {{-- Question --}}
                                                            <div class="col-12">
                                                                <div class="form-group-create">
                                                                    {{-- <label for="titre">Question</label> --}}
                                                                    <input type="text" name="titre" id="" class="form-group-create__input" placeholder="Saisissez la question ici ...">
                                                                </div>
                                                            </div>

                                                            {{-- Choix Unique --}}
                                                            <div class="col-12 form-response">
                                                                <div class="choice">
                                                                    <div class="circle"></div>
                                                                    <input type="text" placeholder="Saisissez une proposition de réponse ..." class="form-group-create__input">
                                                                    <div class="box-action">
                                                                        <div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="choice">
                                                                    <div class="circle"></div>
                                                                    <input type="text" placeholder="Saisissez une proposition de réponse ..." class="form-group-create__input">
                                                                    <div class="box-action">
                                                                        <div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- Reponse attendue --}}
                                                            <h3 style="color: white;">Réponse(s) & Explication(s)</h3>
                                                            <hr class="underline">
                                                            <fieldset class="form-row fieldset-rcpe">
                                                                <div class="col-12 col-md-8 col-lg-8">
                                                                    <div class="form--group">
                                                                        <label for="">Réponse attendue <span class="text-danger">*</span></label>
                                                                        <input type="text" id="" class="form--group__input" placeholder="Réponse attendue">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-4 col-lg-4">
                                                                    <div class="form--group">
                                                                        <label for="">Point <span class="text-danger">*</span></label>
                                                                        <input type="number" min="0" class="form--group__input">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form--group">
                                                                        <label for="">Explications</label>
                                                                        <textarea name="" id="" class="form--group__textarea" placeholder="Explication"></textarea>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>

                                                        <div class="box-btn-action-2 .--red">
                                                            <div class="icon --red"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-btn-action">
                                            <div class="icon --blue"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                            <div class="icon --red"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="box-section" style="display: none">
                                    {{-- Exercice --}}
                                    <fieldset class="form-row">
                                        <div class="col-12">
                                            <div class="form-group-create">
                                                <label for="titre">Exercice</label>
                                                <input type="text" id="" class="form-group-create__input" placeholder="Titre de l'exercice (Ex: Exercice N°1)">
                                            </div>
                                        </div>
                                    </fieldset>

                                    {{-- Type de question --}}
                                    <fieldset class="form-row type-question">
                                        <div class="col-md-8">
                                            <div class="box-proposal">
                                                <div class="response-proposal">
                                                    <div class="option">
                                                        <i class="fa fa-question" aria-hidden="true"></i>
                                                        <span>Type de question</span>
                                                    </div>
                                                    <!-- option type de reponse -->
                                                    <div class="response-proposal--content">
                                                        <div class="proposal" onclick="ajouterQuestionCourte(this)">
                                                            <i class="fa fa-paragraph" aria-hidden="true"></i>
                                                            <span>Question Courte</span>
                                                        </div>
                                                        <div class="proposal" onclick="ajouterQuestionTexte(this)">
                                                            <i class="fa fa-align-left" aria-hidden="true"></i>
                                                            <span>Texte Long</span>
                                                        </div>
                                                        <div class="proposal" onclick="ajouterQuestionRadio(this)">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                            <span>Choix Unique</span>
                                                        </div>
                                                        <div class="proposal" onclick="ajouterQuestionCheckbox(this)">
                                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                                            <span>Choix Multiples</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    {{-- Question + Options de reponse --}}
                                    <div class="col-12 option-reponse">
                                        {{-- Question --}}
                                        <div class="col-12">
                                            <div class="form-group-create">
                                                {{-- <label for="titre">Question</label> --}}
                                                <input type="text" name="titre" id="" class="form-group-create__input" placeholder="Saisissez la question ici ...">
                                            </div>
                                        </div>

                                        {{-- Choix Unique --}}
                                        <div class="col-12 form-response">
                                            <div class="choice">
                                                <div class="circle"></div>
                                                <input type="text" placeholder="Proposition de reponse ..." class="form-group-create__input">
                                                <div class="box-action">
                                                    <div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ajouter-option mb-5" onclick="ajouterOption(this, 'circle')">
                                            <i class="fa fa-plus"></i>
                                            <span>Ajouter une option</span>
                                        </div>

                                        {{-- Reponse attendue --}}
                                        <h3 style="color: white;">Réponse(s) & Explication(s)</h3>
                                        <hr class="underline">
                                        <fieldset class="form-row fieldset-rcpe">
                                            <div class="col-12 col-md-8 col-lg-8">
                                                <div class="form--group">
                                                    <label for="">Réponse attendue <span class="text-danger">*</span></label>
                                                    <input type="text" id="" class="form--group__input" placeholder="Réponse attendue">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 col-lg-4">
                                                <div class="form--group">
                                                    <label for="">Point <span class="text-danger">*</span></label>
                                                    <input type="number" min="0" class="form--group__input">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form--group">
                                                    <label for="">Explications</label>
                                                    <textarea name="" id="" class="form--group__textarea" placeholder="Explication"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    {{-- Box button delete/duplicate --}}
                                    <div class="box-btn-action">
                                        <div class="icon --blue"><i class="fa fa-files-o" aria-hidden="true"></i></div>
                                        <div class="icon --red"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                    </div>
                                </div>

                                {{-- Bouton validation sujet --}}
                                <div class="col-12">
                                    <div class="box-btn-valid">
                                        <a href="#" target="_blank"><button type="button" class="btn-standard-2">Prévisualiser</button></a>
                                        <button type="submit" class="btn-standard-2">Enregister</button>
                                        <button type="submit" class="btn-standard-3">Enregister & Envoyer</button>
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
{{-- button top --}}
<a href="#top">
    <div class="button-return">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </div>
</a>
<div style="display: none">
    @for ($i = 1; $i <= 100; $i++)
    <div class="col-12" id="bloc_text_editor_{{$i}}">
        <div class="form-group-create">
            <div class="editor-text">
                <div id="editor{{$i}}"></div>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection

@section('script-personnel')
    <script src="{{asset('assets/js/quill.core.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    {{-- <script src="{{asset('assets/js/quill.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/vue.js')}}"></script> --}}

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
            ['link', 'image'],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }]
        ];

        var edittexts = [];
        for (let i = 1; i < 101; i++) {
            edittexts[i] = new Quill('#editor'+i, {
                modules: {toolbar: toolbarOptions},
                placeholder: 'Rediger votre texte ici ...',
                theme: 'snow'
            });
        }

        // var quill = new Quill('#editor', {
        //     modules: {
        //         toolbar: toolbarOptions
        //     },
        //     placeholder: 'Rediger votre texte ici ...',
        //     theme: 'snow'
        // });
        

        // var app = new Vue({
        //     el: '#app',
        //     data: {
        //         forms: [{ id: 1 }]
        //     },
        //     methods: {
        //         add() {
        //             this.forms.push({ id: this.forms.slice(-1)[0].id + 1 })
        //         },
        //         deleteInput(id) {
        //             this.forms = this.forms.filter(t => t.id != id)
        //         }
        //     },
            
        // });
    </script>
@endsection