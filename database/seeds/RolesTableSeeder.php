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
        $data = array([
                'name' => 'Administrateur',
            ],
            [
                'name' => 'Utilisateur',
            ]);
        App\Role::insert($data);
    }
}
