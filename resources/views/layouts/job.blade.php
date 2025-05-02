@extends('layouts.app')
@section('layout-holder')
  <div class="container">
    @yield('content')
  </div>
  @guest      
    @include('inc.login-banner')
  @endguest
  @include('inc.footer')
@endsection