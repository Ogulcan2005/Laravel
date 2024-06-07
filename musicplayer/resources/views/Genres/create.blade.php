@extends("layouts.master")
@section("content")
<form action="/genre/store" method="POST">
    @csrf
    <label for="name">Genre naam invullen</label>
    <input type="text" name="GenreName" id="">
    <input type="submit">
</form>
@endsection