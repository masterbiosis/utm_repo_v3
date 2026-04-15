<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make(12345678);
        $user->rol = 1; //1. admin 2. Tutor 3. Alumnno
        $user->save();

        $this->call([
            CarreraSeeder::class,
            SubdirectorSeeder::class,
            DirectortesiSeeder::class,
            AlumnoSeeder::class,
            ProgramaSeeder::class,
            LineaSeeder::class,
        ]);
    }
}
