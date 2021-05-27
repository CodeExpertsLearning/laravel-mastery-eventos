<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Event};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)
                    ->has(
                        Event::factory(30)
                             ->hasPhotos(4)
                             ->hasCategories(3)
                    )
                    ->hasProfile()
                    ->create();
    }
}
