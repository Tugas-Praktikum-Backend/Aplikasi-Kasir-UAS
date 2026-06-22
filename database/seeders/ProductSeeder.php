<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catSembako = Category::create(['nama' => 'Sembako & Kebutuhan Pokok']);
        $catMinuman = Category::create(['nama' => 'Minuman']);
        $catSnack = Category::create(['nama' => 'Makanan Ringan & Roti']);
        $catPerawatan = Category::create(['nama' => 'Perawatan Diri & Mandi']);

        $product1 = Product::create([
            'nama' => 'Indomie Mie Goreng',
            'harga' => 3000,
            'category_id' => $catSembako->id, 
        ]);
        $product1->inventory()->create([
            'merek' => 'Indofood',
            'stock' => 50,
            'isipc' => 40,
        ]);

        $product2 = Product::create([
            'nama' => 'Beras Sania Premium 5kg',
            'harga' => 74500,
            'category_id' => $catSembako->id, 
        ]);
        $product2->inventory()->create([
            'merek' => 'Sania',
            'stock' => 20,
            'isipc' => 5,
        ]);

        $product3 = Product::create([
            'nama' => 'Minyak Goreng Bimoli 2 Liter',
            'harga' => 36000,
            'category_id' => $catSembako->id, 
        ]);
        $product3->inventory()->create([
            'merek' => 'Bimoli',
            'stock' => 30,
            'isipc' => 6,
        ]);

        $product4 = Product::create([
            'nama' => 'Aqua Air Mineral 600ml',
            'harga' => 2500,
            'category_id' => $catMinuman->id, 
        ]);
        $product4->inventory()->create([
            'merek' => 'Danone Aqua',
            'stock' => 100,
            'isipc' => 24,
        ]);

        $product5 = Product::create([
            'nama' => 'Teh Pucuk Harum 350ml',
            'harga' => 3000,
            'category_id' => $catMinuman->id, 
        ]);
        $product5->inventory()->create([
            'merek' => 'Mayora',
            'stock' => 45,
            'isipc' => 24,
        ]);

        $product6 = Product::create([
            'nama' => 'Susu Bear Brand 189ml',
            'harga' => 10500,
            'category_id' => $catMinuman->id, 
        ]);
        $product6->inventory()->create([
            'merek' => 'Nestle',
            'stock' => 120,
            'isipc' => 30,
        ]);

        $product7 = Product::create([
            'nama' => 'Kopi Kenangan Mantancino 220ml',
            'harga' => 9500,
            'category_id' => $catMinuman->id, 
        ]);
        $product7->inventory()->create([
            'merek' => 'Kopi Kenangan',
            'stock' => 60,
            'isipc' => 24,
        ]);

        $product8 = Product::create([
            'nama' => 'Chitato Sapi Panggang 68g',
            'harga' => 11500,
            'category_id' => $catSnack->id, 
        ]);
        $product8->inventory()->create([
            'merek' => 'Indofood',
            'stock' => 80,
            'isipc' => 30,
        ]);

        $product9 = Product::create([
            'nama' => 'Sari Roti Tawar Kupas',
            'harga' => 17000,
            'category_id' => $catSnack->id, 
        ]);
        $product9->inventory()->create([
            'merek' => 'Sari Roti',
            'stock' => 15,
            'isipc' => 10,
        ]);

        $product10 = Product::create([
            'nama' => 'SilverQueen Cashew 58g',
            'harga' => 16500,
            'category_id' => $catSnack->id, 
        ]);
        $product10->inventory()->create([
            'merek' => 'Delfi',
            'stock' => 40,
            'isipc' => 10,
        ]);

        $product11 = Product::create([
            'nama' => 'Pepsodent Pencegah Gigi Berlubang 190g',
            'harga' => 12500,
            'category_id' => $catPerawatan->id, 
        ]);
        $product11->inventory()->create([
            'merek' => 'Unilever',
            'stock' => 50,
            'isipc' => 48,
        ]);

        $product12 = Product::create([
            'nama' => 'Lifebuoy Sabun Cair Total 10 400ml',
            'harga' => 26000,
            'category_id' => $catPerawatan->id, 
        ]);
        $product12->inventory()->create([
            'merek' => 'Unilever',
            'stock' => 35,
            'isipc' => 12,
        ]);

        $product13 = Product::create([
            'nama' => 'Sunsilk Shampoo Black Shine 340ml',
            'harga' => 38500,
            'category_id' => $catPerawatan->id, 
        ]);
        $product13->inventory()->create([
            'merek' => 'Unilever',
            'stock' => 25,
            'isipc' => 12,
        ]);
    }
}
