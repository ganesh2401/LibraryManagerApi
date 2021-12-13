<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BooksReturned extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='books_returned';

    protected $fillable = ['retDate', 'bookId', 'memberId','issuedId'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'memberId' );
    }

    public function book(){

        return $this->belongsTo(Book::class,'bookId');
    }

    public function book_issued(){
        return $this->belongsTo(BooksIssued::class,'issuedId');
    }

}
