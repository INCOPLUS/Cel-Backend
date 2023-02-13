@extends('frontend/layout/default', ['title' => "CEL || Composition"])

@section('header')
<header class="header --header-page">
    <div class="header-caption">
        <ul class="my-breadcrumb">
            <li><a href="{{route('accueil')}}">Accueil</a></li>
            <li class="spacing">&#8722;</li>
            <li><a href="{{route('enseignement')}}">Enseignement</a></li>
            <li class="spacing">&#8722;</li>
            <li><span>Composition</span></li>
        </ul>
        <h1 class="title">Composition</h1>
    </div>
    <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
</header>
@endsection

@section('main')
<main>
    <section class="composition">
        <div class="container">
            <form action="" class="form-infor">
                <fieldset class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="choose">
                            <h4 class="title-choose">Catégories</h4>
                            <div class="button-radio-form">
                                <label class="radio">
                                    <input type="radio" value="ecrite" name="composition">
                                    <p class="paragraph-site">Composition Ecrite</p>
                                    <span></span>
                                </label>
                    
                                <label class="radio">
                                    <input type="radio" value="orale" name="composition">
                                    <p class="paragraph-site">Composition Orale</p>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="choose">
                            <h4 class="title-choose">Type de composition</h4>
                            <div class="button-radio-form">
                                <label class="radio">
                                    <input type="radio" value="interro" name="type">
                                    <p class="paragraph-site">Interrogation</p>
                                    <span></span>
                                </label>
                    
                                <label class="radio">
                                    <input type="radio" value="devoir" name="type">
                                    <p class="paragraph-site">Devoir</p>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="box-form-infor">
                    <h3 class="title-infor">Composition écrite - <span>Interrogation</span></h3>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="enseignement">Niveaux</label>
                                <select class="custom-select form--group__select" id="enseignement">
                                    <option selected>Choisir ...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="enseignement">Matières</label>
                                <select class="custom-select form--group__select" id="enseignement">
                                    <option selected>Choisir ...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="enseignement">Classes</label>
                                <select class="custom-select form--group__select" id="enseignement">
                                    <option selected>Choisir ...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="enseignement">Pays</label>
                                <select class="custom-select form--group__select" id="enseignement">
                                    <option selected>Choisir ...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="enseignement">Thèmes</label>
                                <select class="custom-select form--group__select" id="enseignement">
                                    <option selected>Choisir ...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="enseignement">Leçons</label>
                                <select class="custom-select form--group__select" id="enseignement">
                                    <option selected>Choisir ...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form--group">
                                <label for="enseignement">Type de l'interrogation</label>
                                <select class="custom-select form--group__select" id="enseignement">
                                    <option selected>Choisir ...</option>
                                </select>
                            </div>
                        </div>

                        <!-- button -->
                        <div class="col-12">
                            <button type="submit" class="btn-standard --blue mb-5">Valider votre choix</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main> 
@endsection