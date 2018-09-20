<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $role = factory(App\Role::class)->create([
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
        ]); */
        $dev_permission = Permission::where('slug','create-tasks')->first();
        $manager_permission = Permission::where('slug', 'edit-users')->first();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'developer';
        $dev_role->name = 'Front-end Developer';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $manager_role = new Role();
        $manager_role->slug = 'manager';
        $manager_role->name = 'Assistant Manager';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);
    }
}
