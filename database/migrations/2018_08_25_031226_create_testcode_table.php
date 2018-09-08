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
        // Bieu dien tap cac bo de kiem tra, bao gom cac cau hoi chua kich hoat
        // Bộ đề do giảng viên tạo, chỉ có họ mới biết mật mã mở đề
        Schema::create('testcode', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 16)->unique(); // Ma bo de
            $table->tinyInteger('num_of_question', 2);
            $table->varchar('encode_list_id', 100); // Ma hoa cac question_id trong bo de
            // tạo ngẫu nhiên như salt (code_rand) và kết hợp với mật mã
            // của giảng viên cung cấp khi tạo đề, Dùng để giải mã list_question_id
            $table->binary('salt', 32); // RandomSalt + user' key -> Encrypt with AES-256-CBC
            // want join to test; DESCRYPT
            $table->tinyInteger('duration', 2); // Thoi gian lam bai cua bo de
            
            $table->integer('user_id')->unsigned(); // Giang vien ra bo de kiem tra
            $table->foreign('user_id')->references('id')->on('users'); 
            
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
