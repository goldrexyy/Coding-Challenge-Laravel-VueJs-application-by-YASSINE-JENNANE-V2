<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
     <link rel="stylesheet" href="{{asset('css/Page1.css')}}">
      <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
     <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <title>{{ config('TechChallenge', 'TechChallenge') }}</title>

    <!-- CSRF Token -->
    <script>
      window.Laravel={!! json_encode([
        'csrf_token' => csrf_token(),
        ]) !!};
    </script>
        
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    

 </head>
<body>
<div class="" id="app" >       
      <Page1 ></Page1>
</div>
     
    <script src="{{ asset('js/vue.js')}}"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/app.js')}}"> </script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
    
</body>
</html>
        