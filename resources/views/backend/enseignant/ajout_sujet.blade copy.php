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
                        <li><a href="index.html">Tableau de bord</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><a href="gestion-sujet.html">Gestion des sujets</a></li>
                        <li class="spacing">&#8722;</li>
                        <li><span>Sujet écrit</span></li>
                    </ul>
                    <h3 class="title">Création de sujet écrit</h3>
                </div>
                <hr class="underline">
                <div class="box-create-sujet">
                    <h3 class="title-form">Formulaire de création de sujet</h3>
                    <div class="box-create">
                        <div class="box-form-create">
                            <!-- formulaire de creation de sujet -->
                            <form action="" class="form-create-sujet">
                                <fieldset class="form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="type">Type du sujet</label>
                                            <input type="text" name="type" id="type" class="form--group__input" placeholder="Type du sujet">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="matiere">Matière</label>
                                            <input type="text" name="matiere" id="matiere" class="form--group__input" placeholder="Matière">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="hour">Durée</label>
                                            <input type="time" name="hour" id="hour" step="2" class="form--group__input" placeholder="Durée">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="name">Nom de l'enseignant ou professeur</label>
                                            <input type="text" name="name" id="name" class="form--group__input" placeholder="Nom de l'enseignant ou professeur">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="classe">Classe</label>
                                            <input type="text" name="classe" id="classe" class="form--group__input" placeholder="Classe">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form--group">
                                            <label for="name">Année scolaire</label>
                                            <input type="text" name="name" id="name" class="form--group__input" placeholder="Année scolaire">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form--group">
                                            <label for="name">Texte nombre de page</label>
                                            <input type="text" name="name" id="name" class="form--group__input" placeholder="Ex: Ce sujet comporte 2 pages, numeroté 1/2 et 2/2">
                                        </div>
                                    </div>
                                </fieldset>
                                <hr class="underline">

                                <!-- *********** -->
                                <div class="box-section">
                                    <fieldset class="form-row">
                                        <div class="col-12">
                                            <div class="form-group-create">
                                                <label for="titre">Titre principal</label>
                                                <input type="text" name="titre" id="titre" class="form-group-create__input">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group-create">
                                                <div class="box-label">
                                                    <label for="text">Text du sujet</label>
                                                    <label class="--bg --cursor"data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">Cliquer pour ajouter le text</label>
                                                </div>
                                                <div class="collapse" id="collapse1">
                                                    <div class="editor-text">
                                                        <div id="toolbar"></div>
                                                        <div id="editor"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="box-section">
                                    <!-- Titre - sous titre - exercice -->
                                    <fieldset class="form-row">
                                        <div class="col-12">
                                            <div class="form-group-create">
                                                <div class="form-group-create">
                                                    <label for="titre">Titre de l'exercice</label>
                                                    <input type="text" name="titre" id="titre" class="form-group-create__input" placeholder="Ex: Vocabulaire">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group-create">
                                                <div class="form-group-create">
                                                    <label for="titre">Sous titre</label>
                                                    <input type="text" name="titre" id="titre" class="form-group-create__input" placeholder="Sous titre">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group-create">
                                                <div class="form-group-create">
                                                    <label for="titre">N° de l'exercice</label>
                                                    <input type="text" name="titre" id="titre" class="form-group-create__input" placeholder="Ex: Exercice 1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group-create">
                                                <div class="form-group-create">
                                                    <label for="titre">Question</label>
                                                    <input type="text" name="titre" id="titre" class="form-group-create__input" placeholder="Question de l'exercice">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- proposition de reponse -->
                                    <fieldset class="form-row">
                                        <!-- option proposition de reponse -->
                                        <div class="col-12">
                                            <div class="box-proposal">
                                                <div class="response-proposal">
                                                    <div class="option">
                                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        <span>Choix multiples</span>
                                                    </div>

                                                    <!-- option type de reponse -->
                                                    <div class="response-proposal--content">
                                                        <div class="proposal">
                                                            <i class="fa fa-paragraph" aria-hidden="true"></i>
                                                            <span>Court text</span>
                                                        </div>
                                                        <div class="proposal">
                                                            <i class="fa fa-align-left" aria-hidden="true"></i>
                                                            <span>Long text</span>
                                                        </div>
                                                        <div class="proposal">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                            <span>Choix multiples</span>
                                                        </div>
                                                        <div class="proposal">
                                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                                            <span>Cases à cocher</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image-proposal">
                                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <!-- choix multiples -->
                                            <div class="form-response">
                                                <div class="choice">
                                                    <div class="circle"></div>
                                                    <input type="text" value="Option 1" class="form-group-create__input">
                                                    <div class="box-action">
                                                        <div class="icon --blue"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                        <div class="icon --red"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                    </div>
                                                </div>

                                                <div class="choice">
                                                    <div class="circle"></div>
                                                    <input type="text" value="Option 2" class="form-group-create__input">
                                                    <div class="box-action">
                                                        <div class="icon --blue"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                        <div class="icon --red"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                    </div>
                                                </div>

                                                <div class="add-option">
                                                    <span>Ajouter une option</span>
                                                </div>
                                            </div>

                                            <!-- choix multiples + image -->
                                            <div class="form-response">
                                                <div class="image-principal">
                                                    <div class="image">
                                                        <div class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                                        <img src="{{asset('assets/images//user_image1.png')}}" alt="img">
                                                    </div>
                                                </div>

                                                <div class="choice">
                                                    <div class="circle"></div>
                                                    <input type="text" value="Option 1" class="form-group-create__input">
                                                    <div class="box-action">
                                                        <div class="icon --blue"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                        <div class="icon --red"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="choice">
                                                    <div class="circle"></div>
                                                    <input type="text" value="Option 2" class="form-group-create__input">
                                                    <div class="box-action">
                                                        <div class="icon --blue"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                        <div class="icon --red"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                    </div>
                                                </div>

                                                <div class="image-option">
                                                    <div class="image">
                                                        <div class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                                        <img src="{{asset('assets/images//user_image1.png')}}" alt="img">
                                                    </div>
                                                </div>

                                                <div class="add-option">
                                                    <span>Ajouter une option</span>
                                                </div>
                                            </div>

                                            <!-- cases à cocher -->
                                            <div class="form-response">
                                                <div class="choice">
                                                    <div class="square"></div>
                                                    <input type="text" value="Option 1" class="form-group-create__input">
                                                    <div class="box-action">
                                                        <div class="icon --blue"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                        <div class="icon --red"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                    </div>
                                                </div>

                                                <div class="choice">
                                                    <div class="square"></div>
                                                    <input type="text" value="Option 2" class="form-group-create__input">
                                                    <div class="box-action">
                                                        <div class="icon --blue"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                        <div class="icon --red"><i class="fa fa-close" aria-hidden="true"></i></div>
                                                    </div>
                                                </div>

                                                <div class="add-option">
                                                    <span>Ajouter une option</span>
                                                </div>
                                            </div>
                                            
                                            <!-- reponse courte -->
                                            <div class="form-response">
                                                <input type="text" class="form-group-create__input" placeholder="Réponse courte" disabled>
                                            </div>

                                            <!-- reponse longue -->
                                            <div class="form-response">
                                                <input type="text" class="form-group-create__input" placeholder="Réponse longue" disabled>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- reponse - correction - point - explication -->
                                    <fieldset class="form-row fieldset-rcpe">
                                        <div class="col-12 col-md-8 col-lg-8">
                                            <div class="form--group">
                                                <label for="reponse">Réponse attendue</label>
                                                <input type="text" name="reponse" id="reponse" class="form--group__input" placeholder="Réponse attendue">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <div class="form--group">
                                                <label for="point">Point</label>
                                                <input type="text" name="point" id="point" class="form--group__input" placeholder="Point">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form--group">
                                                <label for="explication">Explication</label>
                                                <textarea name="explication" id="explication" class="form--group__textarea" placeholder="Explication"></textarea>
                                            </div>
                                        </div>
                                        
                                    </fieldset>

                                    <!-- box button delete/duplicate -->
                                    <div class="box-btn-action">
                                        <div class="icon --blue"><i class="fa fa-files-o" aria-hidden="true"></i></div>
                                        <div class="icon --red"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                    </div>
                                </div>

                                <!-- buttion validation sujet -->
                                <div class="col-12">
                                    <div class="box-btn-valid">
                                        <a href="preview-sujet.html" target="_blank"><button type="button" class="btn-standard-2">Prévisualiser</button></a>
                                        <button type="submit" class="btn-standard-2">Enregister</button>
                                        <button type="submit" class="btn-standard-3">Enregister & Envoyer</button>
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
<!-- button top -->
<a href="#top">
    <div class="button-return">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </div>
</a>
@endsection

@section('script-personnel')
    <script src="{{asset('assets/js/quill.core.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <script src="{{asset('assets/js/quill.min.js')}}"></script>
    <script src="{{asset('assets/js/vue.js')}}"></script>

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

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },

            theme: 'snow'
        });

        var app = new Vue({
            el: '#app',
            data: {
                forms: [{ id: 1 }]
            },
            methods: {
                add() {
                    this.forms.push({ id: this.forms.slice(-1)[0].id + 1 })
                },
                deleteInput(id) {
                    this.forms = this.forms.filter(t => t.id != id)
                }
            },
            
        });
    </script>
@endsection