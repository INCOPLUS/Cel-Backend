<!DOCTYPE html>
<html lang="fr">
<head>
    {{-- Meta --}}
    @include('backend/admin/partials/meta')

    {{-- Style --}}
    @include('backend/admin/partials/style')
    
    {{-- CSS personnel --}}
    @yield('css-personnel')
</head>
<body class="body">
    {{-- Sidebar --}}
    @include('backend/admin/partials/sidebar')
    
    {{-- Page wrapper --}}
    <div class="page-wrapper">
        {{-- Top bar --}}
        @include('backend/admin/partials/topbar')
        
        {{-- Page content --}}
        @yield('page-content')
    </div>
    
    {{-- Contenus supplémentaires --}}
    @yield('other-content')
    
    {{-- Script --}}
    @include('backend/admin/partials/script')
    
    {{-- Script Personnel --}}
    @yield('script-personnel')

</body>
</html>