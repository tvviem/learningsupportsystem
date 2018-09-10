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
            'is_actived' => true,
            'first_name' => 'Vĩnh Viêm',
            'last_name' => 'Triệu',
            'work_place' => 'bluitdev',
            'path_avatar' => 'no_avatar.jpg'
        ]);
    }
}
