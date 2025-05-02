@extends('layouts.app')

@section('layout-holder')
  @yield('content')
  @guest      
    @include('inc.login-banner')
  @endguest
  @include('inc.footer')
@endsection