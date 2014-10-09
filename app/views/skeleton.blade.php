<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Filière Informatique de la FST</title>
    <link href='http://fonts.googleapis.com/css?family=Belleza' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400' rel='stylesheet' type='text/css'>
    <link href="{{URL::to('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/css/business-casual.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet">
    @yield('custom_css')
  </head>
  <body>
    <div class="brand">Faculté des Sciences & Technologies</div>
    <div class="address-bar">Site internet de la Filière Informatique, Licence et Master.</div>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">FST</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li @if(Request::segment(1) == "agenda")class="active"@endif><a href="{{URL::to('agenda')}}">Agenda</a></li>
            @if(Auth::check())
              <li @if(Request::segment(1) == "tchat")class="active"@endif><a href="{{URL::to('tchat')}}">Tchat</a></li>
              <li @if(Request::segment(1) == "petites-annonces")class="active"@endif><a href="{{URL::to('petites-annonces')}}">Petites-Annonces</a></li>
              <li @if(Request::segment(1) == "trombino")class="active"@endif><a href="{{URL::to('trombino')}}">Trombinoscope</a></li>
            @endif
            <li @if(Request::segment(1) == "mon-compte")class="active"@endif><a href="{{URL::to('auth')}}">Mon Compte</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      @yield('container')
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <p><img src="{{URL::to('assets/img/logo.png')}}" width="128px" /></p>
          </div>
        </div>
      </div>
    </footer>
    <script src="{{URL::to('assets/js/jquery-1.10.2.js')}}"></script>
    <script src="{{URL::to('assets/js/bootstrap.js')}}"></script>
    @yield('custom_js')
  </body>
</html>