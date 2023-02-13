<div class="sidebar">
    <div class="sidebar__logo">
        <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo site" class="img-fluid" />
    </div>
    <ul class="sidebar__box-link">
        <li class="{{Route::currentRouteName()=='enseignant-accueil' ? 'active' : ''}}">
            <a href="{{route('enseignant-accueil')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/home.svg')}}" alt="home">
                    </span>
                    <span class="title">Tableau de bord</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='enseignant-gestion-sujet' ? 'active' : ''}}">
            <a href="{{route('enseignant-gestion-sujet')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/compo.svg')}}">
                    </span>
                    <span class="title">Gestion des sujets</span>
                </div>
            </a>
        </li>
        {{-- <li class="{{Route::currentRouteName()=='enseignant-gestion-oral' ? 'active' : ''}}">
            <a href="{{route('enseignant-gestion-oral')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/student.svg')}}">
                    </span>
                    <span class="title">Gestions des oraux</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='enseignant-gestion-cours' ? 'active' : ''}}">
            <a href="{{route('enseignant-gestion-cours')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/teacher.svg')}}">
                    </span>
                    <span class="title">Gestions des cours</span>
                </div>
            </a>
        </li> --}}
        <li class="{{Route::currentRouteName()=='enseignant-emploi-temps' ? 'active' : ''}}">
            <a href="{{route('enseignant-emploi-temps')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/calendar.svg')}}" alt="calendar">
                    </span>
                    <span class="title">Emploi du temps</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='enseignant-compte-celpay' ? 'active' : ''}}">
            <a href="{{route('enseignant-compte-celpay')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/account.svg')}}" alt="account">
                    </span>
                    <span class="title">Compte CELPAY</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='enseignant-faire-demande' ? 'active' : ''}}">
            <a href="{{route('enseignant-faire-demande')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/demande.svg')}}" alt="demande">
                    </span>
                    <span class="title">Faire une demande</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='enseignant-tutoriel' ? 'active' : ''}}">
            <a href="{{route('enseignant-tutoriel')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/tutorial.svg')}}" alt="tutorial">
                    </span>
                    <span class="title">Tutoriels / Docs</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='enseignant-celchat' ? 'active' : ''}}">
            <a href="{{route('enseignant-celchat')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/chat.svg')}}" alt="tchat">
                    </span>
                    <span class="title">CELChat</span>
                </div>
            </a>
        </li>
    </ul>
</div>