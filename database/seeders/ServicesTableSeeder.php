<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Wedding',
                'description' => 'Celebrate your special day in elegance and style.',
                'price' => 200,
                'image' => 'wedding-ceremony.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Birthday',
                'description' => 'Make your birthday unforgettable with creative themes.',
                'price' => 100,
                'image' => 'birthday.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Corporate',
                'description' => 'Host professional conferences and meetings effortlessly.',
                'price' => 300,
                'image' => 'conference.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anniversary',
                'description' => 'Celebrate your love and milestones beautifully.',
                'price' => 150,
                'image' => 'anniversary.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baby Shower',
                'description' => 'Welcome your little one in warmth and joy.',
                'price' => 120,
                'image' => 'baby-shower.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Festival',
                'description' => 'Bring your community together with vibrant celebrations.',
                'price' => 250,
                'image' => 'festival.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}