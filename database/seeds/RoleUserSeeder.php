<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleuser = factory(App\RoleUser::class)->create([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
