<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', 3999);
            $table->boolean('is_actived')->nullable($value = false);
            
            $table->integer('branch_id')->unsigned(); // ID Nhanh kien thuc
            $table->integer('type_id')->unsigned(); // ID Loai cau hoi
            $table->integer('level_id')->unsigned(); // ID muc do kho, de
            $table->integer('employee_id')->unsigned(); // Nguoi ra cau hoi
            
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('employee_id')->references('id')->on('employees');

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
        Schema::dropIfExists('questions');
    }
}
