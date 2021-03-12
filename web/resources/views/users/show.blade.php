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

        </style>
    </head>
    <body>

    <p><a href="/">Contents</a></p>

    @php
        $auth_user = \App\Models\User::find(\Auth::id());
        if($auth_user->role_id != \App\Models\User::ROLE_ADMIN)
            {
            if($auth_user->id != Auth::id())
                die('Restricted area');
            else
                $user = $auth_user;
            }

    @endphp
    @include('includes.hello',['user'=>$auth_user])

    @if(Route::currentRouteName() == 'profile')
        <h1>Edit your profile</h1>
    @else
        <h1>Edit user</h1>
    @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="/users/{{ $user->id }}" onsubmit="return test(this)">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div id="f">

                <div>
                    <div>Name</div>
                    <div><input type="text" name="name" required="required"  value="{{ $user->name }}" /></div>
                </div>

                <div>
                    <div>Last name</div>
                    <div><input type="text" name="lastname" value="{{ $user->lastname }}" required="required"  /></div>
                </div>

                <div>
                    <div>Country</div>
                    <div>
                        <select name="country_id">

                            @inject('countries', 'App\Models\Country')
                            @foreach ($countries->items() as $one)
                                @if( $one['id'] == $user->country_id )
                                    <option value="{{ $one['id']  }}" selected="selected">{{ $one['name'] }}</option>
                                @else
                                    <option value="{{ $one['id']  }}">{{ $one['name'] }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <div><input type="submit" value="Save" /></div>
                </div>
            </div>
        </form>

    </body>
</html>
