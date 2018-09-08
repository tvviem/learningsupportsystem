<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesPermittedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Design attend in the future 
        Schema::create('resources_permitted', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uri_resource', 100); // examples: /product; /product/id/edit... 
            $table->string('uri_target', 100); // examples: UsersController@index|create|show|edit
            
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
        Schema::dropIfExists('resources_permitted');
    }
}
