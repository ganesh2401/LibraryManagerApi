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
<h1>Api Samples</h1>

  Login
- URL => '127.0.0.1:8000/api/login',
- REQUEST_TYPE => 'POST',
- PARAMETER = 'email' => 'sample@test.com','password' => 'Sample@123'),
- Response: {"access_token":'sample Token'}

Register
- URL => '127.0.0.1:8000/api/register',
- REQUEST_TYPE => 'POST',
- PARAMETER = 'firstname' => 'sample','lastname' => 'sample surname','email' => 'sample@gmail.com','password' => 'sample@123','gender' => 'm','city' => 'thane','mobile' => '98676573211','age' => '24',
- Response: "message": "User successfully registered",

Update-Profile
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/register',
- REQUEST_TYPE => 'POST',
- PARAMETER = 'firstname' => 'sample','lastname' => 'sample surname','email' => 'sample@gmail.com','password' => 'sample@123','gender' => 'm','city' => 'thane','mobile' => '98676573211','age' => '24',
- Response: "message": "User successfully registered",

Refresh
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/register',
- REQUEST_TYPE => 'POST',
- Response: {"access_token":'sample Token'},

User-Profile
- Header Authorization: Bearer <token Sample>  Accept: application/json
- REQUEST_TYPE => 'GET',
- URL 127.0.0.1:8000/api/auth/user-profile

Logout
- Header Authorization: Bearer <token Sample>  Accept: application/json
- REQUEST_TYPE => 'POST',
- URL 127.0.0.1:8000/api/auth/logout

Author /Book/ Book/book issued/book category/
- Header Authorization: Bearer <token Sample>  Accept: application/json
- REQUEST_TYPE => 'Get',
- URL 127.0.0.1:8000/api/Author
  -   '127.0.0.1:8000/api/book',          
  -   '127.0.0.1:8000/api/books-issued',  
  -   '127.0.0.1:8000/api/books-returned',
  -   '127.0.0.1:8000/api/books-category',
  -   '127.0.0.1:8000/api/Author',
- 
- Response json with all Admin and User POV

Author /Book/ Book/book issued/book category/ Perticular ID data
- Header Authorization: Bearer <token Sample>  Accept: application/json
- REQUEST_TYPE => 'Get',
- URL 127.0.0.1:8000/api/Author/{AuthorId}
    - '127.0.0.1:8000/api/book/{BookID}',          
    - '127.0.0.1:8000/api/books-issued/{BookID}',  
    - '127.0.0.1:8000/api/books-returned{Book-returendId}',
    - '127.0.0.1:8000/api/books-category{BookCatId}',
- 
- Response json with perticular Data Admin and User POV


Author /Book/ Book/book issued/book category/ Perticular ID data (Only Admin Can Delete a data)
- Header Authorization: Bearer <token Sample>  Accept: application/json
- REQUEST_TYPE => 'DELETE',
- URL 127.0.0.1:8000/api/Author/{AuthorId}
    - '127.0.0.1:8000/api/book/{BookID}',
    - '127.0.0.1:8000/api/books-issued/{BookID}',
    - '127.0.0.1:8000/api/books-returned{Book-returendID}',
    - '127.0.0.1:8000/api/books-category{BookCatID}',
-
- Response {"message":"Your Data Deleted Successfully"}

Author
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/Author',
- REQUEST_TYPE => 'POST',
- PARAMETER = {'name' => 'sample'},
- Response: "message": "Author Added successfully",

Author
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/Author/{Author}',
- REQUEST_TYPE => 'PUT/PATCH',
- PARAMETER = {'name' => 'sample'},
- Response: "message": "Author Updated successfully",

Book
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/book',
- REQUEST_TYPE => 'POST',
- PARAMETER = {'bookTitle' => 'sample',edition => '1', authId => 'Auth ID', catId => 'BookCategoryId', totalAvail => '10', totalIss => '5'},
- Response: "message": "Book Data Added successfully",

Book
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/book/{book}',
- REQUEST_TYPE => 'PUT/PATCH',
- PARAMETER = 'bookTitle' => 'sample','edition' => '1',  authId => 'Auth ID', catId => 'BookCategoryId', 'totalAvail' => '10', 'totalIss' => '5',
- Response: "message": "Book Data Updated successfully",

Book Issued
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/books-issued',
- REQUEST_TYPE => 'POST',
- PARAMETER = 'issueDate' => '2021-12-01','retDate' => '2021-12-10', 'bookId' => 'Book Id', 'memberId' => 'User ID',
- Response: "message": "Book Issued successfully",

Book Issued
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/books-issued/{books_issued}',
- REQUEST_TYPE => 'PUT/PATCH',
- PARAMETER = 'issueDate' => '2021-12-01','retDate' => '2021-12-10', 'bookId' => 'Book ID', 'memberId' => 'User Id',
- Response: "message": "Book Issued Data Updated successfully",

Book Returned
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/books-returned',
- REQUEST_TYPE => 'POST',
- PARAMETER = 'retDate' => '2021-12-10', 'bookId' => 'Book id', 'issuedId' => 'Book issued id','memberId' => 'User ID',
- Response: "message": "Book Returned Data successfully",

Book Returned
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/books-returned/{books_returned}',
- REQUEST_TYPE => 'PUT/PATCH',
- PARAMETER = 'retDate' => '2021-12-10', 'bookId' => 'Book id', 'issuedId' => 'Book issued id','memberId' => 'User ID',
- Response: "message": "Book Returned Data Updated successfully",

Book Category
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/books-category',
- REQUEST_TYPE => 'POST',
- PARAMETER = 'catName' => 'test',
- Response: "message": "Book Category Data Added successfully",

Book Category
- Header Authorization: Bearer <token Sample>  Accept: application/json
- URL => '127.0.0.1:8000/api/books-category/{books_category}',
- REQUEST_TYPE => 'PUT/PATCH',
- PARAMETER = 'catName' => 'test',
- Response: "message": "Book Category Data Updated successfully",
