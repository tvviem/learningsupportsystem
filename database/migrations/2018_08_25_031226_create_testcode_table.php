<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Bieu dien tap cac bo de kiem tra, bao gom cac cau hoi chua kich hoat (sinh vien chua lam)
        Schema::create('testcode', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 16)->unique(); // Ma bo de
            $table->tinyInteger('num_of_question', 2);
            $table->char('list_question_id', 64); // Ma hoa cac question_id trong bo de
            // Ma kich hoat giai ma list_question_id; ma nay se duoc ma hoa
            $table->char('code_active', 64);
            $table->tinyInteger('duration', 2); // Thoi gian lam bai cua bo de
            
            $table->integer('employee_id')->unsigned(); // Nguoi ra bo de kiem tra
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
        Schema::dropIfExists('testcode');
    }
}
