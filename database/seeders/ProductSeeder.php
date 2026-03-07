<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nombre' => 'Producto 1',
                'precio' => 100 * 1.21,
                'cantidad' => 1,
            ],
            [
                'nombre' => 'Producto 2',
                'precio' => 200 * 1.21,
                'cantidad' => 2,
            ],
            [
                'nombre' => 'Producto 3',
                'precio' => 300 * 1.21,
                'cantidad' => 3,
            ],
        ];
        foreach ($products as $product) {
            Product::create([
                'nombre' => $product['nombre'],
                'precio' => $product['precio'],
                'cantidad' => $product['cantidad'],
            ]);
        }
    }
}