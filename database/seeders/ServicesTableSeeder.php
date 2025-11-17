<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('services')->insert([

            // Weddings
            [
                'name' => 'Wedding Ceremonies',
                'category' => 'Weddings',
                'description' => 'Celebrate love with beautifully crafted wedding ceremonies.',
                'price' => 2500,
                'image' => 'images/wedding-ceremony.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Wedding Receptions',
                'category' => 'Weddings',
                'description' => 'Host grand receptions with stunning decor and themes.',
                'price' => 3500,
                'image' => 'images/wedding-reception.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Destination Weddings',
                'category' => 'Weddings',
                'description' => 'Plan your dream wedding in the most picturesque locations.',
                'price' => 5000,
                'image' => 'images/destination-wedding.avif',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Birthdays
            [
                'name' => "Kids' Parties",
                'category' => 'Birthdays',
                'description' => 'Fun-filled birthday parties with exciting games and themes.',
                'price' => 800,
                'image' => 'images/kids-party.png',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => "Teen Parties",
                'category' => 'Birthdays',
                'description' => 'Stylish and memorable celebrations for teens.',
                'price' => 1200,
                'image' => 'images/teen-party.jpeg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => "Adult Parties",
                'category' => 'Birthdays',
                'description' => 'Elegant and sophisticated birthday celebrations for adults.',
                'price' => 2000,
                'image' => 'images/adult-party.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Corporate Events
            [
                'name' => 'Team Building',
                'category' => 'Corporate',
                'description' => 'Foster team spirit with engaging activities and workshops.',
                'price' => 1800,
                'image' => 'images/team-building.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Product Launch',
                'category' => 'Corporate',
                'description' => 'Introduce your product in style with grand launch events.',
                'price' => 3000,
                'image' => 'images/product-launch.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Conferences',
                'category' => 'Corporate',
                'description' => 'Host professional conferences with expert arrangements.',
                'price' => 2700,
                'image' => 'images/conference.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Anniversaries
            [
                'name' => 'Anniversary Parties',
                'category' => 'Anniversaries',
                'description' => 'Celebrate love and milestones beautifully.',
                'price' => 1500,
                'image' => 'images/anniversary.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Anniversary Dinners',
                'category' => 'Anniversaries',
                'description' => 'Intimate dinners for couples to cherish special moments.',
                'price' => 1000,
                'image' => 'images/anniversary-dinner.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Surprise Celebrations',
                'category' => 'Anniversaries',
                'description' => 'Create unforgettable surprises for your loved ones.',
                'price' => 1800,
                'image' => 'images/anniversary-surprise.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Baby Showers
            [
                'name' => 'Baby Shower Parties',
                'category' => 'Baby Showers',
                'description' => 'Welcome your little one in warmth and joy.',
                'price' => 1200,
                'image' => 'images/baby-shower.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Gifting Events',
                'category' => 'Baby Showers',
                'description' => 'Special gifting moments for the newborn and family.',
                'price' => 900,
                'image' => 'images/baby-gift.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Fun Activities',
                'category' => 'Baby Showers',
                'description' => 'Games and activities to celebrate the upcoming arrival.',
                'price' => 700,
                'image' => 'images/baby-fun.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Festivals
            [
                'name' => 'Community Festivals',
                'category' => 'Festivals',
                'description' => 'Bring your community together with vibrant celebrations.',
                'price' => 3000,
                'image' => 'images/festival.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Food Festivals',
                'category' => 'Festivals',
                'description' => 'Celebrate cultural flavors with festive food events.',
                'price' => 2500,
                'image' => 'images/festival-food.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Music Festivals',
                'category' => 'Festivals',
                'description' => 'Enjoy lively music and entertainment for all ages.',
                'price' => 3500,
                'image' => 'images/festival-music.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ]);
    }
}
