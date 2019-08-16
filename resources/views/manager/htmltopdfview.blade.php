<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/navbar/">
    <title>Aifa Nur Amalia - Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/3.4/dist/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="jumbotron">
        <h1>User List</h1>
    </div>
    <div>
        <table class="table">
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            @foreach ($users as $user)
                @foreach ($user->roles as $role)
                   <tr>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $role->name !!}</td>     
                    </tr>  
                @endforeach
            @endforeach
        </table>
    </div>
</body>
</html>
    