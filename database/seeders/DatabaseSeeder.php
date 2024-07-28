<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Event::insert([
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 1',
                'start' => '2021-04-02',
                'end' => null
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 2',
                'start' => '2021-04-10T08:00:00',
                'end' => '2021-04-10T16:00:00'
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Evenement 3',
                'start' => '2021-04-20',
                'end' => '2021-04-22'
            ],
        ]);
    }
}
