<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $user = factory(App\User::class)->create([
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
        ]); */
        $dev_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $dev_perm = Permission::where('slug','create-tasks')->first();
        $manager_perm = Permission::where('slug','edit-users')->first();

        $developer = new User();
        $developer->username = 'tvviem';
        $developer->email = 'tvviem@blu.edu.vn';
        $developer->password = bcrypt('secret');
        $developer->first_name = 'Viem';
        $developer->last_name = 'Trieu Vinh';
        $developer->active = true;
        $developer->activation_token = str_random(60);

        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);


        $manager = new User();
        $manager->username = 'tyyen';
        $manager->email = 'tyyen@blu.edu.vn';
        $manager->password = bcrypt('secret');
        $manager->first_name = 'Yen';
        $manager->last_name = 'Trieu Yen';
        $manager->active = false;
        $manager->activation_token = str_random(60);
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);
    }
}
