# Blog-laravel
This is built on Laravel Framework 5.5. This was built for demonstrate purpose.

## Installation

Clone the repository-
```
https://github.com/hpez/Blog-laravel.git
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


```
php artisan db:seed
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

Then go to `http://localhost:8000/admin/dashboard` from your browser and see the app admin. (<b>Username:</b> admin@gmail.com, <b>Password:</b> password




Then go to `http://localhost:8000` from your browser and see the app.



## Ask a question?

If you have any query please contact at mosraki@gmail.com

## Screenshot

![Home Page](/screenshots/1.PNG)
![Front Page Category](/screenshots/2.PNG)
![Category Posts](/screenshots/3.PNG)
![NewsLetter Subscribe](/screenshots/4.PNG)
![Blog Footer](/screenshots/5.PNG)
![Search Page](/screenshots/6.PNG)
![Category Post page](/screenshots/7.PNG)
![Single Post Page](/screenshots/8.PNG)
![Share Tag Posts](/screenshots/9.PNG)
![Comments Section](/screenshots/10.PNG)
![admin](/screenshots/11.PNG)

