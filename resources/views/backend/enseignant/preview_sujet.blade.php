@extends('backend/enseignant/layout/default', ['title' => "CEL || Prévisualisation du sujet"])

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
                    <li><span>Prévisualisation</span></li>
                </ul>
                <h3 class="title">Prévisualisation du sujet</h3>
            </div>
            @if (Auth::user()->identifiant == $sujet->identifiant)
                <div class="box-btn-view">
                    <a href="{{ route('enseignant-modifier-sujet', $sujet->id_sujet) }}" class="btn-standard-2"><i class="fa fa-pencil"></i> Modifier le sujet</a>&nbsp;&nbsp;
                    @if ($sujet->top_actif == '0')
                        {{-- <a href="#" class="btn-standard-3" onclick="publishSujet({{$sujet->id_sujet}})"><i class="fa fa-check"></i> Valider & Publier</a>&nbsp;&nbsp; --}}
                        <button class="btn-standard-3" id="btn_publish_sujet" onclick="publishSujet({{$sujet->id_sujet}})"><i class="fa fa-check"></i> Valider & Publier</button>
                    @endif
                </div>
            @endif
            <hr class="underline">
            <div class="box-preview">
                <div class="box-preview--content">
                    <div class="model-view-sujet">
                        {{-- Image de fond --}}
                        <div class="image-fond">
                            <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo cel">
                        </div>

                        {{-- Prof - Niveau - Durée --}}
                        <div class="top-infor">
                            <p class="paragraph">{{ $sujet->enseignant->utilisateur->nom_prenom }}</p>
                            {{-- <p class="paragraph">{{ $sujet->matiere->libelle }}</p> --}}
                            <p class="paragraph"><span>Niveau: </span>{{ $sujet->niveau->abreviation }} {{$sujet->serie->libelle ?? ""}}</p>
                            <p class="paragraph"><span>Durée: </span>{{ get_duree_string($sujet->duree) }}</p>
                        </div>

                        {{-- Titre du sujet --}}
                        <div class="big-title">
                            {{-- <h3 class="title">{{ $sujet->titre }}</h3> --}}
                            <h3 class="title">{{ $sujet->type_sujet->libelle." - ".$sujet->matiere->libelle }}</h3>
                        </div>

                        {{-- Description du sujet --}}
                        <p class="paragraph text-center mb-5">{{ $sujet->description }}</p>

                        {{-- Texte du sujet --}}
                        <div class="paragraph mb-5">{!! $sujet->texte_sujet !!}</div>

                        {{-- Détails du sujet --}}
                        <div class="box-question">
                            @foreach ($sujet->exercices()->get() as $exercice)
                            {{-- Exercice --}}
                            <div class="box-exercise">
                                {{-- Titre de l'exercice --}}
                                <h3 class="title-exercise">{{ $exercice->titre_exercice }}</h3>

                                {{-- Sous-Exercice --}}
                                @foreach ($exercice->sous_exercices()->get() as $sous_exercice)
                                    @if ($sous_exercice->top_question == '0')
                                        <div class="box-exercise">
                                            {{-- Titre du sous-exercice --}}
                                            <h3 class="subtitle mt-3">{{ $sous_exercice->titre_sous_exercice }}</h3>
                                            {{-- Questions du sous-exercice --}}
                                            @foreach ($sous_exercice->questions()->get() as $index => $question)
                                                <div class="box-question {{ $index==0 ? 'mt-3' : 'mt-5'}} ml-5">
                                                    @if ($question->type_question == "Question Courte")
                                                        <p class="paragraph-2" style="font-weight: bold">{{ $question->libelle }}</p>
                                                        <div class="response-option">
                                                            <div class="long-text">
                                                                <textarea class="textarea-option" placeholder="Répondre ici ..."></textarea>
                                                            </div>
                                                        </div>
                                                    @elseif ($question->type_question == "Choix Unique")
                                                        <p class="paragraph-2">{{ $question->libelle }}</p>
                                                        <div class="response-option">
                                                            <div class="multiple-choice">
                                                                @foreach (explode('__', $question->proposition_reponse) as $proposition)
                                                                    <label class="radio">
                                                                        <input type="radio" name="{{ $question->id_question }}">
                                                                        <p class="paragraph">{{ $proposition }}</p>
                                                                        <span></span>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @elseif ($question->type_question == "Choix Multiples")
                                                        <p class="paragraph-2">{{ $question->libelle }}</p>
                                                        <div class="response-option">
                                                            <div class="option-checkbox">
                                                                @foreach (explode('__', $question->proposition_reponse) as $proposition)
                                                                    <label class="checkbox">
                                                                        <input type="checkbox">
                                                                        <p class="paragraph">{{ $proposition }}</p>
                                                                        <span></span>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @elseif ($question->type_question == "Rédaction")
                                                        <div class="content-text paragraph">
                                                            {!! $question->redaction_texte_html !!}
                                                        </div>
                                                        <div class="response-option">
                                                            <div class="long-text">
                                                                <textarea class="textarea-option" placeholder="Répondre ici ..."></textarea>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    {{-- Reponse attendue - Points - Explications --}}
                                                    <div class="box-rcpe">
                                                        <div class="box-rcpe--content">
                                                            <h3 class="title">Réponse(s) attendue(s) :</h3>
                                                            <ul class="paragraph">
                                                                {!! nl2br($question->reponse_attendue) !!}
                                                            </ul>
                                                        </div>
                                                        <div class="box-rcpe--content">
                                                            <h3 class="title">Point(s) : <span class="text-danger">{{ $question->points }}</span></h3>
                                                        </div>
                                                        <div class="box-rcpe--content">
                                                            <h3 class="title">Explication(s) :</h3>
                                                            <p class="paragraph">{!! nl2br($question->explications) !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif ($sous_exercice->top_question == '1')
                                        <div class="box-question mt-5">
                                            @if ($sous_exercice->questions()->first()->type_question == "Question Courte")
                                                <p class="paragraph-2">{{ $sous_exercice->questions()->first()->libelle }}</p>
                                                <div class="response-option">
                                                    <div class="long-text">
                                                        <textarea class="textarea-option" placeholder="Répondre ici ..."></textarea>
                                                    </div>
                                                </div>
                                            @elseif ($sous_exercice->questions()->first()->type_question == "Choix Unique")
                                                <p class="paragraph-2">{{ $sous_exercice->questions()->first()->libelle }}</p>
                                                <div class="response-option">
                                                    <div class="multiple-choice">
                                                        @foreach (explode('__', $sous_exercice->questions()->first()->proposition_reponse) as $proposition)
                                                            <label class="radio">
                                                                <input type="radio" name="{{ $sous_exercice->questions()->first()->id_question }}">
                                                                <p class="paragraph">{{ $proposition }}</p>
                                                                <span></span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @elseif ($sous_exercice->questions()->first()->type_question == "Choix Multiples")
                                                <p class="paragraph-2">{{ $sous_exercice->questions()->first()->libelle }}</p>
                                                <div class="response-option">
                                                    <div class="option-checkbox">
                                                        @foreach (explode('__', $sous_exercice->questions()->first()->proposition_reponse) as $proposition)
                                                            <label class="checkbox">
                                                                <input type="checkbox">
                                                                <p class="paragraph">{{ $proposition }}</p>
                                                                <span></span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @elseif ($sous_exercice->questions()->first()->type_question == "Rédaction")
                                                <div class="content-text paragraph">
                                                    {!! $sous_exercice->questions()->first()->redaction_texte_html !!}
                                                </div>
                                                <div class="response-option">
                                                    <div class="long-text">
                                                        <textarea class="textarea-option" placeholder="Répondre ici ..."></textarea>
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- Reponse attendue - Points - Explications --}}
                                            <div class="box-rcpe">
                                                <div class="box-rcpe--content">
                                                    <h3 class="title">Réponse(s) attendue(s) :</h3>
                                                    <ul class="paragraph">
                                                        {!! nl2br($sous_exercice->questions()->first()->reponse_attendue) !!}
                                                    </ul>
                                                </div>
                                                <div class="box-rcpe--content">
                                                    <h3 class="title">Point(s) : <span class="text-danger">{{ $sous_exercice->questions()->first()->points }}</span></h3>
                                                </div>
                                                <div class="box-rcpe--content">
                                                    <h3 class="title">Explication(s) :</h3>
                                                    <p class="paragraph">{!! nl2br($sous_exercice->questions()->first()->explications) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @endforeach
                                
                            {{-- Juste du contenu --}}
                            <p class="paragraph" style="color: #f2f5ff">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('other-content')
<a href="#top">
    <div class="button-return">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </div>
</a>
@endsection