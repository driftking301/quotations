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
        $client = [
            ['name' => 'Juan', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Pedro', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Daniel', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Mario', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'María', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Alberto', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Cristian', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Juana', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Mariana', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Fernanda', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Luisa', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Alicia', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Marcela', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Rocío', 'description' => 'description for client', 'notes' => 'notes for client'],
            ['name' => 'Arturo', 'description' => 'description for client', 'notes' => 'notes for client'],
        ];
        DB::table('clients')->insert($client);
    }
}
