<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\User;
use App\Models\Visitor;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create('fr_FR');
        $artworks = Artwork::all();
        $visitorIds = Visitor::all()->pluck('id');
        foreach ($artworks as $artwork)
        {
            $nb = $faker->numberBetween(1, count(Visitor::all()) / 4);
            $artwork->visitors()->attach($faker->randomElements($visitorIds, $nb));
        }
    }
}
