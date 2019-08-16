@extends('layout.master')
@section('contact')
    <div class="jumbotron">
        <h1>Contact</h1>
        <h2>Aifa Nur Amalia</h2>
        <p>Follow me on Instagram <a href="http://instagram.com/aifamalia" class="glyphicon">@aifamalia</a></p>
    </div>
    <div>
        <form action="">
            <input type="text" placeholder="Name" name="name" class="form-control" style="width:500px" autofocus>
            <input type="text" placeholder="E-mail" name="email" class="form-control" style="width:500px">
            <textarea name="message" cols="30" rows="4" placeholder="Message" class="form-control" style="width:500px"></textarea>
            <input type="submit" name="submit" value="Send" class="btn btn-info">
        </form>
    </div>
@endsection