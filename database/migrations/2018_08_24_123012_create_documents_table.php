<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_name', 80); // Tua de tai lieu
            $table->string('doc_type', 40); // loai tai lieu: bai giang, giao trinh, sach
            $table->integer('publish_year')->unsigned();
            $table->integer('page_number')->unsigned(); // So trang giup phan biet tai lieu
            $table->string('url_download', 200); // URL tu cac o dia truc tuyen
            $table->string('cover_page', 80); // ten tap tin hinh anh bia cua tai lieu
            $table->integer('employee_id')->unsigned(); // Nguoi cung cap tai lieu

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
        Schema::dropIfExists('documents');
    }
}