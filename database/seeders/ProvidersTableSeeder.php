<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;
use Illuminate\Support\Str;
class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 =  Provider::create([
            'name' => 'Virgin',
            'uuid' => (string) Str::uuid(),
            'image' => 'Virgin_Media_logo_thunbnail.png'

        ]);

        $user2 =  Provider::create([
            'name' => 'Sky',
            'uuid' => (string) Str::uuid(),
            'image' => 'Sky_logo_thunbnail.png'
        ]);

        $user3 =  Provider::create([
            'name' => 'BT',
            'uuid' => (string) Str::uuid(),
            'image' => 'BT_logo_thunbnail.png'

        ]);
        $user4 =  Provider::create([
            'name' => 'EE',
            'uuid' => (string) Str::uuid(),
            'image' => 'EE_logo_thumbnail.png'

        ]);
        $user5 =  Provider::create([
            'name' => 'Hyperoptic',
            'uuid' => (string) Str::uuid(),
            'image' => 'Hyperoptic_logo_thumbnail.png'

        ]);
        $user6 =  Provider::create([
            'name' => 'NOW',
            'image' => 'NOW_Broadband_logo_thumbnail.png'

        ]);
        $user7=  Provider::create([
            'name' => 'Plusnet',
            'uuid' => (string) Str::uuid(),
            'image' => 'Plusnet_logo_thumbnail.png'

        ]);
        $user8 =  Provider::create([
            'name' => 'TalkTalk',
            'uuid' => (string) Str::uuid(),
            'image' => 'TalkTalk_logo_thumbnail.png'

        ]);
    }
}
