<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo_transaccion;

class TipoTransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_transaccion::create([
            'id' => '1','nombre' => 'COMPRA','tipomov' => '1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '2','nombre' => 'VENTA','tipomov' => '-1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '3','nombre' => 'POLIZA','tipomov' => '-1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '4','nombre' => 'SPONSORSHIP','tipomov' => '1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '5','nombre' => 'TRANSFERENCIA','tipomov' => '-1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '6','nombre' => 'INTERESES','tipomov' => '1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '7','nombre' => 'ENVIO','tipomov' => '-1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '8','nombre' => 'RECIBIDO','tipomov' => '1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '9','nombre' => 'INVERSION POLIZA','tipomov' => '1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
        Tipo_transaccion::create([
            'id' => '10','nombre' => 'GANANCIA POLIZA','tipomov' => '1','user_id' => '1',
            'isDeleted' => 0,'status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46',
        ]);
    }
}
