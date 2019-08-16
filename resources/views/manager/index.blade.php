@extends('layout.master')
@section('home')
    <div class="jumbotron">
        <h1>Welcome to My Blog</h1>
        <h2>My name is Aifa Nur Amalia</h2>
        <p>My first Laravel homepage is successfully created!</p>
        <p><strong>You are a manager</strong></p>
        <button class="btn btn-lg btn-info" onclick="window.location.href='{{route('manager.list')}}';">See Employee List</button>
    </div>
@endsection