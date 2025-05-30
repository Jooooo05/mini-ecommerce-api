<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [];

        for ($i = 1; $i <= 10; $i++) {
            $items[] = [
                'name' => 'Item ' . $i,
                'price' => rand(1000, 100000) / 100, // harga acak antara 10.00 - 1000.00
                'description' => Str::random(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('items')->insert($items);
    }
}
