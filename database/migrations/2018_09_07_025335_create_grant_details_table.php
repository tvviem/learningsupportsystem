<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_granted', function (Blueprint $table) {
            $table->integer('role_id')->unsigned(); // ID role
            $table->integer('res_permitted_id')->unsigned(); // ID role

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('res_permitted_id')->references('id')->on('resources_permitted');
            $table->primary(['role_id', 'res_permitted_id']);
            
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
        Schema::dropIfExists('details_granted');
    }
}
