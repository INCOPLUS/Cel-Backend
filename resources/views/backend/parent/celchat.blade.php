@extends('backend/parent/layout/default', ['title' => "CEL || Vide"])

@section('page-content')
    <div class="page-wrapper__page-content">
        <div class="box-conversation">

            <!-- list user & list group -->
            <div class="box-list-user" id="box-user-list">
                <div class="top-content">
                    <div class="head">
                        <div class="head-create">
                            <h3 class="title">CELCHAT</h3>
                            <div class="btn-create" data-toggle="modal" data-target="#createGroup">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <p class="desc">Créer un groupe</p>
                            </div>
                        </div>
                        <div class="icon-close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                    </div>
                    <form action="" class="form-search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input type="text" placeholder="Rechercher un message ou un utilisateur">
                    </form>
                </div>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            Chats
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Groupes
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <!-- list complet chat -->
                        <div class="box-user">
                            <div class="box-banner-user">
                                <ul class="chat-list">
                                    <li class="chat-list--item active">
                                        <div class="content">
                                            <div class="photo">
                                                <img src="../images/user2.jpg" alt="photo">
                                            </div>
                                            <div class="text">
                                                <h4>Admin</h4>
                                                <p class="paragraph">je vais bien, et toi ? je vais bien, et toi ? je vais bien, et toi ?</p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                    </li>
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="photo">
                                                <img src="../images/user_image1.png" alt="photo">
                                            </div>
                                            <div class="text">
                                                <h4>Sandrine</h4>
                                                <p class="paragraph">Salut</p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                        <div class="unread-message">
                                            <span>2</span>
                                        </div>
                                    </li>
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="photo">
                                                <img src="../images/user2.jpg" alt="photo">
                                            </div>
                                            <div class="text">
                                                <h4>jean jack</h4>
                                                <p class="paragraph">Oui !!!</p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                    </li>
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="no-photo">
                                                <span>m</span>
                                            </div>
                                            <div class="text">
                                                <h4>Mickael</h4>
                                                <p class="paragraph">Ok c'est super</p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                        <div class="unread-message">
                                            <span>1</span>
                                        </div>
                                    </li>
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="photo">
                                                <img src="../images/user_image1.png" alt="photo">
                                            </div>
                                            <div class="text">
                                                <h4>Professeur</h4>
                                                <p class="paragraph">Oui ça va Madame</p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                    </li>
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="no-photo">
                                                <span>d</span>
                                            </div>
                                            <div class="text">
                                                <h4>Designer</h4>
                                                <p class="paragraph">
                                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                    images
                                                </p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                        <div class="unread-message">
                                            <span>5</span>
                                        </div>
                                    </li>
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="no-photo">
                                                <span>c</span>
                                            </div>
                                            <div class="text">
                                                <h4>christelle</h4>
                                                <p class="paragraph">C'est demain à 10h</p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <!-- list complet chat -->
                        <div class="box-user">
                            <!-- <div class="banner-top">
                                <div class="head">
                                    <h3 class="title">Groupes</h3>
                                    <div class="icon-close">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <form action="" class="form-search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input type="text" placeholder="Rechercher un message ou un utilisateur">
                                </form>
                            </div> -->
                            <div class="box-banner-user">
                                <ul class="chat-list">
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="no-photo">
                                                <span>g</span>
                                            </div>
                                            <div class="text">
                                                <h4>Groupe des élèves en 3eme élèves en 3eme</h4>
                                                <p class="paragraph">Super groupe</p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                        <div class="unread-message">
                                            <span>1</span>
                                        </div>
                                    </li>
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="no-photo">
                                                <span>p</span>
                                            </div>
                                            <div class="text">
                                                <h4>Profs de français</h4>
                                                <p class="paragraph">
                                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                    images
                                                </p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                        <div class="unread-message">
                                            <span>5</span>
                                        </div>
                                    </li>
                                    <li class="chat-list--item">
                                        <div class="content">
                                            <div class="no-photo">
                                                <span>t</span>
                                            </div>
                                            <div class="text">
                                                <h4>tuto entre nous</h4>
                                                <p class="paragraph">C'est demain à 10h</p>
                                            </div>
                                        </div>
                                        <p class="hour">12:02</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- espace chat -->
            <div class="box-chat">
                <!-- banner top -->
                <div class="banner-top">
                    <div class="icon-comment">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                        <div class="photo">
                            <img src="../images/user2.jpg" alt="photo">
                        </div>
                        <h3 class="name-user">Admin</h3>
                    </div>
                </div>

                <!-- conversation -->
                <div class="chat-conversation">
                    <ul class="list-msg">
                        <li>
                            <div class="conversation-list">
                                <div class="avatar">
                                    <img src="../images/user2.jpg" alt="photo">
                                </div>
                                <div class="user-chat-content">
                                    <div class="text-chat">
                                        <div class="bulle">
                                            <p class="paragraph">Salut comment tu vas ?</p>
                                            
                                            <p class="time-chat">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                10:04
                                            </p>
                                        </div>
                                        <div class="setting-chat">
                                            <i class="fa fa-ellipsis-v btn-delete" aria-hidden="true"></i>
                                            <div class="delete">
                                                <p class="paragraph">Supprimer</p>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="name-chat">Admin</h4>
                                </div>
                            </div> 
                        </li>
                        <li class="right">
                        <div class="conversation-list">
                            <div class="avatar">
                                <img src="../images/user_image1.png" alt="photo">
                            </div>
                            <div class="user-chat-content">
                                <div class="text-chat">
                                    <div class="setting-chat">
                                        <i class="fa fa-ellipsis-v btn-delete" aria-hidden="true"></i>
                                        <div class="delete">
                                            <p class="paragraph">Supprimer</p>
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="bulle">
                                        <p class="paragraph">Salut ...</p>

                                        <p class="time-chat">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                10:05
                                        </p>
                                    </div>
                                </div>
                                <h4 class="name-chat">Jean Nevry</h4>
                            </div>
                        </div> 
                        </li>
                        <li>
                            <div class="conversation-list">
                                <div class="avatar">
                                    <img src="../images/user2.jpg" alt="photo">
                                </div>
                                <div class="user-chat-content">
                                    <div class="text-chat">
                                        <div class="bulle">
                                            <p class="paragraph">ça va aussi chez moi</p>
                                            
                                            <p class="time-chat">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                10:07
                                            </p>
                                        </div>
                                        <div class="setting-chat">
                                            <i class="fa fa-ellipsis-v btn-delete" aria-hidden="true"></i>
                                            <div class="delete">
                                                <p class="paragraph">Supprimer</p>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="name-chat">Admin</h4>
                                </div>
                            </div> 
                        </li>
                        <li class="right">
                        <div class="conversation-list">
                            <div class="avatar">
                                <img src="../images/user_image1.png" alt="photo">
                            </div>
                            <div class="user-chat-content">
                                <div class="text-chat">
                                        <div class="setting-chat">
                                            <i class="fa fa-ellipsis-v btn-delete" aria-hidden="true"></i>
                                            <div class="delete">
                                                <p class="paragraph">Supprimer</p>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="bulle">
                                            <p class="paragraph">je vais bien, et toi ?</p>

                                            <p class="time-chat">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    10:08
                                            </p>
                                        </div>
                                </div>
                                <h4 class="name-chat">Jean Nevry</h4>
                            </div>
                        </div> 
                        </li>
                    </ul>
                </div>

                <!-- banner bottom -->
                <div class="banner-bottom">
                    <form action="" class="form-row form-submit-msg">
                        <div class="col">
                            <div>
                                <input type="text" placeholder="Entrer votre message ...">
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="box-icon">
                                <a href="#" class="icon">
                                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                                </a>
                                <a href="#" class="icon">
                                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                                </a>
                                <a href="#" class="icon">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                </a>
                                <button type="submit" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('other-content')
    <div class="modal fade modalcreateGroup" id="createGroup" tabindex="-1" role="dialog" aria-labelledby="createGroup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title">Créer un nouveau groupe</h4>
                    <div class="icon-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" class="form-row form-note">
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="#">Nom du groupe</label>
                                <input type="text" class="form--group__input">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form--group">
                                <label for="#">Membre du groupe</label>
                                <button type="button" class="btn-selectionne" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Selectionner les membres</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="content-collapse">
                                    <h2 class="title">Membres</h2>
                                    <div class="content-order">
                                        <h3 class="title-letter">A</h3>
                                        <div class="option-checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" value="">
                                                <p class="paragraph">Albert Rodarte</p>
                                                <span></span>
                                            </label>

                                            <label class="checkbox">
                                                <input type="checkbox" value="">
                                                <p class="paragraph">Allison Etter</p>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="content-order">
                                        <h3 class="title-letter">B</h3>
                                        <div class="option-checkbox">
                                            <label class="checkbox">
                                                <input type="checkbox" value="">
                                                <p class="paragraph">Albert Rodarte</p>
                                                <span></span>
                                            </label>

                                            <label class="checkbox">
                                                <input type="checkbox" value="">
                                                <p class="paragraph">Allison Etter</p>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="box-btn">
                        <button class="btn-standard-dash --blue mr-3" data-dismiss="modal">Retour</button>
                        <button class="btn-standard-dash --green">Créer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection