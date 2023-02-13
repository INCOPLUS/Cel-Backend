@extends('backend/eleve/layout/default', ['title' => "CEL || Correction du sujet"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="composition">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><a href="composition.html">Composition</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Correction</span></li>
                </ul>
                <h3 class="title">Correction du sujet</h3>
            </div>
            <hr class="underline">
            <div class="box-preview">
                <div class="box-preview--content">
                    <div class="correction-sujet">
                        <div class="model-view-sujet">
                            {{-- Image de fond --}}
                            <div class="image-fond">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo cel">
                            </div>
    
                            {{-- Prof - Niveau - Durée --}}
                            <div class="top-infor">
                                <p class="paragraph">{{ $sujet->enseignant->utilisateur->nom_prenom }}</p>
                                <p class="paragraph"><span>Niveau: </span>{{ $sujet->niveau->abreviation }} {{$sujet->serie->libelle ?? ""}}</p>
                                <p class="paragraph"><span>Durée: </span>{{ get_duree_string($sujet->duree) }}</p>
                            </div>
    
                            {{-- Titre du sujet --}}
                            <div class="big-title">
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
                                                                    <div class="content-choice">
                                                                        <div class="long-text {{ $question->reponse_attendue == $composition->questions_reponses()->where('id_question', $question->id_question)->first()->libelle_reponse ? '--success' : '--echec'}}">
                                                                            <textarea class="textarea-option">{{ $composition->questions_reponses()->where('id_question', $question->id_question)->first()->libelle_reponse}}</textarea>
                                                                        </div>
                                                                        @if ($question->reponse_attendue == $composition->questions_reponses()->where('id_question', $question->id_question)->first()->libelle_reponse)
                                                                            <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                        @else
                                                                            <div class="icone"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @elseif ($question->type_question == "Choix Unique")
                                                                <p class="paragraph-2">{{ $question->libelle }}</p>
                                                                <div class="response-option ml-3">
                                                                    <div class="multiple-choice">
                                                                        @foreach (explode('__', $question->proposition_reponse) as $proposition)
                                                                        <div class="content-choice">
                                                                            <label class="radio {{$question->reponse_attendue == $proposition ? '--success' : '--echec'}}">
                                                                                <input type="radio" {{$proposition == $composition->questions_reponses()->where('id_question', $question->id_question)->first()->libelle_reponse ? 'checked' : ''}} disabled>
                                                                                <p class="paragraph">{{ $proposition }}</p>
                                                                                <span></span>
                                                                            </label>
                                                                            @if ($question->reponse_attendue == $proposition)
                                                                                <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                            @else
                                                                                <div class="icone"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                            @endif
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @elseif ($question->type_question == "Choix Multiples")
                                                                <p class="paragraph-2">{{ $question->libelle }}</p>
                                                                <div class="response-option ml-3">
                                                                    <div class="option-checkbox">
                                                                        @foreach (explode('__', $question->proposition_reponse) as $proposition)
                                                                        <div class="content-choice">
                                                                            <label class="checkbox {{Str::contains($question->reponse_attendue, $proposition) ? '--success' : '--echec'}}">
                                                                                <input type="checkbox" {{Str::contains($composition->questions_reponses()->where('id_question', $question->id_question)->first()->libelle_reponse, $proposition) ? 'checked' : ''}} disabled>
                                                                                <p class="paragraph">{{ $proposition }}</p>
                                                                                <span></span>
                                                                            </label>
                                                                            @if (Str::contains($question->reponse_attendue, $proposition))
                                                                                <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                            @else
                                                                                <div class="icone"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                            @endif
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @elseif ($question->type_question == "Rédaction")
                                                                <div class="content-text paragraph">
                                                                    {!! $question->redaction_texte_html !!}
                                                                </div>
                                                                <div class="response-option">
                                                                    <div class="content-choice">
                                                                        <div class="long-text {{ $question->reponse_attendue == $composition->questions_reponses()->where('id_question', $question->id_question)->first()->libelle_reponse ? '--success' : '--echec'}}">
                                                                            <textarea class="textarea-option">{{ $composition->questions_reponses()->where('id_question', $question->id_question)->first()->libelle_reponse}}</textarea>
                                                                        </div>
                                                                        @if ($question->reponse_attendue == $composition->questions_reponses()->where('id_question', $question->id_question)->first()->libelle_reponse)
                                                                            <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                        @else
                                                                            <div class="icone"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            {{-- Reponse attendue - Points - Explications --}}
                                                            <div class="box-rcpe">
                                                                <div class="box-rcpe--content">
                                                                    <h3 class="title">Réponse(s) attendue(s) :</h3>
                                                                    <ul class="paragraph text-success" style="font-weight: 800">
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
                                                        <p class="paragraph-2" style="font-weight: bold">{{ $sous_exercice->questions()->first()->libelle }}</p>
                                                        <div class="response-option">
                                                            <div class="content-choice">
                                                                <div class="long-text {{ $sous_exercice->questions()->first()->reponse_attendue == $composition->questions_reponses()->where('id_question', $sous_exercice->questions()->first()->id_question)->first()->libelle_reponse ? '--success' : '--echec'}}">
                                                                    <textarea class="textarea-option">{{ $composition->questions_reponses()->where('id_question', $sous_exercice->questions()->first()->id_question)->first()->libelle_reponse}}</textarea>
                                                                </div>
                                                                @if ($sous_exercice->questions()->first()->reponse_attendue == $composition->questions_reponses()->where('id_question', $sous_exercice->questions()->first()->id_question)->first()->libelle_reponse)
                                                                    <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                @else
                                                                    <div class="icone"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @elseif ($sous_exercice->questions()->first()->type_question == "Choix Unique")
                                                        <p class="paragraph-2">{{ $sous_exercice->questions()->first()->libelle }}</p>
                                                        <div class="response-option ml-3">
                                                            <div class="multiple-choice">
                                                                @foreach (explode('__', $sous_exercice->questions()->first()->proposition_reponse) as $proposition)
                                                                <div class="content-choice">
                                                                    <label class="radio {{$sous_exercice->questions()->first()->reponse_attendue == $proposition ? '--success' : '--echec'}}">
                                                                        <input type="radio" {{$proposition == $composition->questions_reponses()->where('id_question', $sous_exercice->questions()->first()->id_question)->first()->libelle_reponse ? 'checked' : ''}} disabled>
                                                                        <p class="paragraph">{{ $proposition }}</p>
                                                                        <span></span>
                                                                    </label>
                                                                    @if ($sous_exercice->questions()->first()->reponse_attendue == $proposition)
                                                                        <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                    @else
                                                                        <div class="icone"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                    @endif
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @elseif ($sous_exercice->questions()->first()->type_question == "Choix Multiples")
                                                        <p class="paragraph-2">{{ $sous_exercice->questions()->first()->libelle }}</p>
                                                        <div class="response-option ml-3">
                                                            <div class="option-checkbox">
                                                                @foreach (explode('__', $sous_exercice->questions()->first()->proposition_reponse) as $proposition)
                                                                <div class="content-choice">
                                                                    <label class="checkbox {{Str::contains($sous_exercice->questions()->first()->reponse_attendue, $proposition) ? '--success' : '--echec'}}">
                                                                        <input type="checkbox" {{Str::contains($composition->questions_reponses()->where('id_question', $sous_exercice->questions()->first()->id_question)->first()->libelle_reponse, $proposition) ? 'checked' : ''}} disabled>
                                                                        <p class="paragraph">{{ $proposition }}</p>
                                                                        <span></span>
                                                                    </label>
                                                                    @if (Str::contains($sous_exercice->questions()->first()->reponse_attendue, $proposition))
                                                                        <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                    @else
                                                                        <div class="icone"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                    @endif
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @elseif ($sous_exercice->questions()->first()->type_question == "Rédaction")
                                                        <div class="content-text paragraph">
                                                            {!! $sous_exercice->questions()->first()->redaction_texte_html !!}
                                                        </div>
                                                        <div class="response-option">
                                                            <div class="content-choice">
                                                                <div class="long-text {{ $sous_exercice->questions()->first()->reponse_attendue == $composition->questions_reponses()->where('id_question', $sous_exercice->questions()->first()->id_question)->first()->libelle_reponse ? '--success' : '--echec'}}">
                                                                    <textarea class="textarea-option">{{ $composition->questions_reponses()->where('id_question', $sous_exercice->questions()->first()->id_question)->first()->libelle_reponse}}</textarea>
                                                                </div>
                                                                @if ($sous_exercice->questions()->first()->reponse_attendue == $composition->questions_reponses()->where('id_question', $sous_exercice->questions()->first()->id_question)->first()->libelle_reponse)
                                                                    <div class="icone"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                @else
                                                                    <div class="icone"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif

                                                    {{-- Reponse attendue - Points - Explications --}}
                                                    <div class="box-rcpe">
                                                        <div class="box-rcpe--content">
                                                            <h3 class="title">Réponse(s) attendue(s) :</h3>
                                                            <ul class="paragraph text-success" style="font-weight: 800">
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
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection