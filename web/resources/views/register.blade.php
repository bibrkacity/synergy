<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

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

        <script type="text/javascript">
            function test(f)
            {

                let errors = new Array();

                if(f.elements['country_id'].value == 0)
                    errors.push('Please set country!');

                let p1 = f.elements['password'].value;
                let p2 = f.elements['password_confirmation'].value;
                if(p1 != p2)
                {
                    errors.push('The password confirmation does not match!');
                }

                if(errors.length > 0)
                {
                    let ul = document.getElementById('errors_list');

                    for(let i=0; i<errors.length;i++)
                    {

                        let li = document.createElement('LI');
                        li = ul.appendChild(li);
                        li.innerText = errors[i];

                    }
                    return false;
                }
                return true;
            }

        </script>
    </head>
    <body>
        <h1>Register</h1>
        <p>If you have account, please <a href="/login">login</a></p>

            <div class="alert alert-danger">
                <ul id="errors_list">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>

        <form method="post" action="/register" onsubmit="return test(this);">
            {{ csrf_field() }}
            <div id="f">

                <div>
                    <div>Name</div>
                    <div><input type="text" name="name" value="" /></div>
                </div>

                <div>
                    <div>Last name</div>
                    <div><input type="text" name="lastname" value="" required="required"  /></div>
                </div>

                <div>
                    <div>Country</div>
                    <div>
                        <select name="country_id">
                            @inject('countries', 'App\Models\Country')
                            @foreach ($countries->items() as $one)
                                <option value="{{ $one['id']  }}">{{ $one['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <div>Login (e-mail)</div>
                    <div><input type="email" name="email" value="" required="required"  /></div>
                </div>

                <div>
                    <div>Password</div>
                    <div><input type="password" name="password" value="" required="required"  /></div>
                </div>

               <div>
                <div>Re-type password</div>
                    <div><input type="password" name="password_confirmation" value="" required="required"  /></div>
                </div>

                <div>
                    <div><input type="submit" value="Register" /></div>
                </div>
            </div>
        </form>

    </body>
</html>
