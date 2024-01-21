<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@gmail.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Admin";
            $user->role= "admin";
            $user->status = 1;
            $user->email = "admin@gmail.com";
            $user->password = bcrypt('12345678');
            $user->save();
        }
        $user->assignRole('Admin');
    }
}
