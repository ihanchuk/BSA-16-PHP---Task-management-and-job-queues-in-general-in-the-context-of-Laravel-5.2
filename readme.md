# BSA 16 PHP - Task management and job queues in general & in the context of Laravel 5.2

Test Laravel application for  Binary studio homework assignment. Based on Laravel 5.2

## Installation
Clone from GIT:
```sh
$ git clone <this repo>
```

Make a a named host like:
```sh
http://http://dz9.loc
```

Run composer:
```sh
$ composer install
```

Run migrations:
```sh
$ php artisan migrate
```

Run seeder:
```sh
$ php artisan db:seed
```

Setting Queue driver:

Set  `QUEUE_DRIVER` to be equal `database` inside `.env` file.

Setting Email Credentials:

Set correct SMTP credentials inside  `.env` file.

Run Artisan QUEUE Listener:
```sh
$ php artisan queue:listen
```
## General operations

##### Assigning `Book` entity to `User` entity:
1. visit http://dz9.lok/books
2. Clik on `Book Profile`
3. Select new `User` from dropdown list
4. Click `Set new User` button

##### Creating new `Book` entity:
1. visit http://dz9.loc/books
2. Click on `Create new Book` button
3. Fill all fields inside form
4. Click `Create Book` button

## Todos

 - Replace 'database' driver with `Iron.io` driver
 - Fix some bugs
 - Fix this readme.md