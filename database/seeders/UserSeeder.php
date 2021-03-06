<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*  $data_user = array('name' => 'manuel',
        'email' => 'manuelsansoresg@gmail.com', 'password' => bcrypt('demor00txx'));
        $user = new User($data_user);
        $user->save(); */
        Role::create(['name' => 'Administrador']);

        $user = User::find(1);
        $user->assignRole('Administrador');
    }
}
