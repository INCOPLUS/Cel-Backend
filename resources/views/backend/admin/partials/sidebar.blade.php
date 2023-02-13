<div class="sidebar">
    <div class="sidebar__logo">
        <img src="{{asset('assets/images/logo-cel.png')}}" alt="logo site" class="img-fluid" />
    </div>
    <ul class="sidebar__box-link" id="accordion">
        <li class="{{Route::currentRouteName()=='admin-accueil' ? 'active' : ''}}">
            <a href="{{route('admin-accueil')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/home.svg')}}" alt="home">
                    </span>
                    <span class="title">Tableau de bord</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-liste-enseignants' ? 'active' : ''}}">
            <a href="{{route('admin-liste-enseignants')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/teacher.svg')}}" alt="calendar">
                    </span>
                    <span class="title">Enseignants</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-liste-eleves' ? 'active' : ''}}">
            <a href="{{route('admin-liste-eleves')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/student.svg')}}" alt="calendar">
                    </span>
                    <span class="title">Apprenants</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-liste-parents' ? 'active' : ''}}">
            <a href="{{route('admin-liste-parents')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/parent.svg')}}" alt="calendar">
                    </span>
                    <span class="title">Parents d'élèves</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-parametrage' ? 'active' : ''}}">
            <a href="{{route('admin-parametrage')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/gestion.svg')}}" alt="gestion">
                    </span>
                    <span class="title">Paramétrages</span>
                </div>
            </a>
        </li>
        {{-- <li class="{{Route::currentRouteName()=='admin-gestion-site' ? 'active' : ''}}">
            <a href="{{route('admin-gestion-site')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/site-web.svg')}}" alt="gestion">
                    </span>
                    <span class="title">Gestion du site</span>
                </div>
            </a>
        </li> --}}
        {{-- <li class="{{Route::currentRouteName()=='admin-gestion-sujet' ? 'active' : ''}}">
            <a href="{{route('admin-gestion-sujet')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/gestion.svg')}}" alt="gestion">
                    </span>
                    <span class="title">Gestion des sujets</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-gestion-examen' ? 'active' : ''}}">
            <a href="{{route('admin-gestion-examen')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/gestion.svg')}}" alt="gestion">
                    </span>
                    <span class="title">Gestion des examens</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-gestion-oral' ? 'active' : ''}}">
            <a href="{{route('admin-gestion-oral')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/gestion.svg')}}" alt="gestion">
                    </span>
                    <span class="title">Gestions des oraux</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-gestion-cours' ? 'active' : ''}}">
            <a href="{{route('admin-gestion-cours')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/gestion.svg')}}" alt="gestion">
                    </span>
                    <span class="title">Gestions des cours</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-emploi-temps' ? 'active' : ''}}">
            <a href="{{route('admin-emploi-temps')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/calendar.svg')}}" alt="calendar">
                    </span>
                    <span class="title">Emploi du temps</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-compte-celpay' ? 'active' : ''}}">
            <a href="{{route('admin-compte-celpay')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/account.svg')}}" alt="account">
                    </span>
                    <span class="title">Compte CELPAY</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-tutoriel' ? 'active' : ''}}">
            <a href="{{route('admin-tutoriel')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/tutorial.svg')}}" alt="tutorial">
                    </span>
                    <span class="title">Tutoriels / Docs</span>
                </div>
            </a>
        </li>
        <li class="{{Route::currentRouteName()=='admin-celchat' ? 'active' : ''}}">
            <a href="{{route('admin-celchat')}}">
                <div class="menu_item">
                    <span class="icon">
                        <img src="{{asset('assets/images/chat.svg')}}" alt="tchat">
                    </span>
                    <span class="title">CELChat</span>
                </div>
            </a>
        </li> --}}
    </ul>
</div>