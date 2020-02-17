<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $roles = App\Role::all();
        $skills = App\Skill::all();
        factory(App\User::class, 50)->create()->each(function($u) use ($skills, $roles) {
//        $u = App\User::find(52);
        $skillSet = $skills->random((rand(1,4)));
        $roleSet = $roles->random((rand(2,2)));
        foreach($skillSet as $skill ) {
            $u->skills()->attach($skill->id, ['level' => rand(1,5)]);
        }
        foreach($roleSet as $role ) {
            $u->roles()->attach($role->id);
        }
        }
        );
//        $u -> save();


        DB::table('users')->insert([
            'name' => 'Admin',
            'firstname' => 'Admin',
            'biography' => 'Admin',
            'email' => 'admin.admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('role_user')->insert([
            'user_id' => '51',
            'role_id' => '1',
        ]);

        DB::table('skill_user')->insert([
            'user_id' => '51',
            'skill_id' => '1',
            'level'=>'5',
        ]);
    }
}
