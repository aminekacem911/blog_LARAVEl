<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._header') 
</head>
<body class="theme-default">
     <div class="layout-container">
        @include('partials.alerts')
        @if (Route::has('login'))
            @auth
                @include('partials._nav')
            @endauth  
        @endif
                     @yield('content')
    </div>
         @include('partials._search')
         @include('partials._setting')
         @include('partials._footer')
        
</body>
</html>


