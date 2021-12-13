<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksIssuedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_issueds', function (Blueprint $table) {
            $table->id();
            $table->dateTime('issueDate')->nullable(false);
            $table->dateTime('retDate')->nullable(false);
            $table->unsignedBigInteger('bookId')->nullable(false);
            $table->unsignedBigInteger('memberId')->nullable(false);
            $table->enum('isReturn',['Y','N'])->default('N');
            $table->foreign('bookId')->references('id')->on('books');
            $table->foreign('memberId')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('books_issueds');
    }
}
