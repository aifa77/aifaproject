@extends('layout.master')
@section('pdf')
    <div class="jumbotron">
        <h1>User List</h1>
    </div>
    <input type="button" value="Download to PDF" onclick="window.location.href='{{route('manager.htmltopdfview')}}';" class="btn btn-danger">
    <input type="button" value="Export to Excel" onclick="window.location.href='{{route('manager.export')}}';" class="btn btn-success">
    <input type="button" value="Import from Excel" onclick="window.location.href='{{route('manager.import')}}';" class="btn btn-info">
    <div>
        <br>
        <table class="table">
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            @foreach ($users as $user)
                   <tr>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                @foreach ($user->roles as $role)
                        <td>{!! $role->name !!}</td>     
                    </tr>  
                @endforeach
            @endforeach
        </table>
    </div>
@endsection