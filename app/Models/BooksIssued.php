<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BooksIssued extends Model
{
    use HasFactory,SoftDeletes;
    protected  $fillable = ['issueDate', 'retDate', 'bookId', 'memberId'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'memberId');
    }
     public function book(){

        return $this->belongsTo(Book::class,'bookId','id');
     }

     public function ReturnDate(){
        return $this->hasOne(BooksReturned::class,'issuedId');
     }

}
