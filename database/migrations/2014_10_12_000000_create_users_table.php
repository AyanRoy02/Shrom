<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

        // DB::table("users")->insert([
        //     [
        //         "name" => "Admin",
        //         "password" => bcrypt("12345678"),
        //         "email"    => "admin@gmail.com",
        //         "role"   => "admin",
        //         "status"   => 1,
        //     ],
        //     $user->assignRole('Superadmin');
        // ]);

        
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
