Library management system

<h1>Project Setup Commands</h1>

##Mac Os, Ubuntu and windows users continue here:
- Create a database locally named `homestead` utf8_general_ci
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git provider.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan db:seed --class=DatabaseSeeder` to run seeders, if any.
- Run `php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"`
- Run `php artisan jwt:secret`
- Run `php artisan serve`
- following this steps Admin login already create 
- Email:-Admin@test.com password:- User@123
- 

<h1>Rules for Project User</h1>

- There are two Roles in this Project 
- Admin and user
- User have only get data from there perspective example how many books he issue and return all books
- there Authors and and Catgory he only look that data but cant do cud operation on that
- Admin have full access on this project example
- add author, books, books-category, and issue book, and return Book request
- 
- 



