<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipopago;


class TipopagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipopago::create([
            'id' => '1','nombre' => 'TRANSFERENCIA BANCARIA','user_id' => '1',
            'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46'
        ]);
        Tipopago::create([
            'id' => '2','nombre' => 'USDT','user_id' => '1',
            'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46'
        ]);
        Tipopago::create([
            'id' => '3','nombre' => 'BTC','user_id' => '1',
            'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46'
        ]);
    }
}
