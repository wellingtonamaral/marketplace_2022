<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" style="margin-bottom: 10px;">


    <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Inicio</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @auth
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item @if(request()->is('admin/stores')) active @endif">
                <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas </span></a>
            </li>
            <li class="nav-item @if(request()->is('admin/products')) active @endif">
                <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
            </li>
        </ul>

        <div class="my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
           <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault();
                                                          document.querySelector('form.logout').submit(); ">Sair</a>

                    <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
                <li class="nav-item">
                    <span class="nav-link" style="color: 00ff00;">{{auth()->user()->name}} (Logado)</span>
                </li>
          </ul>
            </div>
            @endauth
    </div>
  </nav>
    <main class="container">
             @include('flash::message')
            @yield('content')
        </main>

</body>
</html>
