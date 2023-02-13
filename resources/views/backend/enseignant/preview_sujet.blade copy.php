@extends('backend/enseignant/layout/default', ['title' => "CEL || Prévisualisation du sujet"])

@section('page-content')
<div class="page-wrapper__page-content">
    <div class="main-content">
        <div class="box-gestion-general" id="top">
            <div class="dash-heading mb-5">
                <ul class="my-breadcrumb">
                    <li><a href="index.html">Tableau de bord</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><a href="gestion-sujet.html">Gestion des sujets</a></li>
                    <li class="spacing">&#8722;</li>
                    <li><span>Prévisaulisation</span></li>
                </ul>
                <h3 class="title">Prévisualisation du sujet</h3>
            </div>
            <div class="box-btn-view">
                <a href="create-sujet.html"><button class="btn-standard-2">Retour sur le sujet</button></a>
                <a href="#"><button class="btn-standard-3">Valider & Envoyer</button></a>
            </div>
            <hr class="underline">
            <form action="#">
                <div class="box-preview">
                    <div class="box-preview--content">
                        <div class="box-categ-sujet">
                            <div class="content"><p class="paragraph">Devoir</p></div>
                            <div class="content"><p class="paragraph">Allemand</p></div>
                        </div>

                        <!-- model sujet -->
                        <div class="model-view-sujet">
                            <!-- img fond -->
                            <div class="image-fond">
                                <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo cel">
                            </div>

                            <!-- numerotation sujet -->
                            <div class="numbering">
                                <span>1/2</span>
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

                                    <!-- reponse - corrigé - point - explication -->
                                    <div class="box-rcpe">
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Réponse attendue:</h3>
                                            <p class="paragraph">Option 2</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Point:</h3>
                                            <p class="paragraph">2 points</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Explication:</h3>
                                            <p class="paragraph">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corrupti pariatur obcaecati. 
                                                Ad consectetur repudiandae laboriosam.
                                            </p>
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

                                    <!-- reponse - corrigé - point - explication -->
                                    <div class="box-rcpe">
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Réponse attendue:</h3>
                                            <p class="paragraph">Option 1, Option3</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Point:</h3>
                                            <p class="paragraph">4 points</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Explication:</h3>
                                            <p class="paragraph">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corrupti pariatur obcaecati. 
                                                Ad consectetur repudiandae laboriosam, ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corru.
                                            </p>
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

                                    <!-- reponse - corrigé - point - explication -->
                                    <div class="box-rcpe">
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Réponse attendue:</h3>
                                            <p class="paragraph">Lorem ipsum dolor sit, amet consectetur adipisicing elit</p>
                                            <p class="paragraph">Hlit quasi dicta</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Point:</h3>
                                            <p class="paragraph">5 points</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Explication:</h3>
                                            <p class="paragraph">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corrupti pariatur obcaecati. 
                                                Ad consectetur repudiandae laboriosam, ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corru.
                                            </p>
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

                                    <!-- reponse - corrigé - point - explication -->
                                    <div class="box-rcpe">
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Réponse attendue:</h3>
                                            <p class="paragraph">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus
                                            </p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Point:</h3>
                                            <p class="paragraph">5 points</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Explication:</h3>
                                            <p class="paragraph">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corrupti pariatur obcaecati. 
                                                Ad consectetur repudiandae laboriosam, ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corru.
                                            </p>
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

                                    <!-- reponse - corrigé - point - explication -->
                                    <div class="box-rcpe">
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Réponse attendue:</h3>
                                            <p class="paragraph">Image 2</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Point:</h3>
                                            <p class="paragraph">3 points</p>
                                        </div>
                                        <div class="box-rcpe--content">
                                            <h3 class="title">Explication:</h3>
                                            <p class="paragraph">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corrupti pariatur obcaecati. 
                                                Ad consectetur repudiandae laboriosam, ipsum dolor sit amet consectetur adipisicing elit. 
                                                Molestias labore placeat ipsa odit illo nisi minus itaque veritatis 
                                                soluta rerum modi fuga, doloribus corru.
                                            </p>
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
        </div>
    </div>
</div>
@endsection

@section('other-content')
<!-- button top -->
<a href="#top">
    <div class="button-return">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </div>
</a>
@endsection