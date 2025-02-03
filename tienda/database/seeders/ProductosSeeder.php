<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto1 = new Producto();
        $producto1->name = "Producto 1";
        $producto1->price = 4.95;
        $producto1->img = "/imgs/foto1.png";
        $producto1->save();
    }
}
