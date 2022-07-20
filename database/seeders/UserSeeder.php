<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*User::create([
            'id' => '1','name' => 'admin','email' => 'info@iprofit.club','dni' => '0999',
            'password' => '$2y$10$ICyM4YErR71e/n4KFB9WkO2ZYjR5wzQSCIqWgu1HbwGQo57TV0RhO',
            'avatar'=>'avatar-1.jpg', 'created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);*/
        User::create([
            'id' => '2','name' => 'admin@admin.com','email' => 'admin@admin.com','dni' => '0999888',
            'password' => '$2y$10$HX1nLf4g1iDvL3aE7QNdq.y8ka0HMYFvyPUx6l9AAX5bEgMSS/KKK',
            'avatar'=>'avatar-1.jpg', 'created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
    }
}
