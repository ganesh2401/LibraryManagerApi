<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksReturnedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_returned', function (Blueprint $table) {
            $table->id();
            $table->dateTime('retDate')->nullable(false);
            $table->unsignedBigInteger('bookId')->nullable(false);
            $table->unsignedBigInteger('memberId')->nullable(false);
            $table->unsignedBigInteger('issuedId')->nullable(false);
            $table->foreign('bookId')->references('id')->on('books');
            $table->foreign('memberId')->references('id')->on('users');
            $table->foreign('issuedId')->references('id')->on('books_issueds');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_returneds');
    }
}
