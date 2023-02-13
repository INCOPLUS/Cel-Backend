@extends('backend/eleve/layout/default', ['title' => "CEL || Espace de composition"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="space-compo" id="top">
            <h3 class="title-compo">Espace de composition <span class="timer text-danger ml-5"></span></h3>

            <form action="#">
                <div class="box-preview">
                    <div class="box-preview--content">
                        {{-- <div class="box-categ-sujet">
                            <div class="content"><p class="paragraph">Devoir</p></div>
                            <div class="content"><p class="paragraph">Allemand</p></div>
                        </div> --}}

                        <!-- model sujet -->
                        <div class="model-view-sujet">
                            <div class="image-fond">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo cel">
                            </div>

                            <!-- top information -->
                            <div class="top-infor">
                                <p class="paragraph">Adeko Jean Nevry</p>
                                <p class="paragraph"><span>Année Academique</span>2021 - 2022</p>
                                <p class="paragraph"><span>Classe:</span>3eme</p>
                            </div>

                            <!-- grand titre -->
                            <div class="big-title">
                                <h3 class="title">kassenarbeit n°1</h3>
                            </div>

                            <!-- nombre de page  -->
                            <p class="paragraph text-center mb-5">Ce sujet comporte 2 pages, numeroté 1/2 et 2/2</p>

                            <!-- text sujet -->
                            <div class="text-sujet">
                                <h3 class="title-sujet">In der Schule</h3>
                                <div class="content-text">
                                    <p class="paragraph">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem amet laborum asperiores quam voluptates accusantium nobis inventore dolor possimus. Aspernatur hic iusto deleniti eos, assumenda tenetur placeat repudiandae maxime quaerat?
                                        Dolorem nihil aliquid sapiente labore minima consequatur modi natus corrupti repellat, numquam officiis, eum officia quasi dolores totam ducimus quia. Facilis obcaecati eaque cumque reiciendis voluptatum eveniet. Corrupti, sequi? Sit.
                                        Dolore, beatae hic. Harum architecto porro laborum sapiente voluptatem repellat corrupti, impedit inventore repudiandae quos neque consequatur necessitatibus dolore beatae minima accusamus dolor odit laudantium pariatur! Quos autem illo mollitia!
                                        Distinctio excepturi dolorem, aut obcaecati tempora enim quia dolorum libero quam numquam error reprehenderit, provident perspiciatis dicta voluptate optio omnis, quae deserunt non dignissimos. Architecto consequatur iusto tempora ipsa fugit?
                                        Quisquam blanditiis quae dignissimos fuga sint eligendi modi numquam ipsa eum repellendus, dolor, officia placeat aliquid quam atque et perspiciatis quibusdam adipisci iure voluptates! Odio sint voluptas quibusdam delectus labore.
                                        Voluptatem aut fugit accusantium aliquam, veniam inventore quaerat sunt laboriosam minus delectus animi a quod. Ullam enim esse, assumenda iste veniam odio mollitia blanditiis neque ad rem exercitationem libero nostrum.
                                        Tenetur aliquam illo perspiciatis. Eligendi perspiciatis ut sequi modi. Modi distinctio tenetur similique molestias eius, exercitationem facilis tempore cum excepturi delectus esse velit reiciendis aperiam sed, voluptates vel nobis iste?
                                        Rem aspernatur fugiat autem dolore eius, debitis similique. Nobis optio sit quos ad! Repellat quibusdam repellendus temporibus asperiores quos accusamus ad esse suscipit vero id quas sed, saepe adipisci facere
                                    </p>
                                </div>
                            </div>

                            <!-- questions -->
                            <div class="box-question">
                                <!-- titles -->
                                <div class="all-title">
                                    <h2 class="title-exercise">aufgaben zum textverständnis</h2>
                                    <h3 class="subtitle">A- Sous titre de l'exercice</h3>
                                </div>

                                <!-- exercise -->
                                <div class="box-exercise">
                                    <!-- titre -->
                                    <h3 class="title-exercise">exercice N°1</h3>

                                    <!-- question -->
                                    <p class="paragraph">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta ?
                                    </p>

                                    <!-- option de reponse -->
                                    <div class="response-option">
                                        <div class="multiple-choice">
                                            <label class="radio">
                                                <input type="radio" value="option1" name="option">
                                                <p class="paragraph">Option 1</p>
                                                <span></span>
                                            </label>
                                
                                            <label class="radio">
                                                <input type="radio" value="option2" name="option">
                                                <p class="paragraph">Option 2</p>
                                                <span></span>
                                            </label>

                                            <label class="radio">
                                                <input type="radio" value="option3" name="option">
                                                <p class="paragraph">Option 3</p>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- exercise -->
                                <div class="box-exercise">
                                    <!-- titre -->
                                    <h3 class="title-exercise">exercice N°2</h3>

                                    <!-- question -->
                                    <p class="paragraph">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta 
                                    </p>

                                    <!-- option de reponse -->
                                    <div class="response-option">
                                        <div class="option-checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" value="">
                                                <p class="paragraph">Option 1</p>
                                                <span></span>
                                            </label>

                                            <label class="checkbox">
                                                <input type="checkbox" value="">
                                                <p class="paragraph">Option 2</p>
                                                <span></span>
                                            </label>

                                            <label class="checkbox">
                                                <input type="checkbox" value="">
                                                <p class="paragraph">Option 3</p>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- exercise -->
                                <div class="box-exercise">
                                    <!-- titre -->
                                    <h3 class="title-exercise">exercice N°3</h3>

                                    <!-- question -->
                                    <p class="paragraph">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta 
                                    </p>

                                    <!-- option de reponse -->
                                    <div class="response-option">
                                        <div class="short-text">
                                            <input type="text" class="input-option" placeholder="Répondre">
                                        </div>
                                    </div>
                                </div>

                                <!-- exercise -->
                                <div class="box-exercise">
                                    <!-- titre -->
                                    <h3 class="title-exercise">exercice N°4</h3>

                                    <!-- question -->
                                    <p class="paragraph">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta 
                                    </p>

                                    <!-- option de reponse -->
                                    <div class="response-option">
                                        <div class="long-text">
                                            <textarea class="textarea-option" placeholder="Répondre"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- exercise -->
                                <div class="box-exercise">
                                    <!-- titre -->
                                    <h3 class="title-exercise">exercice N°5</h3>

                                    <!-- question -->
                                    <p class="paragraph">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit quasi dicta adipisicing elit quasi dicta 
                                    </p>

                                    <div class="img-principal">
                                        <img src="{{asset('assets/images/user2.jpg')}}" alt="img">
                                    </div>

                                    <!-- option de reponse -->
                                    <div class="response-option">
                                        <div class="multiple-choice">
                                            <label class="radio">
                                                <input type="radio" value="" name="image">
                                                <p class="paragraph">Image 1</p>
                                                <span></span>
                                                <div class="img-option">
                                                    <img src="{{asset('assets/images/user_image1.png')}}" alt="img">
                                                </div>
                                            </label>

                                            <label class="radio">
                                                <input type="radio" value="" name="image">
                                                <p class="paragraph">Image 2</p>
                                                <span></span>
                                                <div class="img-option">
                                                    <img src="{{asset('assets/images/logo-cel.png')}}" alt="img">
                                                </div>
                                            </label>

                                            <label class="radio">
                                                <input type="radio" value="" name="image">
                                                <p class="paragraph">Image 3</p>
                                                <span></span>
                                                <div class="img-option">
                                                    <img src="{{asset('assets/images/user2.jpg')}}" alt="img">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- pagination -->
                        <div class="my-pagination mt-5">
                            <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                            <div class="number">
                                <span><a href="#" class="active">1</a></span>
                                <span><a href="#">2</a></span>
                            </div>
                            <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </form>

            <!-- button de valider -->
            <div class="box-btn">
                <a href="#"><button class="btn-standard-dash --red">Abandonner</button></a>
                <button class="btn-standard-dash --green btnValide">Terminer</button>
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

    {{-- modal condition --}}
    <div class="modal-condition" id="modal-condition">
        <div class="modal-condition--content">
            <h3 class="title-avertissement">Avertissement</h3>
            <ul class="list-avertissement">
                <li>
                    <span>&#10070;</span>
                    <p class="paragraph">Séparez vous de tout document en rapport avec votre sujet</p>
                </li>
                <li>
                    <span>&#10070;</span>
                    <p class="paragraph">Eloignez vous de tout environnement pouvant vous distraire</p>
                </li>
                <li>
                    <span>&#10070;</span>
                    <p class="paragraph">Eviter de sortir de votre espace de composition</p>
                </li>
            </ul>
            <div class="msg-tricherie">
                <p class="paragraph">La tricherie sous toutes les formes limite vos capacités réelles de réussite.</p>
                <p class="paragraph">Vous êtes meilleur(e) que la tricherie.</p>
            </div>
            <div class="rappel">
                <p class="paragraph">Cette épreuve se fermera dans: <span>30 minutes</span></p>
            </div>
            <h3 class="good-luck">Bonne chance ...</h3>
            <div class="btn-start">
                <button id="btn-start" class="btn-standard-2">Commencer l'épreuve</button>
            </div>
        </div>
    </div>

    {{-- modal convocation --}}
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

    {{-- modal sujet terminé --}}
    <div class="modal-sujet-termine" id="modalAlert">
        <div class="content">
            <p class="paragraph">Voulez vous soumettre votre sujet ?</p>
            <div class="box-btn">
                <button class="btn-standard-dash --red btnReturn">Retour</button>
                <button class="btn-standard-dash --green" id="btnFinish">Terminer &  Envoyer</button>
            </div>
        </div>
    </div>

    {{-- modal congratulation --}}
    <div class="modalResult --success" id="modalResult">
        <div class="js-content content"></div>
        <div class="modalResult--content">
            <div class="result-content">
                <div class="checkmark-circle">
                    <div class="background"></div>
                    <div class="checkmark draw"></div>
                </div>
                
                <h3 class="text-congra">Félicitation vous avez réussi le sujet</h3>

                <div class="box-text">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Matière</h3>
                                <p class="paragraph">Anglais</p>
                            </div>
                            <div class="box-text--content">
                                <h3>Vous avez obtenu</h3>
                                <p class="paragraph">17/20</p>
                            </div>
                        </div>
                        <hr class="underline">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Mention</h3>
                                <p class="paragraph">Excellent</p>
                            </div>
                            <div class="box-text--content">
                                <h3>Temps mis</h3>
                                <p class="paragraph">17 minutes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-btn">
                    <a href="composition.html">
                        <button class="btn-standard-dash --blue">Sortir</button>
                    </a>
                    <a href="correction-sujet.html">
                        <button class="btn-standard-dash --correction">Voir la correction</button>
                    </a>
                </div>
            </div> 
        </div> 
    </div>

    {{-- modal failed --}}
    <div class="modalResult --failed d-none">
        <div class="modalResult--content">
            <div class="result-content">
                <div class="failed">
                    {{-- <img src="{{asset('assets/images/failed.svg')}}" alt="failed"> --}}
                </div>
                
                <h3 class="text-congra">Désolé vous êtes en-dessous de la moyenne. <br/>Vous avez echoué</h3>

                <div class="box-text --failed">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Matière</h3>
                                <p class="paragraph">Anglais</p>
                            </div>
                            <div class="box-text--content">
                                <h3>Vous avez obtenu</h3>
                                <p class="paragraph">07/20</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="box-text--content">
                                <h3>Mention</h3>
                                <p class="paragraph">Insuffisant</p>
                            </div>
                            <div class="box-text--content">
                                <h3>Temps mis</h3>
                                <p class="paragraph">25 minutes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-btn">
                    <a href="composition.html">
                        <button class="btn-standard-dash --blue">Sortir</button>
                    </a>
                    <a href="correction-sujet.html">
                        <button class="btn-standard-dash --correction">Voir la correction</button>
                    </a>
                </div>
            </div> 
        </div> 
    </div>
@endsection

@section('script-personnel')
<!-- modal condition -->
<script>
    var btnStart = document.querySelector('#btn-start');
    var modalCondition = document.querySelector('.modal-condition');

    btnStart.addEventListener('click', function(){
        modalCondition.classList.add('active')
    })
</script>

<!-- Valider sujet -->
<script>
    var btnValid = document.querySelector('.btnValide');
    var btnReturn = document.querySelector('.btnReturn');
    var modalAlert = document.querySelector('#modalAlert');

    btnValid.addEventListener('click', function(e){
        e.stopPropagation();
        modalAlert.classList.add('active')
    })

    btnReturn.addEventListener('click', function(e){
        modalAlert.classList.remove('active')
    })

    window.addEventListener('click', function(){
        modalAlert.classList.remove('active')
    })
</script>

<!-- modal result -->
<script>
    var btnFinish = document.querySelector('#btnFinish');
    var modalResult = document.querySelector('#modalResult');

    btnFinish.addEventListener('click', function(){
       
        modalResult.classList.toggle('active')
    })
</script>

<!-- compte a rebourt -->
<script>
    var min=30,sec=0,dse=0;
    var tmp=(min*60+sec)*10+dse;
    
    var chrono=setInterval(function (){
        min=Math.floor(tmp/600);
        sec=Math.floor((tmp-min*600)/10);
        dse=tmp-((min*60)+sec)*10;
        tmp--;
        $('.timer').text(min+':'+sec+':'+dse);
    },200);
</script>

<!-- confretiis -->
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
@endsection