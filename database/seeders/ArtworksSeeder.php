<?php

namespace Database\Seeders;

use App\Models\Artwork;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create('fr_FR');
        Artwork::factory(20)->create();
    }
}
