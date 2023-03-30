<?php

namespace Database\Seeders;

use App\Models\Artwork;
use App\Models\Commentary;
use App\Models\User;
use App\Models\Visitor;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create('fr_FR');
        $visitors = Visitor::all();
        $artworkIds = Artwork::all()->pluck('id');
        foreach ($visitors as $visitor)
        {
            $nb = $faker->numberBetween(0, count($artworkIds));
            $awsIds = $faker->randomElements($artworkIds, $nb, false);
            foreach ($awsIds as $awsId)
            {
                Commentary::factory([
                    'title_commentary' => $faker->text(10),
                    'text_commentary' => $faker->text(),
                    'visitor_id' => $visitor->id,
                    'artwork_id' => $awsId
                ])->create();
            }
        }
    }
}
