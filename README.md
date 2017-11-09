# Blog-laravel
This is built on Laravel Framework 5.5. This was built for demonstrate purpose.

## Installation

Clone the repository-
```
https://github.com/MirShaon/Blog-laravel.git
```

Then cd into the folder with this command-
```
cd Blog-laravel
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `blog` and then do a database migration using this command-
```
php artisan migrate
```


At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.

## Ask a question?

If you have any query please contact at mosraki@gmail.com

## Screenshot

![Home Page](/screenshots/1.png)
![Front Page Category](/screenshots/2.png)
![Category Posts](/screenshots/3.png)
![NewsLetter Subscribe](/screenshots/4.png)
![Blog Footer](/screenshots/5.png)
![Search Page](/screenshots/6.png)
![Category Post page](/screenshots/7.png)
![Single Post Page](/screenshots/8.png)
![Share,Tag, Posts](/screenshots/9.png)
![Comments Section](/screenshots/10.png)

