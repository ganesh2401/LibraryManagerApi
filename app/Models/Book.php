<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(BooksCatagory::class,'catId');
    }

        public function author(){
        return $this->belongsTo(Author::class,'authId');
    }
}
