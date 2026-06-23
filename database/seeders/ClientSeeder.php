<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $client1 = Client::create(['nama' => 'PT Indomarco Adi Prima']);
        $client1->products()->attach(Product::where('nama', 'Indomie Mie Goreng')->first()->id, ['harga' => 112000]);
        $client1->products()->attach(Product::where('nama', 'Beras Sania Premium 5kg')->first()->id, ['harga' => 350000]);
        $client1->products()->attach(Product::where('nama', 'Minyak Goreng Bimoli 2 Liter')->first()->id, ['harga' => 195000]);
        $client1->products()->attach(Product::where('nama', 'Chitato Sapi Panggang 68g')->first()->id, ['harga' => 313500]);
        $client1->products()->attach(Product::where('nama', 'Sari Roti Tawar Kupas')->first()->id, ['harga' => 150000]);

        $client2 = Client::create(['nama' => 'PT Tigaraksa Satria']);
        $client2->products()->attach(Product::where('nama', 'Aqua Air Mineral 600ml')->first()->id, ['harga' => 52000]);
        $client2->products()->attach(Product::where('nama', 'Teh Pucuk Harum 350ml')->first()->id, ['harga' => 58000]);
        $client2->products()->attach(Product::where('nama', 'Susu Bear Brand 189ml')->first()->id, ['harga' => 285000]);
        $client2->products()->attach(Product::where('nama', 'Kopi Kenangan Mantancino 220ml')->first()->id, ['harga' => 202000]);
        $client2->products()->attach(Product::where('nama', 'SilverQueen Cashew 58g')->first()->id, ['harga' => 130000]);

        $client3 = Client::create(['nama' => 'PT Wicaksana Overseas International']);
        $client3->products()->attach(Product::where('nama', 'Pepsodent Pencegah Gigi Berlubang 190g')->first()->id, ['harga' => 550000]);
        $client3->products()->attach(Product::where('nama', 'Lifebuoy Sabun Cair Total 10 400ml')->first()->id, ['harga' => 294000]);
        $client3->products()->attach(Product::where('nama', 'Sunsilk Shampoo Black Shine 340ml')->first()->id, ['harga' => 415000]);
    }
}