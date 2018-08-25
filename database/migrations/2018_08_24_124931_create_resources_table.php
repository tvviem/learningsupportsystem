<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->integer('branch_id')->unsigned(); // ID Nhanh kien thuc
            $table->integer('doc_id')->unsigned(); // ID Nhanh kien thuc
            $table->integer('employee_id')->unsigned(); // ID nguoi cap nhat

            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('doc_id')->references('id')->on('documents');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->index(['branch_id', 'doc_id', 'employee_id']);

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
        Schema::dropIfExists('resources');
    }
}
