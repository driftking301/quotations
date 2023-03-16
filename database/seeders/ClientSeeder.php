<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = fake();
        $client = [
            ['name' => $fake->name(), 'description' => $fake->company(), 'notes' => $fake->realText()],
            ['name' => $fake->name(), 'description' => $fake->company(), 'notes' => $fake->realText()],
            ['name' => $fake->name(), 'description' => $fake->company(), 'notes' => $fake->realText()],
            ['name' => $fake->name(), 'description' => $fake->company(), 'notes' => $fake->realText()],
            ['name' => $fake->name(), 'description' => $fake->company(), 'notes' => $fake->realText()],
        ];
        DB::table('clients')->insert($client);
    }
}
