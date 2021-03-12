<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test task</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
    <h1>Test task</h1>

    @php
        $auth_user = \App\Models\User::find(\Auth::id());
    @endphp
    @include('includes.hello',['user'=>$auth_user])

    <ul>
        <li><a href="/profile">My Profile</a></li>
        @if($auth_user->role_id == \App\Models\User::ROLE_ADMIN)
            <li><a href="/users">Users</a></li>
        @endif
        <li><a href="/logout">LogOut</a></li>
    </ul>

    </body>
</html>
