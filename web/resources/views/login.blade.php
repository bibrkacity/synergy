<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

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

            .error{
                color:red;
            }

        </style>
    </head>
    <body>
        <h1>Login or register</h1>
        <p>No account? Please <a href="/register">register</a></p>
        @if(Route::currentRouteName() == 'login_error')
            <p class="error">Login or password is invalid</p>
        @elseif(Route::currentRouteName() == 'login_welcome')
            <p class="welcome">You have registered successfully! Now you can login</p>
        @endif
        <form method="post" action="/login">
            {{ csrf_field() }}
            <div id="f">
                <div>
                    <div>Login</div>
                    <div><input type="email" name="email" value="" /></div>
                </div>

                <div>
                    <div>Password</div>
                    <div><input type="password" name="password" value="" /></div>
                </div>

                <div>
                    <div><input type="submit" value="Login" /></div>
                </div>
            </div>
        </form>



    </body>
</html>
