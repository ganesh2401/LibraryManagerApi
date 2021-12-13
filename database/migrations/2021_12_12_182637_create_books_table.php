<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('bookTitle', 255)->nullable('false');
            $table->unsignedInteger('edition');
            $table->unsignedBigInteger('authId');
            $table->unsignedBigInteger('catId');
            $table->foreign('catId')->references('id')->on('books_catagories');
            $table->foreign('authId')->references('id')->on('authors');
            $table->unsignedInteger('totalAvail')->default(0);
            $table->unsignedInteger('totalIss')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
