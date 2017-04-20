<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Store</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap core mdb.css -->
    <link rel="stylesheet" href="{{ asset('css/mdb.css') }}">
    <!-- Include app.less file -->
    <link rel="stylesheet" href="{{ asset('less/app.less') }}">
    <!-- Include app.scss file -->
    <link rel="stylesheet" href="{{ asset('sass/app.scss') }}">
    <!-- Include sweet alert file -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <!-- Include typeahead file -->
    <link rel="stylesheet" href="{{ asset('css/typeahead.css') }}">
    <!-- Include lity ligh-tbox file -->
    <link rel="stylesheet" href="{{ asset('css/lity.css') }}">
    
    <!-- Added the main.css file that combines app.scss and app.css togather -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" >

  </head>
  <body>
    @include('partials.nav')

    @yield('content')

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/libs/jquery.js') }}"></script>
    <!-- Include main app.js file -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/libs/mdb.js') }}"></script>
    <!-- Include sweet-alert.js file -->
    <script type="text/javascript" src="{{ asset('js/libs/sweetalert.js') }}"></script>
    <!-- Include typeahead.js file -->
    <script type="application/javascript" src="{{ asset('js/libs/typeahead.js') }}"></script>
    <!-- Include lity light-box js file -->
    <script type="application/javascript" src="{{ asset('js/libs/lity.js') }}"></script>

    <script>
      $('#flyer-query').typeahead({
        minLength: 2,
        source: {
          data: [
            @foreach($search as $query)
              "{{ $query->name }}",
            @endforeach
          ]
        }
      });
    </script>

    <script>
      new WOW().init();
    </script>

    @include('partials.flash')

  </body>
</html>