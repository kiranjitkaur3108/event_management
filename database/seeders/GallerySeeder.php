<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::insert([
            [
                'event_name' => 'Wedding Celebration',
                'image_path' => 'images/wedding-ceremony.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Wedding Celebration',
                'image_path' => 'images/anniversary.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Wedding Celebration',
                'image_path' => 'images/destination-wedding.avif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Birthday Party',
                'image_path' => 'images/gallery-birthday.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Birthday Party',
                'image_path' => 'images/pexels-vlada-karpovich-7099924.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Corporate Event',
                'image_path' => 'images/conference.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Corporate Event',
                'image_path' => 'images/pexels-pavel-danilyuk-6405771.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Birthday Party',
                'image_path' => 'images/pexels-silvia-trigo-545701-1857157.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Festival',
                'image_path' => 'images/festival.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Festival',
                'image_path' => 'images/gallery-newyear.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Music Concert',
                'image_path' => 'images/pexels-roneferreira-2735037.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Birthday Party',
                'image_path' => 'images/pexels-fu-zhichao-176355-587741.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_name' => 'Music Concert',
                'image_path' => 'images/pexels-sebastian-ervi-866902-1763075.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}