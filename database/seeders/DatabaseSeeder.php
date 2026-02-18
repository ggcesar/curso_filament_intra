<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => hash::make('PS C:\laragon\www\curso-filamentphp-intranet> php artisan countries-states-cities:install
   
   ERROR  There are no commands defined in the "countries-states-cities" namespace.  

PS C:\laragon\www\curso-filamentphp-intranet> 




'),
        ]);
    }
}
