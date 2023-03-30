<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visitor;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create('fr_FR');
        $users = User::all();
        foreach ($users as $user)
        {
            if (!$user->admin_user)
            {
                Visitor::factory([
                    'firstname_visitor' => $user->name_user,
                    'lastname_visitor' => $faker->lastName(),
                    'link_avatar' => 'https://forum.pcastuces.com/img/efa5cf51c0711fafc61e73f90e05bc12.png',
                    'user_id' => $user->id
                ])->create();
            }
        }
    }
}
