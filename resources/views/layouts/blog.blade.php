<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/earlyaccess/notosanstc.css" rel="stylesheet" type="text/css">
  <link href="/css/my-style.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="/css/clean-blog.min.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/post') }}">My Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="{{ route('post.index') }}">文章列表</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('post.create') }}">撰寫文章</a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <img class="nav-avatar" src="{{ Auth::user()->avatar ?: "/img/avatar-default.png" }}">
              </a>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="/user/{{ Auth::user()->id }}">個人頁面</a>
                  <a class="dropdown-item" href="#">站內信箱</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      登出
                  </a>
      
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  @yield('header')

  <!-- Post Content -->
  <article>
    @yield('content')
  </article>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p class="copyright text-muted">Copyright &copy; My Blog 2018</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/js/clean-blog.min.js"></script>
  
  {{-- import js here --}}
  @yield('js')
  <script src="/js/my-blog.js"></script> 
</body>

</html>