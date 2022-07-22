<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Balance;


class BalancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balance::create([
            'id' => '1','user_id' => '1','saldo' => '0.00','userupd_id' => '1',
             'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','isDeleted' => '0'
        ]);

        Balance::create([
            'id' => '2','user_id' => '2','saldo' => '0.00','userupd_id' => '1',
             'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','isDeleted' => '0'
        ]);
    }
}
