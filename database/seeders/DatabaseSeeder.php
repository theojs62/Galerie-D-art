<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Visitor;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Ajouter les données dans l'application.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory([
            'name_user' => "Sebastien Coze",
            'mail_user' => "sebastien.coze@domain.fr",
            'email_verified_at' => now(),
            'password_user' => Hash::make('secret80'),
            'admin_user' => false,
            'remember_token' => Str::random(10),
        ])->create();

        User::factory([
            'name_user' => "Matteo Guiffroy",
            'mail_user' => "matteo.guiffroy@domain.fr",
            'email_verified_at' => now(),
            'password_user' => Hash::make('secret40'),
            'admin_user' => false,
            'remember_token' => Str::random(10),
        ])->create();
        User::factory(10)->create();
        $this->call(ArtworksSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(CreateSeeder::class);
        $this->call(VisitorSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(CommentarySeeder::class);
    }
}
