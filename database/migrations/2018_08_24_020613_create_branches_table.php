<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Các nhánh kien thuc trong linh vuc kiến thức
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch_name', 60)->unique();
            $table->string('branch_description', 120)->nullable();
            $table->integer('field_id')->unsigned();

            $table->foreign('field_id')->references('id')->on('fields');
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
        Schema::dropIfExists('branches');
    }
}
