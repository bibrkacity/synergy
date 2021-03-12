<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit user</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            div#f{
                display:table;
            }

            div#f > div{
                display:table-row;
            }

            div#f > div > div{
                display:table-cell;
                padding:4px;
            }
            .alert{
                color:red;
            }

            div.container  {
                display:table;

            }

            div.container > div   {
                display:table-row;
            }

            div.container > div  > div {
                display:table-cell;
                border:1px solid black;
                padding:4px;
                margin:0px;
            }

        </style>
    </head>
    <body>

    <p><a href="/">Contents</a></p>

    @php
        $auth_user = \App\Models\User::find(\Auth::id());
    @endphp
    @include('includes.hello',['user'=>$auth_user])

        <h1>Users</h1>

    <p><a href="/users/create">Create new user</a></p>

    <div class="container">

        <div>
            <div>Name</div>
            <div>Last name</div>
            <div>Country</div>
            <div>E-mail</div>
            <div>Role</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>


        @foreach ($users as $one)
            @php
                $user = \App\Models\User::find((int)$one->id)
            @endphp
                 <div>
                   <div>{{ $user->name }}</div>
                   <div>{{ $user->lastname }}</div>
                   <div>{{ $user->country->briefname }}</div>
                   <div>{{ $user->email }}</div>
                   <div>{{ $user->role->name }}</div>
                     <div><a href="/users/{{ $user->id }}">Edit</a></div>
                   <div>
                       <form method="post" action="/users/{{ $user->id }}">
                             {{ method_field('DELETE') }}
                           {{ csrf_field() }}
                             <input type="submit"  value="Delete" />
                        </form>
                  </div>
                </div>
        @endforeach
    </div>

    {{ $users->links() }}

    </body>
</html>
