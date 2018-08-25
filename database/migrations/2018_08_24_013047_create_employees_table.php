<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10)->unique();
            $table->string('email', 80)->unique(); // Chung thuc nguoi dung
            $table->string('full_name', 50);
            $table->string('path_avatar', 80);
            $table->binary('salt', 32);
            $table->char('hashed_salted', 64);
            $table->boolean('is_actived')->nullable($value = false)	;	

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
        Schema::dropIfExists('employees');
    }
}
