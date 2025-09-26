@extends('layouts.layout.master')

@section('navigation')
    <a href="{{ route('products.welcome') }}">Producten</a>
    <a href="{{ url('/dashboard') }}">Dashboard</a>
@endsection

@section('main-content')
    @yield('content')
@endsection 