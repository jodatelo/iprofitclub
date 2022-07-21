<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'id' => '1','parent' => '0','nombre' => 'Escritorio','user_id' => '1',
            'icono' => 'las la-tachometer-alt','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '#'
        ]);
        Menu::create([
            'id' => '2','parent' => '1','nombre' => 'Mi Escritorio','user_id' => '1',
            'icono' => '','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '/home'
        ]);
        Menu::create([
            'id' => '3','parent' => '0','nombre' => 'Pólizas','user_id' => '1',
            'icono' => 'las la-briefcase','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '#'
        ]);
        Menu::create([
            'id' => '4','parent' => '3','nombre' => 'Mis Pólizas','user_id' => '1',
            'icono' => '','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '/polizas'
        ]);
        /*Menu::create([
            'id' => '5','parent' => '0','nombre' => 'Intercambios','user_id' => '1',
            'icono' => 'lar la-newspaper','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '#'
        ]);
        Menu::create([
            'id' => '6','parent' => '5','nombre' => 'Mis intercambio','user_id' => '1',
            'icono' => '','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '/intercambios'
        ]);*/
        Menu::create([
            'id' => '5','parent' => '0','nombre' => 'Patrocinio','user_id' => '1',
            'icono' => 'las la-folder-plus','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '#'
        ]);
        Menu::create([
            'id' => '6','parent' => '5','nombre' => 'Mis patrocinio','user_id' => '1',
            'icono' => '','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '/patrocinios'
        ]);
        Menu::create([
            'id' => '7','parent' => '0','nombre' => 'Finanzas','user_id' => '1',
            'icono' => 'lab la-delicious','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '#'
        ]);
        Menu::create([
            'id' => '8','parent' => '7','nombre' => 'Mis Finanzas','user_id' => '1',
            'icono' => '','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '/finanzas'
        ]);
        /*Menu::create([
            'id' => '9','parent' => '0','nombre' => 'Soporte','user_id' => '1',
            'icono' => 'las la-pencil-ruler','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '#'
        ]);
        Menu::create([
            'id' => '10','parent' => '9','nombre' => 'Mis tickets','user_id' => '1',
            'icono' => '','status' => '1','created_at' => '2022-07-19 19:02:46',
            'updated_at' => '2022-07-19 19:02:46','link' => '/soporte'
        ]);*/
    }
}
