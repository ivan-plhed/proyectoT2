<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "admin";
        $admin->email = "admin@tienda.com";
        $admin->email_verified_at = now();
        $admin->password = bcrypt("admin");
        $admin->remember_token = Str::random(10);
        $admin->role = "admin";
        $admin->save();

        User::factory()->count(5)->create();
    }
}
