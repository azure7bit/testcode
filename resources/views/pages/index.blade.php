@extends('app')

@section('content')

  <div id="wrapper">

    @include('pages.partials.side-nav')

    @include('pages.partials.mobile-header')

    <!-- Button to toggle side-nav -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars fa-5x"></i></a>

    <!-- Featured Products section -->
    @include('pages.partials.featured')

    @include('pages.partials.mobile-parallax')

    <!-- New Products section -->
    @include('pages.partials.new')


    @include('pages.partials.footer')

  </div>  <!-- close wrapper -->

@stop