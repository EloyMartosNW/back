<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        //DB::table('users')->insert([
        //    'last_name' => 'Famlyer',
        //    'email' => 'admin@famlyer.com',
        //    'phone' => '12345678',
        //    'password' => Hash::make('12345678'),
        //        
        //    'name'=>'admin',
        //    'is_provider'=>false,
        //    'phone'=>'123456789',
        //    'nationality'=>'Spain',
        //    'actual_country'=>'Spain',
        //    'actual_location'=>'Madrid',
        //    'description'=>'I am the admin',
        //    'personal_url'=>'',
        //    'provider_id'=>null,
        //]);
    }
}
