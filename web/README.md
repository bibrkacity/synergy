<h2>Test task for Yuriy Maksymenko </h2>



## Task details

Створити додаток реєстрації і перегляду списку користувачів.
Технології Laravel, MySQL, Vue.js, bootstrap.

Користувачі можуть мати дві ролі - user або admin.
Адміністратор може створювати, перегладати, видаляти, редагувати користувачів. User може переглядати і редагувати лише свої дані.

Поля реєстрації: Імя, Прізвище, Логін, Пароль, Країна. Список країн задати окремою таблицею.

Передбачити можливість завести першого користувача як адміністратора.

Валідація введених даних на фронтенді і бекенді.

Можна використовувати будь які модулі для Laravel і Vue.js.

До файлів проекту додати опис як розгорнути і запустити додаток.

Файли проекту розмістіть в публічному репозиторії (github, bitbucket).


## How to install application 

You need to have installed <a href="https://getcomposer.org/download/">composer</a> on your server. Also you need Internet-connection for server. 

1. Clone application from repository:

https://github.com/bibrkacity/synergy.git

2. Set active directory as folder web of application's folder - in terminal. For example:

cd ~/www/synergy/web

3. Run command in terminal:

composer update

3. Edit file web/.env for add parameters of MySQL-connection. For example:

<pre>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=synergy
DB_USERNAME=synergy
DB_PASSWORD=Z58q8DEz5_NCAa-(</pre>

4. Run migrations in terminal:

php artisan migrate

<p style="font-style:italic;margin-left:2em">If you have error "class not found" - try to run <br />composer dump-autoload</p>

5. Run seeds in terminal:

php artisan db:seed

7. Enjoy!




