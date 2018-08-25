<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorofdocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorofdoc', function (Blueprint $table) {
            $table->integer('doc_id')->unsigned(); // ID tai lieu
            $table->integer('author_id')->unsigned(); // ID tac gia

            $table->foreign('doc_id')->references('id')->on('documents');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->index(['doc_id', 'author_id']);
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
        Schema::dropIfExists('authorofdoc');
    }
}