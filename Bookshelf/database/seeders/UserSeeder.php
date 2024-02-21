<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "Yuri Wada",
                "email" => "yuri.wadah@gmail.com",
                "password" => Hash::make("214504"),
            ]
        ];

        foreach ($users as $u) {
            $user = User::firstOrNew(["email" => $u["email"]]);
            $user->fill($u);
            $user->save();
        }
    }
}
