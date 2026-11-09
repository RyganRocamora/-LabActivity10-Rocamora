<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        // 1 Author created manually
        Author::create([
            'name' => 'Kagawad Firstname Rocamora',
            'position' => 'Kagawad',
            'email' => 'kagawad.rocamora@bulletin.test',
        ]);

        // 4 factory authors
        Author::factory()->count(4)->create();
    }
}