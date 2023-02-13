<!DOCTYPE html>
<html lang="fr">
<head>
    {{-- Meta --}}
    @include('backend/eleve/partials/meta')

    {{-- Style --}}
    @include('backend/eleve/partials/style')
    
    {{-- CSS personnel --}}
    @yield('css-personnel')
</head>
<body class="body">
    {{-- Sidebar --}}
    @include('backend/eleve/partials/sidebar')
    
    {{-- Page wrapper --}}
    <div class="page-wrapper">
        {{-- Top bar --}}
        @include('backend/eleve/partials/topbar')
        
        {{-- Page content --}}
        @yield('page-content')
    </div>
    
    {{-- Contenus supplémentaires --}}
    @yield('other-content')
    
    {{-- Script --}}
    @include('backend/eleve/partials/script')
    
    {{-- Script Personnel --}}
    @yield('script-personnel')

</body>
</html>