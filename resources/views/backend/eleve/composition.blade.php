<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/images/logo-cel-copy.png')}}" type="image/x-icon">
    <title>CEL || Espace de composition</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

</head>
<body class="body">
    {{-- Page Wrapper --}}
    <div class="page-wrapper">
       {{-- Top Bar --}}
        <div class="top-bar">
            <div class="box-title">
                <a href="#" class="return"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                <h4 class="title">Espace de composition <span>cel</span></h4>
            </div>
            <div class="timeSujet">
                <span id="chrono"></span>
            </div>
        </div>

        {{-- Page Content --}}
        <div class="page-wrapper__page-content">
            <div class="main-content">
                <div class="space-compo" id="top">
                    <form action="{{ route('eleve-valider-compo') }}" id="form_valider_compo">
                        {{ csrf_field() }}
                        {{-- Sujet de composition --}}
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
                                    <div class="box-question details-sujet">
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
                                                                            <textarea class="textarea-option" id="{{ $question->id_question }}" placeholder="Répondre ici ..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                @elseif ($question->type_question == "Choix Unique")
                                                                    <p class="paragraph-2">{{ $question->libelle }}</p>
                                                                    <div class="response-option ml-3">
                                                                        <div class="multiple-choice" id="{{ $question->id_question }}">
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
                                                                    <div class="response-option ml-3">
                                                                        <div class="option-checkbox" id="{{ $question->id_question }}">
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
                                                                            <textarea class="textarea-option" id="{{ $question->id_question }}" placeholder="Répondre ici ..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif ($sous_exercice->top_question == '1')
                                                    <div class="box-question mt-5">
                                                        @if ($sous_exercice->questions()->first()->type_question == "Question Courte")
                                                            <p class="paragraph-2">{{ $sous_exercice->questions()->first()->libelle }}</p>
                                                            <div class="response-option">
                                                                <div class="long-text">
                                                                    <textarea class="textarea-option" id="{{ $sous_exercice->questions()->first()->id_question }}" placeholder="Répondre ici ..."></textarea>
                                                                </div>
                                                            </div>
                                                        @elseif ($sous_exercice->questions()->first()->type_question == "Choix Unique")
                                                            <p class="paragraph-2">{{ $sous_exercice->questions()->first()->libelle }}</p>
                                                            <div class="response-option ml-3">
                                                                <div class="multiple-choice" id="{{ $sous_exercice->questions()->first()->id_question }}">
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
                                                            <div class="response-option ml-3">
                                                                <div class="option-checkbox" id="{{ $sous_exercice->questions()->first()->id_question }}">
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
                                                                    <textarea class="textarea-option" id="{{ $sous_exercice->questions()->first()->id_question }}" placeholder="Répondre ici ..."></textarea>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        {{-- Bouton de validation --}}
                        <div class="box-btn text-center">
                            <button class="btn-standard-dash --red" onclick=""><i class="fa fa-close"></i> Abandonner</button>
                            <button class="btn-standard-dash --green" onclick="afficherAlertConfirm()"><i class="fa fa-check"></i> Terminer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Button Top --}}
    <a href="#top">
        <div class="button-return">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </div>
    </a>

    {{-- Modal Avertissement --}}
    <div class="modal-condition" id="modalAvertissement">
        <div class="modal-condition--content">
            <h3 class="title-avertissement">A votre attention</h3>
            <ul class="list-avertissement">
                <li>
                    <span>&#10070;</span>
                    <p class="paragraph">Séparez vous de tous documents en rapport avec votre sujet.</p>
                </li>
                <li>
                    <span>&#10070;</span>
                    <p class="paragraph">Eloignez vous de tout environnement pouvant vous distraire.</p>
                </li>
                <li>
                    <span>&#10070;</span>
                    <p class="paragraph">Eviter de sortir de votre espace de composition.</p>
                </li>
                <li>
                    <span>&#10070;</span>
                    <p class="paragraph">La tricherie limite vos capacités réelles de réussite.</p>
                </li>
                <li>
                    <span>&#10070;</span>
                    <p class="paragraph">Vous êtes meilleur(e) que la tricherie !</p>
                </li>
            </ul>
            <div class="rappel">
                <p class="paragraph">Cette épreuve se fermera dans: <span>{{ get_duree_string($sujet->duree) }}</span></p>
            </div>
            <h3 class="good-luck">Bonne Chance ...</h3>
            <div class="btn-box text-center mt-5">
                <a href="{{route('eleve-compo')}}" class="btn-standard-dash --red">Retour</a>
                <button class="btn-standard-dash --blue" id="btn_start_sujet" onclick="commencerEpreuve({{$sujet_eleve->id_sujet_eleve}})">Commencer l'épreuve</button>
            </div>
        </div>
    </div>

    {{-- Modal convocation --}}
    <div class="modal-convocation d-none" id="modal-convocation">
        <div class="modal-convocation--content">
            <div class="partage">
                <div class="text-partage">Partager</div>
                <i class="fa fa-share-alt btn-partage" aria-hidden="true"></i>
                <div class="box-link-partage">
                    <a href="#">
                        <div class="icone --facebook">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </div>
                    </a>
                    <a href="#">
                        <div class="icone --instagram">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </a>
                    <a href="#">
                        <div class="icone --whatsapp">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                        </div>
                    </a>
                    <a href="#">
                        <div class="icone --chat">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
            </div>
            <h3 class="title-convoc">convocation</h3>
            <div class="msg-convoc">
                <p class="paragraph">Mr/Mlle <span>Elidje Hoba Nick Jefferson</span>, ID <span>CEL025</span>
                    est invité(e) à participer <span>à l'examen</span> du <span>20/11/2021</span> à <span>23h59min59s</span>
                    et qui prendra fin le <span>30/11/2021</span> à <span>23h59min59s</span>
                </p>
            </div>
        </div>
    </div>

    {{-- Modal sujet terminé --}}
    <div class="modal-sujet-termine" id="modalConfirm">
        <div class="content">
            <p class="paragraph">Voulez-vous soumettre votre sujet ?</p>
            <div class="box-btn text-center">
                <button class="btn-standard-dash --red" id="btn_retour_compo" onclick="afficherAlertConfirm()">Retour</button>
                <button class="btn-standard-dash --green" id="btn_finish_compo" onclick="validerSujet()">Terminer & Envoyer</button>
            </div>
        </div>
    </div>

    {{-- Modal congratulation --}}
    <div class="modalResult --success" id="modalSuccess">
        <div class="js-content content"></div>
        <div class="modalResult--content">
            <div class="result-content">
                <div class="checkmark-circle">
                    <div class="background"></div>
                    <div class="checkmark draw"></div>
                </div>
                
                <h3 class="text-congra">Félicitations, vous avez réussi la composition.</h3>

                <div class="box-text">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Note obtenue:</h3>
                                <p class="paragraph" id="note_success"></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Mention:</h3>
                                <p class="paragraph" id="mention_success"></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3"></div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Temps mis:</h3>
                                <p class="paragraph" id="temps_success"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-btn">
                    <a href="{{route('eleve-sujets')}}">
                        <button class="btn-standard-dash --blue">Sortir</button>
                    </a>
                    <a href="{{route('eleve-correction-sujet', $sujet_eleve->id_sujet_eleve)}}">
                        <button class="btn-standard-dash --correction">Voir la correction</button>
                    </a>
                </div>
            </div> 
        </div> 
    </div>

    {{-- Modal failed --}}
    <div class="modalResult --failed" id="modalFailed">
        <div class="modalResult--content">
            <div class="result-content">
                <div class="failed">
                    <img src="{{asset('assets/images/close.svg')}}" alt="failed">
                </div>
                
                <h3 class="text-congra">Désolé vous êtes en-dessous de la moyenne. <br/>Vous avez echoué.</h3>

                <div class="box-text --failed">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Note obtenue:</h3>
                                <p class="paragraph" id="note_failed"></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Mention:</h3>
                                <p class="paragraph" id="mention_failed"></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3"></div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Temps mis:</h3>
                                <p class="paragraph" id="temps_failed"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-btn">
                    <a href="{{route('eleve-sujets')}}">
                        <button class="btn-standard-dash --blue">Sortir</button>
                    </a>
                    <a href="{{route('eleve-correction-sujet', $sujet_eleve->id_sujet_eleve)}}">
                        <button class="btn-standard-dash --correction">Voir la correction</button>
                    </a>
                </div>
            </div> 
        </div> 
    </div>
    
    {{-- Script Javascript --}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/eleve.js')}}"></script>

    {{-- Confretiis --}}
    <script>
        const Confettiful = function(el) {
            this.el = el;
            this.containerEl = null;
            
            this.confettiFrequency = 3;
            this.confettiColors = ['#EF2964', '#00C09D', '#2D87B0', '#48485E','#EFFF1D'];
            this.confettiAnimations = ['slow', 'medium', 'fast'];
            
            this._setupElements();
            this._renderConfetti();
        };

        Confettiful.prototype._setupElements = function() {
            const containerEl = document.createElement('div');
            const elPosition = this.el.style.position;
            
            if (elPosition !== 'relative' || elPosition !== 'absolute') {
                this.el.style.position = 'relative';
            }
            
            containerEl.classList.add('confetti-content');
            
            this.el.appendChild(containerEl);
            
            this.containerEl = containerEl;
        };

        Confettiful.prototype._renderConfetti = function() {
            this.confettiInterval = setInterval(() => {
                const confettiEl = document.createElement('div');
                const confettiSize = (Math.floor(Math.random() * 3) + 7) + 'px';
                const confettiBackground = this.confettiColors[Math.floor(Math.random() * this.confettiColors.length)];
                const confettiLeft = (Math.floor(Math.random() * this.el.offsetWidth)) + 'px';
                const confettiAnimation = this.confettiAnimations[Math.floor(Math.random() * this.confettiAnimations.length)];
                
                confettiEl.classList.add('confetti', 'confetti--animation-' + confettiAnimation);
                confettiEl.style.left = confettiLeft;
                confettiEl.style.width = confettiSize;
                confettiEl.style.height = confettiSize;
                confettiEl.style.backgroundColor = confettiBackground;
                
                confettiEl.removeTimeout = setTimeout(function() {
                confettiEl.parentNode.removeChild(confettiEl);
                }, 3000);
                
                this.containerEl.appendChild(confettiEl);
            }, 25);
        };

        window.confettiful = new Confettiful(document.querySelector('.js-content'));
    </script>
</body>
</html>