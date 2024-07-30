<?php

namespace Database\Seeders;

use App\Models\Document;
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
        $user = User::create([
            "name" => "Admin Sipenrit",
            "birth" => "18 September 2015",
            "Pension" => "18 September 2068",
            "nrp" => "Ajendam V/Brawijaya",
            'rank' => "Letnan Satu",
            'role' => "admin",
            'active' => "active",
        ]);

        Document::create(['user_id' => $user->id]);
    }
}
