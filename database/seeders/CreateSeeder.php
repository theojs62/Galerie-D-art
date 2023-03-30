<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\Author;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSeeder extends Seeder
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
        $authorIds = Author::all()->pluck('id');
        foreach ($artworks as $artwork)
        {
            $nb = $faker->numberBetween(1, count(Author::all()) / 6);
            $artwork->authors()->attach($faker->randomElements($authorIds, $nb));
        }
    }
}
