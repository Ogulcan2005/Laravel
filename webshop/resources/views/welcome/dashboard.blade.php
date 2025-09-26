@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <a href="{{ url('/products') }}">Ga naar producten</a>
@endsection