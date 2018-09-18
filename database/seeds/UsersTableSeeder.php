<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class)->create([
            'username' => 'tvviem',
            'email' => 'tvviem@blu.edu.vn',
            'password' => bcrypt('123456'),
            'first_name' => 'Viêm',
            'last_name' => 'Triệu',
            'work_place' => 'bluitdev',
            'code' => '04.104',
            'path_avatar' => 'no_avatar.jpg',
            'active' => true,
            'activation_token' => 'super_user',
            'role_id' => 1
        ]);
    }
}
