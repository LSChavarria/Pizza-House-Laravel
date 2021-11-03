<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sucursals')->insert([
            'nombre' => 'ANAHUAC',
            'telefono' => '01 (81)83 57 30 00',
            'direccion' => 'Av. Universidad #321, Col. Anahuac, 12345, Nuevo Leon, San Nicolas de los Garza',
            'apertura' => '2000-10-5',
            'urlMapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.365407774106!2d-100.31568763071002!3d25.72542700192842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x866294526f15d0a7%3A0x8c982757dda91d20!2sFCFM%20-%20Facultad%20de%20Ciencias%20F%C3%ADsico%20Matem%C3%A1ticas!5e0!3m2!1ses-419!2smx!4v1634957325231!5m2!1ses-419!2smx'
        ]);
        DB::table('sucursals')->insert([
            'nombre' => 'MOLINOS',
            'telefono' => '01 (81)83 50 30 30',
            'direccion' => 'Av. Chopo #123, Col.Molinos, 54321, Nuevo Leon, Apodaca',
            'apertura' => '2002-10-5',
            'urlMapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.366868506311!2d-100.31253335290849!3d25.725378674709077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x866294547f7586fd%3A0x27f26b408472aca3!2sRector%C3%ADa%20UANL!5e0!3m2!1ses-419!2smx!4v1634957374866!5m2!1ses-419!2smx'
        ]);
        DB::table('sucursals')->insert([
            'nombre' => 'LAS PUENTES',
            'telefono' => '01 (81)83 57 31 23',
            'direccion' => 'Av. Diamante #987, Col. Las Puentes, 56746, Nuevo Leon, San Nicolas de los Garza',
            'apertura' => '2014-10-5',
            'urlMapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.4431160013137!2d-100.31368133836688!3d25.722855966589037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86629453362b628f%3A0x4758ce0b56be25e7!2sEstadio%20Universitario!5e0!3m2!1ses-419!2smx!4v1634957416026!5m2!1ses-419!2smx'
        ]);
        DB::table('sucursals')->insert([
            'nombre' => 'FOMERREY',
            'telefono' => '01 (81)83 50 56 78',
            'direccion' => 'Av. Año Internacional #457, Col. Fomerrey, 53453, Nuevo Leon, Guadalupe',
            'apertura' => '2017-10-5',
            'urlMapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7190.904466389313!2d-100.35121080678722!3d25.689446787408045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x866295e238d8216b%3A0xd94f032c49e28724!2sFacultad%20de%20Medicina%20de%20la%20UANL!5e0!3m2!1ses-419!2smx!4v1634957472115!5m2!1ses-419!2smx'
        ]);
        
        DB::table('sucursals')->insert([
            'nombre' => 'TLAXCALA',
            'telefono' => '01 (81)83 50 34 56',
            'direccion' => 'Av. Real #264, Col. Apodaca, 34554, Nuevo Leon, Doctor Cos',
            'apertura' => '2012-10-5',
            'urlMapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7190.7585344550425!2d-100.35084602636118!3d25.69186385399231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662960a5f9413ed%3A0xb637ed077690f4b2!2sFacultad%20de%20Enfermer%C3%ADa%20UANL!5e0!3m2!1ses-419!2smx!4v1634957509734!5m2!1ses-419!2smx'
        ]);
        DB::table('sucursals')->insert([
            'nombre' => 'MOLINOS',
            'telefono' => '01 (81)83 50 30 30',
            'direccion' => 'Av. Chopo #123, Col.Molinos, 54321, Nuevo Leon, Apodaca',
            'apertura' => '2021-10-28',
            'urlMapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14390.932799005597!2d-100.28170780654682!3d25.613780414998974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x867cdb8e66b5e471%3A0x40e5c0d0b6886a1e!2sUANL%20Facultad%20de%20Econom%C3%ADa!5e0!3m2!1ses-419!2smx!4v1634957576598!5m2!1ses-419!2smx'
        ]);
    }
}
