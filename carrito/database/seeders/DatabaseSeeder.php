<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "api_user";
        $user->email = "api_user@carrito.com";
        $user->password = bcrypt("api_user");
        $user->api_token = "JDysTQ0GAvGb2iCEFHdQ";
        $user->save();
    }
}
