<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $quote = [
            ['name' => 'Quote 1', 'client' => 'Cliente 1', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 2', 'client' => 'Cliente 2', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 3', 'client' => 'Cliente 3', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 4', 'client' => 'Cliente 4', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 5', 'client' => 'Cliente 5', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 6', 'client' => 'Cliente 6', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 7', 'client' => 'Cliente 7', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 8', 'client' => 'Cliente 8', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 9', 'client' => 'Cliente 9', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 10', 'client' => 'Cliente 10', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 11', 'client' => 'Cliente 11', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 12', 'client' => 'Cliente 12', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 13', 'client' => 'Cliente 13', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 14', 'client' => 'Cliente 14', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 15', 'client' => 'Cliente 15', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 16', 'client' => 'Cliente 16', 'date' => '2020/01/02', 'description' => 'description for quote'],
            ['name' => 'Quote 17', 'client' => 'Cliente 17', 'date' => '2020/01/02', 'description' => 'description for quote'],
        ];
        DB::table('quotations')->insert($quote);
    }
}
