<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = factory(App\Role::class)->create([
            'role_name' => 'admin',
            'role_description' => 'Quản lý tổng thể hệ thống'
        ]);
        $role = factory(App\Role::class)->create([
            'role_name' => 'lecturer',
            'role_description' => 'Nhóm người dùng được phép thao tác tạo câu hỏi, bộ đề'
        ]);
        $role = factory(App\Role::class)->create([
            'role_name' => 'trainee',
            'role_description' => 'Nhóm người dùng trả lời câu hỏi, tải các tài nguyên'
        ]);
    }
}
