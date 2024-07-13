<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::factory(1000)->create();

        Customer::factory()->create([
            'name' => 'João Paulo',
            'email' => 'joao.paulo@gmail.com'
        ]);
        
        User::factory()->create([
            'name' => 'Danilo Santos',
            'email' => 'danilocarsan@gmail.com',
        ]);
    }
}
