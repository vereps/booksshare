<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory(10)->create();

        \App\Models\User::factory(10)->unverified()->create();

        
        // \App\Models\User::factory(30)->create([
        //     'name' => 'Kiril',
        //     'password' => bcrypt('qwerty123'),
        // ]);

        // // https://laravel.com/docs/10.x/eloquent-factories#sequences
        // \App\Models\User::factory()->count(30)->state(new Sequence(
        //     fn (Sequence $sequence) => [
        //         'name' => 'Kiril-' . $sequence->index,
        //         'password' => bcrypt('qwerty123')
        //     ],
        // ))->create();
    }
}