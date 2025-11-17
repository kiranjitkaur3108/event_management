<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TeamMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('team_members')->insert([
            [
                'name' => 'Nidhi Sharma',
                'role' => 'Event Designer',
                'avatar' => 'avatars/nidhi.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kiranjit Kaur',
                'role' => 'Event Coordinator',
                'avatar' => 'avatars/kiranjit.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sarita',
                'role' => 'Decoration Specialist',
                'avatar' => 'avatars/sarita.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sonali',
                'role' => 'Client Manager',
                'avatar' => 'avatars/sonali.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bhakti',
                'role' => 'Logistics Manager',
                'avatar' => 'avatars/bhakti.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
]);
}
}
