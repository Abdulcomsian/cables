<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BroadbandProvider;
class BroadbandProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 =  BroadbandProvider::create([
            'name' => 'Virgin'
        ]);

        $user2 =  BroadbandProvider::create([
            'name' => 'Sky',
        ]);

        $user3 =  BroadbandProvider::create([
            'name' => 'BT'

        ]);
    }
}
