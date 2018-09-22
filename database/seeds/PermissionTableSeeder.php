<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('slug', 'admin')->first();
        $lecturer_role = Role::where('slug', 'lecturer')->first();
        $student_role = Role::where('slug', 'student')->first();

        $adminPer = new Permission();
        $adminPer->slug = 'crud-users';
        $adminPer->name = 'crud users';
        $adminPer->save();
        $adminPer->roles()->attach($admin_role);
        
        $adminPer1 = new Permission();
        $adminPer1->slug = 'grant-privilege';
        $adminPer1->name = 'grant privilege';
        $adminPer1->save();
        $adminPer1->roles()->attach($admin_role);
        
        $adminPer2 = new Permission();
        $adminPer2->slug = 'crud-fields';
        $adminPer2->name = 'crud fields';
        $adminPer2->save();
        $adminPer2->roles()->attach($admin_role);
        
        $adminPer3 = new Permission();
        $adminPer3->slug = 'update-delete-branches';
        $adminPer3->name = 'update delete branches';
        $adminPer3->save();
        $adminPer3->roles()->attach($admin_role);

        $lecPerm0 = new Permission();
        $lecPerm0->slug = 'create-branches';
        $lecPerm0->name = 'create branches';
        $lecPerm0->save();
        $lecPerm0->roles()->attach($lecturer_role);
        
        $lecPerm = new Permission();
        $lecPerm->slug = 'crud-questions';
        $lecPerm->name = 'crud questions';
        $lecPerm->save();
        $lecPerm->roles()->attach($lecturer_role);

        $lecPerm1 = new Permission();
        $lecPerm1->slug = 'crud-test-code'; // Giang vien tao bo de
        $lecPerm1->name = 'crud test code';
        $lecPerm1->save();
        $lecPerm1->roles()->attach($lecturer_role);
        
        $lecPerm2 = new Permission();
        $lecPerm2->slug = 'provide-documents';
        $lecPerm2->name = 'provide documents';
        $lecPerm2->save();
        $lecPerm2->roles()->attach($lecturer_role);
        
        $lecPerm3 = new Permission();
        $lecPerm3->slug = 'export-results'; // Ket xuat ket qua kiem tra cua sinh vien
        $lecPerm3->name = 'export results';
        $lecPerm3->save();
        $lecPerm3->roles()->attach($lecturer_role);

        $studentPerm = new Permission();
        $studentPerm->slug = 'join-option-test'; // Thuc hien mot so cau hoi mau
        $studentPerm->name = 'join option test';
        $studentPerm->save();
        $studentPerm->roles()->attach($student_role);
        
        $studentPerm1 = new Permission();
        $studentPerm1->slug = 'join-test-code'; // Tham gia kiem tra tu bo de cua GV
        $studentPerm1->name = 'join test code';
        $studentPerm1->save();
        $studentPerm1->roles()->attach($student_role);
        
        $studentPerm2 = new Permission();
        $studentPerm2->slug = 'get-documents'; // co the xem cac tai lieu ma giang vien cung cap
        $studentPerm2->name = 'get documents';
        $studentPerm2->save();
        $studentPerm2->roles()->attach($student_role);
    }
}
