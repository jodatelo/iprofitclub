<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(TipopagoSeeder::class);
        $this->call(TipoTransaccionSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(BalancesSeeder::class);
        $this->call(BancoSeeder::class);
    }
}
