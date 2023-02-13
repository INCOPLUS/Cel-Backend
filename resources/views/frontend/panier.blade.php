@extends('frontend/layout/default', ['title' => "CEL || Panier"])

@section('css-personnel')
<link rel="stylesheet" href="{{asset('assets/css/datatable/datatable.bootstrap.css')}}">
@endsection

@section('header')
<header class="header --header-page">
    <div class="header-caption">
        <ul class="my-breadcrumb">
            <li><a href="{{route('accueil')}}">Accueil</a></li>
            <li class="spacing">&#8722;</li>
            <li><a href="{{route('enseignement')}}">Enseignement</a></li>
            <li class="spacing">&#8722;</li>
            <li><a href="{{route('composition')}}">Composition</a></li>
            <li class="spacing">&#8722;</li>
            <li><a href="{{route('sujets')}}">Sujets</a></li>
            <li class="spacing">&#8722;</li>
            <li><span>Panier</span></li>
        </ul>
        <h1 class="title">Panier</h1>
    </div>
    <div class="image"><img src="{{asset('assets/images/hero_area_image.png')}}" alt="img"></div>
</header>
@endsection

@section('main')
main>
<section class="panier">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8">
                <div class="box-panier">
                    <div class="box-panier--content">
                        <div class="top-element">
                            <div class="circle --blue">1</div>
                            <div class="circle --red">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="sujet">
                            <h4>Titre</h4>
                            <p class="paragraph-site">Lorem ipsum dolor sit</p>
                        </div>
                        <div class="sujet">
                            <h4>Type</h4>
                            <p class="paragraph-site">Interrogation</p>
                        </div>
                        <div class="sujet">
                            <h4>Thème</h4>
                            <p class="paragraph-site">Lorem ipsum dolor sit</p>
                        </div>
                        <div class="sujet">
                            <h4>Leçon</h4>
                            <p class="paragraph-site">Leçon 1</p>
                        </div>
                        <div class="sujet">
                            <h4>Matière</h4>
                            <p class="paragraph-site">Anglais</p>
                        </div>
                        <div class="sujet">
                            <h4>Classe</h4>
                            <p class="paragraph-site">3eme</p>
                        </div>
                        <div class="sujet">
                            <h4>Durée</h4>
                            <p class="paragraph-site">45 minutes</p>
                        </div>
                        <div class="sujet">
                            <h4>Pays</h4>
                            <p class="paragraph-site">Côte d'ivoire</p>
                        </div>
                        <div class="sujet --red">
                            <h4>Prix</h4>
                            <p class="paragraph-site">1500 fcfa</p>
                        </div>
                    </div>
                    <div class="box-panier--content">
                        <div class="top-element">
                            <div class="circle --blue">2</div>
                            <div class="circle --red">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="sujet">
                            <h4>Titre</h4>
                            <p class="paragraph-site">Lorem ipsum dolor sit</p>
                        </div>
                        <div class="sujet">
                            <h4>Type</h4>
                            <p class="paragraph-site">Interrogation</p>
                        </div>
                        <div class="sujet">
                            <h4>Thème</h4>
                            <p class="paragraph-site">Lorem ipsum dolor sit</p>
                        </div>
                        <div class="sujet">
                            <h4>Leçon</h4>
                            <p class="paragraph-site">Leçon 1</p>
                        </div>
                        <div class="sujet">
                            <h4>Matière</h4>
                            <p class="paragraph-site">Anglais</p>
                        </div>
                        <div class="sujet">
                            <h4>Classe</h4>
                            <p class="paragraph-site">3eme</p>
                        </div>
                        <div class="sujet">
                            <h4>Durée</h4>
                            <p class="paragraph-site">45 minutes</p>
                        </div>
                        <div class="sujet">
                            <h4>Pays</h4>
                            <p class="paragraph-site">Côte d'ivoire</p>
                        </div>
                        <div class="sujet --red">
                            <h4>Prix</h4>
                            <p class="paragraph-site">1600 fcfa</p>
                        </div>
                    </div>
                    <div class="box-panier--content">
                        <div class="top-element">
                            <div class="circle --blue">3</div>
                            <div class="circle --red">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="sujet">
                            <h4>Titre</h4>
                            <p class="paragraph-site">Lorem ipsum dolor sit</p>
                        </div>
                        <div class="sujet">
                            <h4>Type</h4>
                            <p class="paragraph-site">Interrogation</p>
                        </div>
                        <div class="sujet">
                            <h4>Thème</h4>
                            <p class="paragraph-site">Lorem ipsum dolor sit</p>
                        </div>
                        <div class="sujet">
                            <h4>Leçon</h4>
                            <p class="paragraph-site">Leçon 1</p>
                        </div>
                        <div class="sujet">
                            <h4>Matière</h4>
                            <p class="paragraph-site">Anglais</p>
                        </div>
                        <div class="sujet">
                            <h4>Classe</h4>
                            <p class="paragraph-site">3eme</p>
                        </div>
                        <div class="sujet">
                            <h4>Durée</h4>
                            <p class="paragraph-site">45 minutes</p>
                        </div>
                        <div class="sujet">
                            <h4>Pays</h4>
                            <p class="paragraph-site">Côte d'ivoire</p>
                        </div>
                        <div class="sujet --red">
                            <h4>Prix</h4>
                            <p class="paragraph-site">600 fcfa</p>
                        </div>
                    </div>

                    <!-- pagination -->
                    <div class="my-pagination-site mt-5">
                        <a href="#" class="btn-prev-next"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                        <div class="number">
                            <span><a href="#" class="active">1</a></span>
                            <span><a href="#">2</a></span>
                            <span>...</span>
                            <span><a href="#">6</a></span>
                        </div>
                        <a href="#" class="btn-prev-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <div class="recap-panier">
                    <h3 class="title">Panier</h3>
                    <div class="recap-panier--content">
                        <h4>Prix unitaire (<span>1</span>):</h4>
                        <p class="paragraph-site">1500 fcfa</p>
                    </div>
                    <div class="recap-panier--content">
                        <h4>Prix unitaire (<span>2</span>):</h4>
                        <p class="paragraph-site">1600 fcfa</p>
                    </div>
                    <div class="recap-panier--content">
                        <h4>Prix unitaire (<span>3</span>):</h4>
                        <p class="paragraph-site">600 fcfa</p>
                    </div>
                    <div class="recap-panier--content --underline">
                        <h4>Prix Total:</h4>
                        <p class="paragraph-site">3700 fcfa</p>
                    </div>
                    <div class="box-btn">
                        <a href="#"><button class="btn-standard --green">Payer</button></a>
                        <a href="#"><button class="btn-standard --blue">Payer pour un tiers</button></a>
                        <a href="#"><button class="btn-standard --blue-light">Demander à un tiers de payer</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection

@section('script-personnel')
<script src="{{asset('assets/js/datatable/datatable.advanced.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable.basic.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable.init.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    } );
</script>
@endsection