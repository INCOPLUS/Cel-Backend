@extends('backend/enseignant/layout/default', ['title' => "CEL || Modification d'un sujet"])

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
                        <li><span>Modification d'un sujet</span></li>
                    </ul>
                    <h3 class="title">Informations sur le sujet</h3>
                </div>
                <hr class="underline">
                <div class="box-create-sujet">
                    {{-- <h3 class="title-form">Informations sur le sujet</h3> --}}
                    <div class="box-create">
                        <div class="box-form-create">
                            {{-- Formulaire de creation de sujet --}}
                            <form action="{{ route('enseignant-update-sujet', $sujet->id_sujet) }}" class="form-create-sujet" id="form_create_sujet">
                                {{ csrf_field() }}
                                <fieldset class="form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Type de sujet <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="type_sujet" required>
                                                <option value=""></option>
                                                @foreach ($typesujets as $typesujet)
                                                <option value="{{ $typesujet->id_typesujet }}" {{$typesujet->id_typesujet == $sujet->type_sujet->id_typesujet ? 'selected' : ''}}>{{ $typesujet->libelle }}</option>
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
                                                <option value="{{ $niveau->id_niveau }}" {{$niveau->id_niveau == $sujet->niveau->id_niveau ? 'selected' : ''}}>{{ $niveau->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Série</label>
                                            <select class="custom-select form--group__select" id="serie">
                                                <option value=""></option>
                                                @foreach ($series as $serie)
                                                <option value="{{ $serie->id_serie }}" {{(!empty($sujet->serie->id_serie) && $serie->id_serie == $sujet->serie->id_serie) ? 'selected' : ''}}>{{ $serie->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Matière <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="matiere" onchange="afficherChapitre()" required>
                                                <option value=""></option>
                                                @foreach ($matieres as $matiere)
                                                <option value="{{ $matiere->id_matiere }}" {{$matiere->id_matiere == $sujet->matiere->id_matiere ? 'selected' : ''}}>{{ $matiere->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Chapitre <span class="text-danger">*</span></label>
                                            <select class="custom-select form--group__select" id="chapitre" onchange="afficherLecon()" required>
                                                <option value=""></option>
                                                @foreach ($chapitres as $chapitre)
                                                <option value="{{ $chapitre->id_chapitre }}" {{$chapitre->id_chapitre == $sujet->chapitre->id_chapitre ? 'selected' : ''}}>{{ $chapitre->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Leçon</label>
                                            <select class="custom-select form--group__select" id="lecon">
                                                <option value=""></option>
                                                @foreach ($lecons as $lecon)
                                                <option value="{{ $lecon->id_lecon }}" {{(!empty($sujet->lecon->id_lecon) && $lecon->id_lecon == $sujet->lecon->id_lecon) ? 'selected' : ''}}>{{ $lecon->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label>Durée <sup>(h:m)</sup> <span class="text-danger">*</span></label>
                                            <input type="time" id="duree" step="60" class="form--group__input" value="{{ $sujet->duree }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8 col-lg-8">
                                        <div class="form--group">
                                            <label>Brève description du sujet</label>
                                            <input type="text" id="description_sujet" class="form--group__input" value="{{ $sujet->description }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="box-section-2">
                                            <legend class="label-white"><i class="fa fa-file-text"></i>&nbsp; Texte d'illustration
                                                <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-{{ (empty($texte_sujet) || $texte_sujet=='<p><br></p>') ? 'down' : 'up' }}"></i></span></a>
                                            </legend>
                                            <hr class="underline">
                                            <div class="editor-text {{ (empty($texte_sujet) || $texte_sujet=='<p><br></p>') ? 'hidden' : '' }}">
                                                <div id="main_editor"></div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <div class="bloc-exercices mt-5">
                                    @foreach ($sujet->exercices()->get() as $exercice)
                                    <div class="box-section">
                                        <legend class="label-white"><i class="fa fa-file-o"></i>&nbsp; Exercice
                                            <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                        </legend>
                                        <hr class="underline">
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group-create">
                                                    <input type="text" class="form-group-create__input" value="{{ $exercice->titre_exercice }}" placeholder="Titre de l'exercice (Ex: Exercice N°1)">
                                                </div>
                                            </div>
                                            <div class="col-12 bloc-questions">
                                                @foreach ($exercice->sous_exercices()->get() as $sous_exercice)
                                                    @if ($sous_exercice->top_question == '0')
                                                        <div class="box-sous-exercice">
                                                            <legend class="label-white"><i class="fa fa-files-o"></i>&nbsp; Sous-Exercice
                                                                <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                                            </legend>
                                                            <hr class="underline">
                                                            <div class="form-row">
                                                                <div class="col-12">
                                                                    <div class="form-group-create">
                                                                        <input type="text" class="form-group-create__input" value="{{ $sous_exercice->titre_sous_exercice }}" placeholder="Titre du sous-exercice">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 bloc-questions">
                                                                    @foreach ($sous_exercice->questions()->get() as $question)
                                                                        <div class="question-box">
                                                                            <legend class="label-white">Question
                                                                                <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                                                            </legend>
                                                                            <hr class="underline">
                                                                            <div class="form-row">
                                                                                <div class="col-12 type-question">
                                                                                    <div class="box-proposal">
                                                                                        <div class="response-proposal" onclick="choisirTypeQuestion(this)">
                                                                                            <div class="option">
                                                                                                @if ($question->type_question == "Question Courte")
                                                                                                    <i class="fa fa-question" aria-hidden="true"></i>
                                                                                                    <span>Question Courte</span>
                                                                                                @elseif ($question->type_question == "Choix Unique")
                                                                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                                                    <span>Choix Unique</span>
                                                                                                @elseif ($question->type_question == "Choix Multiples")
                                                                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                                                                    <span>Choix Multiples</span>
                                                                                                @elseif ($question->type_question == "Rédaction")
                                                                                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                                                                                    <span>Rédaction</span>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="response-proposal--content">
                                                                                                <div class="proposal" onclick="ajouterQuestionCourte(this)">
                                                                                                    <i class="fa fa-question" aria-hidden="true"></i>
                                                                                                    <span>Question Courte</span>
                                                                                                </div>
                                                                                                <div class="proposal" onclick="ajouterQuestionRadio(this)">
                                                                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                                                    <span>Choix Unique</span>
                                                                                                </div>
                                                                                                <div class="proposal" onclick="ajouterQuestionCheckbox(this)">
                                                                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                                                                    <span>Choix Multiples</span>
                                                                                                </div>
                                                                                                <div class="proposal" onclick="ajouterQuestionTexte(this)">
                                                                                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                                                                                    <span>Rédaction</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="added-option">
                                                                                            @if ($question->type_question == "Choix Unique")
                                                                                                <button class="btn-add-option" onclick="ajouterOption(this, 'circle')"><i class="fa fa-circle-o"></i></button>
                                                                                            @elseif ($question->type_question == "Choix Multiples")
                                                                                                <button class="btn-add-option" onclick="ajouterOption(this, 'square')"><i class="fa fa-square-o"></i></button>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                
                                                                                <div class="col-12 option-reponse">
                                                                                    @if ($question->type_question == "Question Courte")
                                                                                        <div class="col-12">
                                                                                            <div class="form-group-create">
                                                                                                <input type="text" class="form-group-create__input" value="{{ $question->libelle }}" placeholder="Saisissez la question ici ...">
                                                                                            </div>
                                                                                        </div>
                                                                                    @elseif ($question->type_question == "Choix Unique")
                                                                                        <div class="col-12">
                                                                                            <div class="form-group-create">
                                                                                                <input type="text" class="form-group-create__input" value="{{ $question->libelle }}" placeholder="Saisissez la question ici ...">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 form-response">
                                                                                            @foreach (explode('__', $question->proposition_reponse) as $proposition)
                                                                                                <div class="choice">
                                                                                                    <div class="circle"></div>
                                                                                                    <input type="text" class="form-group-create__input" value="{{ $proposition }}" placeholder="Saisissez une proposition de réponse ...">
                                                                                                    <div class="box-action">
                                                                                                        <div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    @elseif ($question->type_question == "Choix Multiples")
                                                                                        <div class="col-12">
                                                                                            <div class="form-group-create">
                                                                                                <input type="text" class="form-group-create__input" value="{{ $question->libelle }}" placeholder="Saisissez la question ici ...">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 form-response">
                                                                                            @foreach (explode('__', $question->proposition_reponse) as $proposition)
                                                                                                <div class="choice">
                                                                                                    <div class="square"></div>
                                                                                                    <input type="text" class="form-group-create__input" value="{{ $proposition }}" placeholder="Saisissez une proposition de réponse ...">
                                                                                                    <div class="box-action">
                                                                                                        <div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    @elseif ($question->type_question == "Rédaction")
                                                                                        <div class="col-12" id="bloc_text_editor_{{$index_editor}}">
                                                                                            <div class="editor-text">
                                                                                                <div id="editor{{$index_editor}}"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @php
                                                                                            $array_editor = [$question->redaction_texte_html];
                                                                                            $index_editor++;
                                                                                        @endphp
                                                                                    @endif
                                                                                </div>
                                                                
                                                                                <div class="col-12 form-row fieldset-rcpe mt-5">
                                                                                    <div class="col-12 mb-5">
                                                                                        <h3 class="border-white">Réponse(s) - Point(s) - Explication(s)</h3>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-5">
                                                                                        <div class="form--group">
                                                                                            <label>Réponse(s) attendue(s)</label>
                                                                                            <textarea class="form--group__textarea" placeholder="NB: Séparez chaque réponse par un retour à la ligne.">{{ $question->reponse_attendue }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-2">
                                                                                        <div class="form--group">
                                                                                            <label>Point(s)</label>
                                                                                            <input type="number" min="0" max="20" step=".25" class="form--group__input" value="{{ $question->points }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-5">
                                                                                        <div class="form--group">
                                                                                            <label>Explication(s)</label>
                                                                                            <textarea class="form--group__textarea" placeholder="Explications éventuelles...">{{ $question->explications }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                
                                                                                <div class="col-12 box-btn-action-2 .--red">
                                                                                    <button class="icon --red" onclick="supprimerQuestion(this)"><i class="fa fa-trash-o"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="box-btn-action">
                                                                <button class="icon --blue" onclick="ajouterQuestion(this)" title="Ajouter une question"><i class="fa fa-question"></i></button>
                                                                <button class="icon --red" onclick="supprimerSousExercice(this)" title="Supprimer le sous-exercice"><i class="fa fa-trash-o"></i></button>
                                                            </div>
                                                        </div>
                                                    @elseif ($sous_exercice->top_question == '1')
                                                        <div class="question-box">
                                                            <legend class="label-white">Question
                                                                <a href="#" class="text-white" onclick="blocToggle(this)"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a>
                                                            </legend>
                                                            <hr class="underline">
                                                            <div class="form-row">
                                                                <div class="col-12 type-question">
                                                                    <div class="box-proposal">
                                                                        <div class="response-proposal" onclick="choisirTypeQuestion(this)">
                                                                            <div class="option">
                                                                                @if ($sous_exercice->questions()->first()->type_question == "Question Courte")
                                                                                    <i class="fa fa-question" aria-hidden="true"></i>
                                                                                    <span>Question Courte</span>
                                                                                @elseif ($sous_exercice->questions()->first()->type_question == "Choix Unique")
                                                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                                    <span>Choix Unique</span>
                                                                                @elseif ($sous_exercice->questions()->first()->type_question == "Choix Multiples")
                                                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                                                    <span>Choix Multiples</span>
                                                                                @elseif ($sous_exercice->questions()->first()->type_question == "Rédaction")
                                                                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                                                                    <span>Rédaction</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="response-proposal--content">
                                                                                <div class="proposal" onclick="ajouterQuestionCourte(this)">
                                                                                    <i class="fa fa-question" aria-hidden="true"></i>
                                                                                    <span>Question Courte</span>
                                                                                </div>
                                                                                <div class="proposal" onclick="ajouterQuestionRadio(this)">
                                                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                                                    <span>Choix Unique</span>
                                                                                </div>
                                                                                <div class="proposal" onclick="ajouterQuestionCheckbox(this)">
                                                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                                                    <span>Choix Multiples</span>
                                                                                </div>
                                                                                <div class="proposal" onclick="ajouterQuestionTexte(this)">
                                                                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                                                                    <span>Rédaction</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="added-option">
                                                                            @if ($sous_exercice->questions()->first()->type_question == "Choix Unique")
                                                                                <button class="btn-add-option" onclick="ajouterOption(this, 'circle')"><i class="fa fa-circle-o"></i></button>
                                                                            @elseif ($sous_exercice->questions()->first()->type_question == "Choix Multiples")
                                                                                <button class="btn-add-option" onclick="ajouterOption(this, 'square')"><i class="fa fa-square-o"></i></button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                
                                                                <div class="col-12 option-reponse">
                                                                    @if ($sous_exercice->questions()->first()->type_question == "Question Courte")
                                                                        <div class="col-12">
                                                                            <div class="form-group-create">
                                                                                <input type="text" class="form-group-create__input" value="{{ $sous_exercice->questions()->first()->libelle }}" placeholder="Saisissez la question ici ...">
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($sous_exercice->questions()->first()->type_question == "Choix Unique")
                                                                        <div class="col-12">
                                                                            <div class="form-group-create">
                                                                                <input type="text" class="form-group-create__input" value="{{ $sous_exercice->questions()->first()->libelle }}" placeholder="Saisissez la question ici ...">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 form-response">
                                                                            @foreach (explode('__', $sous_exercice->questions()->first()->proposition_reponse) as $proposition)
                                                                                <div class="choice">
                                                                                    <div class="circle"></div>
                                                                                    <input type="text" class="form-group-create__input" value="{{ $proposition }}" placeholder="Saisissez une proposition de réponse ...">
                                                                                    <div class="box-action">
                                                                                        <div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @elseif ($sous_exercice->questions()->first()->type_question == "Choix Multiples")
                                                                        <div class="col-12">
                                                                            <div class="form-group-create">
                                                                                <input type="text" class="form-group-create__input" value="{{ $sous_exercice->questions()->first()->libelle }}" placeholder="Saisissez la question ici ...">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 form-response">
                                                                            @foreach (explode('__', $sous_exercice->questions()->first()->proposition_reponse) as $proposition)
                                                                                <div class="choice">
                                                                                    <div class="square"></div>
                                                                                    <input type="text" class="form-group-create__input" value="{{ $proposition }}" placeholder="Saisissez une proposition de réponse ...">
                                                                                    <div class="box-action">
                                                                                        <div class="icon --red" onclick="supprimerOption(this)"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @elseif ($sous_exercice->questions()->first()->type_question == "Rédaction")
                                                                        <div class="col-12" id="bloc_text_editor_{{$index_editor}}">
                                                                            <div class="editor-text">
                                                                                <div id="editor{{$index_editor}}"></div>
                                                                            </div>
                                                                        </div>
                                                                        @php
                                                                            $array_editor = [$sous_exercice->questions()->first()->redaction_texte_html];
                                                                            $index_editor++;
                                                                        @endphp
                                                                    @endif
                                                                </div>
                                                
                                                                <div class="col-12 form-row fieldset-rcpe mt-5">
                                                                    <div class="col-12 mb-5">
                                                                        <h3 class="border-white">Réponse(s) - Point(s) - Explication(s)</h3>
                                                                    </div>
                                                                    <div class="col-12 col-md-5">
                                                                        <div class="form--group">
                                                                            <label>Réponse(s) attendue(s)</label>
                                                                            <textarea class="form--group__textarea" placeholder="NB: Séparez chaque réponse par un retour à la ligne.">{{ $sous_exercice->questions()->first()->reponse_attendue }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-2">
                                                                        <div class="form--group">
                                                                            <label>Point(s)</label>
                                                                            <input type="number" min="0" max="20" step=".25" class="form--group__input" value="{{ $sous_exercice->questions()->first()->points }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-5">
                                                                        <div class="form--group">
                                                                            <label>Explication(s)</label>
                                                                            <textarea class="form--group__textarea" placeholder="Explications éventuelles...">{{ $sous_exercice->questions()->first()->explications }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                
                                                                <div class="col-12 box-btn-action-2 .--red">
                                                                    <button class="icon --red" onclick="supprimerQuestion(this)"><i class="fa fa-trash-o"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="box-btn-action">
                                            <button class="icon --green" onclick="ajouterSousExercice(this)" title="Ajouter un sous-exercice"><i class="fa fa-files-o"></i></button>
                                            <button class="icon --blue" onclick="ajouterQuestion(this)"><i class="fa fa-question"></i></button>
                                            <button class="icon --red" onclick="supprimerExercice(this)"><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <hr class="underline">

                                {{-- Bouton validation sujet --}}
                                <div class="col-12">
                                    <div class="box-btn-valid">
                                        <button class="btn-standard-2" onclick="ajouterExercice()">Ajouter Exercice</button>
                                        <button class="btn-standard-2" id="btn_save_brouillon" onclick="updateBrouillon()">Enregister Brouillon</button>
                                        <button class="btn-standard-3" id="btn_save_publish" onclick="updatePublish()">Enregister & Publier</button>
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
    @for ($i = $index_editor; $i <= 100; $i++)
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

        var editor_num = {{ $index_editor }};
        var array_editor_js = {!! json_encode($array_editor) !!};
        for (let index = 1; index < editor_num; index++) {
            setTextIntoEditor(index, array_editor_js[index-1]);
        }

        var html_text = "{!! $texte_sujet !!}";
        const maintext = text_intro.clipboard.convert(html_text);
        text_intro.setContents(maintext, 'silent');

    </script>
@endsection