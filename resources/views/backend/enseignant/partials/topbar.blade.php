<div class="page-wrapper__topbar">
    <div class="page-wrapper__topbar--btn" onclick="toggleSidebar()">
        <img src="{{asset('assets/images/menu.svg')}}" alt="sidebar btn" class="iconOpen">
        <img src="{{asset('assets/images/close.svg')}}" alt="sidebar btn" class="iconClose">
    </div>
    <div class="page-wrapper__topbar--linkRight">
        <div class="language">
            <img src="{{asset('assets/images/fr.svg')}}" alt="fr" id="imageBox">
            <div class="box-lang">
                <div class="box-lang__item">
                    <div class="logo-drapeau">
                        <img src="{{asset('assets/images/fr.svg')}}" alt="fr" onclick="changeLanguage(this)">
                    </div>
                    <span class="language-country" onclick="addIcon(this)">Français</span>
                </div>
                <div class="box-lang__item">
                    <span class="logo-drapeau">
                        <img src="{{asset('assets/images/gb.svg')}}" alt="en" onclick="changeLanguage(this)">
                    </span>
                    <span class="language-country" onclick="addIcon(this)">Anglais</span>
                </div>
            </div>
        </div>
        <a href="{{ route('enseignant-notifications') }}">
            <div class="notification">
                {{-- <div class="account">3</div> --}}
                <img src="{{asset('assets/images/notify.svg')}}">
            </div>
        </a>
        <div class="box-user">
            <span class="name">{{ Auth::user()->nom_prenom }}</span>
            <div class="user">
                <img src="{{asset('assets/images/user_image1.png')}}" alt="photo">
            </div>
            <div class="user-link">
                <a href="{{ route('enseignant-profil') }}" class="link"><i class="fa fa-user" aria-hidden="true"></i>Mon Profil</a>
                {{-- <a href="{{ route('enseignant-maj-profil') }}" class="link"><i class="fa fa-edit" aria-hidden="true"></i>Mis à jour Infos</a> --}}
                <a href="{{ route('enseignant-maj-mdp') }}" class="link"><i class="fa fa-lock" aria-hidden="true"></i>Mot de passe</a>
                <hr class="underline" />
                <a href="{{ route('deconnexion') }}" class="link"><i class="fa fa-sign-out" aria-hidden="true"></i>Déconnexion</a>
            </div>
        </div>
    </div>
</div>