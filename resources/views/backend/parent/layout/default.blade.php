<!DOCTYPE html>
<html lang="fr">
<head>
    {{-- Meta --}}
    @include('backend/parent/partials/meta')

    {{-- Style --}}
    @include('backend/parent/partials/style')
    
    {{-- CSS personnel --}}
    @yield('css-personnel')
</head>
<body class="body">
    {{-- Sidebar --}}
    @include('backend/parent/partials/sidebar')
    
    {{-- Page wrapper --}}
    <div class="page-wrapper">
        {{-- Top bar --}}
        @include('backend/parent/partials/topbar')
        
        {{-- Page content --}}
        @yield('page-content')
    </div>
    
    {{-- Contenus supplémentaires --}}
    @yield('other-content')
    
    {{-- Script --}}
    @include('backend/parent/partials/script')
    
    {{-- Script Personnel --}}
    @yield('script-personnel')

</body>
</html>