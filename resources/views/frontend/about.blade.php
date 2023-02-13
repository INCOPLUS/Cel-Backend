@extends('frontend/layout/default', ['title' => "CEL || A propos de nous"])

@section('header')
    <header class="header --header-page">
        <div class="header-caption">
            <ul class="my-breadcrumb">
                <li><a href="{{route('accueil')}}">Accueil</a></li>
                <li class="spacing">&#8722;</li>
                <li><span>A propos</span></li>
            </ul>
            <h1 class="title">A propos de nous</h1>
        </div>
        <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
    </header>
@endsection

@section('main')
<main>
    <section class="about-page">
        <div class="container">
            <div class="about-page-content">
                <div class="heading mb-5 --center">
                    <span class="subTitle">What is CEL ?</span>
                    <h2 class="title">Qu'est ce que CEL ?</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="image">
                            <img src="{{asset('assets/images/hero_area_image.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="text">
                            <p class="paragraph-site mb-4">
                                CEL (compo en ligne) est comme son nom l’indique une plateforme numérique 
                                qui propose des compositions,  évaluations et examens en ligne dans un système 
                                totalement novateur. C’est la baguette magique qui va permettre de créer des tests, 
                                évaluations et examens aussi fiable que les compositions et examens papier - et surtout 
                                de les corriger, noter et expliquer automatiquement. 
                            </p>
                            <p class="paragraph-site">
                                CEL, c’est la <span class="--bold">construction d’un environnement de travail</span> qui permette à chaque élève de progresser 
                                à son rythme, chaque parent d’être <span class="--bold">au cœur de l’apprentissage de son enfant</span>, chaque enseignant d’être 
                                promoteur de l’excellence en favorisant un environnement d’apprentissage prompt à la <span class="--bold">promotion de l’excellence</span>. 
                                En un mot CEL propose une école réconciliée avec elle-même et tous ses acteurs dans un 
                                environnement totalement résilient faisant appel au numérique.
                                Pour cela, CEL commence par le commencement :<span class="--bold">redonner la motivation qui manque à beaucoup d’élèves</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-page-content">
                <div class="heading mb-5 --center">
                    <span class="subTitle">Why CEL ?</span>
                    <h2 class="title">Pourquoi CEL ?</h2>
                </div>
                {{-- Pour eleve / etudiant --}}
                <div class="categorie">
                    <h3 class="title">&#10070; Pour Elèves / Etudiants</h3>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="text">
                                <p class="paragraph-site">CEL permet aux apprenants de:</p>
                                <ul class="list-ul">
                                    <li>se mettre à l’ère du numérique en étant à l’aise avec le digital</li>
                                    <li>se challenger</li>
                                    <li>s’auto évaluer et accroitre ses performances en entrant en compétition avec les meilleurs élèves d’ailleurs</li>
                                    <li>accroitre le rendement scolaire</li>
                                    <li>de faire un max d’évaluation dans chaque thème ou leçon étudiée en classe</li>
                                    <li>de passer plusieurs tests / examens blancs) avant l’épreuve véritable</li>
                                    <li>se préparer efficacement pour de meilleurs résultats </li>
                                    <li>développer son niveau de langue à l’oral devant différents profil d’interrogateur</li>
                                    <li>se mettre en condition de devoir avec des durées bien défini (lorsque le devoir est lancé, il s’arrête automatiquement 
                                        au temps défini par le professeur et l’élève est noté sur la base des informations qui sont parvenues dans ce temps. 
                                        Ils apprennent ainsi à gérer le temps de composition)
                                    </li>
                                    <li>apprendre à gérer le stress de la composition /évaluation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="image">
                                <img src="{{asset('assets/images/hero_area_image.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pour enseignant / professeur --}}
                <div class="categorie">
                    <h3 class="title">&#10070; Pour Enseignants / Professeurs</h3>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="text">
                                <p class="paragraph-site">CEL permet aux enseignant de :</p>
                                <ul class="list-ul">
                                    <li>permettre à leurs apprenants d’avoir accès à une banque de sujets illimitée en ligne</li>
                                    <li>gagner du temps dans la correction des sujets ou exercices des élèves. 
                                        (en tant qu’enseignant des élèves les approchent pour leur demander de corriger 
                                        des devoirs et exos qu’ils ont fait eux même. Le professeur a désormais la possibilité 
                                        de corriger plus de 10000 copies en 1 seconde
                                    </li>
                                    <li>d’avoir de meilleurs résultats avec ses apprenants</li>
                                    <li>avoir lui-même une banque de sujets qu’il peut utiliser en présentiel avec ses apprenants</li>
                                    <li>donner la chance aux apprenants de s’exercer avec un maximum de sujets de différents horizons</li>
                                    <li>devenir contributeur dans le développement intellectuel d’élèves quel que soit le pays</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="image">
                                <img src="{{asset('assets/images/hero_area_image.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pour parent d'eleve --}}
                <div class="categorie">
                    <h3 class="title">&#10070; Pour parents d'élève</h3>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="text">
                                <p class="paragraph-site">CEL permet aux parents d’élèves de :</p>
                                <ul class="list-ul">
                                    <li>mieux suivre l’évolution du travail des enfants</li>
                                    <li>de nombreux parents ne maitrisant pas toutes les matières, 
                                        peuvent désormais donner des exercices, suivre la correction et 
                                        la note de leurs enfants dans ces matières
                                    </li>
                                    <li>évaluer leurs enfants quel que soit le lieu où ils se trouvent en leur 
                                        envoyant les exos à faire directement sur leurs appareils
                                    </li>
                                    <li>d’avoir accès à une base illimité de sujets dans toutes les disciplines</li>
                                    <li>connaitre le niveau réel de leurs enfants</li>
                                    <li>devenir le superprof interdisciplinaire de ses enfants</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="image">
                                <img src="{{asset('assets/images/hero_area_image.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pour gouvernement --}}
                <div class="categorie">
                    <h3 class="title">&#10070; Pour gouvernement</h3>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="text">
                                <p class="paragraph-site">CEL va permettre aux ministères et gouvernements :</p>
                                <ul class="list-ul">
                                    <li>d’avoir de meilleurs résultats scolaires</li>
                                    <li>d’avoir de meilleurs élèves plus consciencieux</li>
                                    <li>d’avoir la garantie d’une relève bien assurée faite de tête pleine</li>
                                    <li>favoriser l’intégration du digital dans l’enseignement</li>
                                    <li>développer un environnement résilient face à la crise de la COVID 19</li>
                                    <li>relever le niveau du système scolaire</li>
                                    <li>d’avoir une plateforme de sensibilisation contre la tricherie en milieu scolaire</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="image">
                                <img src="{{asset('assets/images/hero_area_image.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-page-content">
                <div class="heading mb-5 --center">
                    <span class="subTitle">How it works</span>
                    <h2 class="title">Comment ça marche</h2>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="image">
                            <img src="{{asset('assets/images/hero_area_image.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="text">
                            <p class="paragraph-site">
                                <span class="--bold">CEL</span> est compatible <span class="--bold">ordinateur, tablette, smartphone!</span>
                                La plateforme CEL est accessible en ligne <span class="--bold">n'importe où, sans installation nécessaire</span>. 
                                Vous pouvez donc en disposer <span class="--bold">sans délai d'intégration</span> pour 
                                accéder à la plateforme d'évaluation, seul un ordinateur ou une tablette 
                                par apprenant est nécessaire.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Newsletter --}}
    @include('frontend/partials/newsletter')
</main>
@endsection