<?php

namespace Database\Seeders;

use App\Models\Servicio;
use App\Models\TipoServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoServicios = TipoServicio::pluck('id');
        $servicios = [
            //nro 1
            [
                'nombre' => 'Clases de yoga',
                'descripcion' => 'clases grupales de yoga',
                'estado' => 'Activo',
                'tipo_servicio_id' => 1,
                //'tipo_servicio_id' => $tipoServicios->random(),

            ],
            //nro 2
            [
                'nombre' => 'Alquiler de canchas',
                'descripcion' => 'fjsdakfjasdlkfjklasdjfkasfjl',
                'estado' => 'Inactivo',

                'tipo_servicio_id' => 2,

            ],
            //nro 3
            [
                'nombre' => 'Entrenamiento personal',
                'descripcion' => 'fjasdkfljsdlkfjskldfjklsajf',
                'estado' => 'Activo',

                'tipo_servicio_id' => 3,

            ],
            //nro 4
            [
                'nombre' => 'Clases de natacion',
                'descripcion' => 'fjsdklfjsdklfjsdlñkfjasf',
                'estado' => 'Activo',

                'tipo_servicio_id' => 1,

            ],
            //nro 5
            [
                'nombre' => 'Acceso al gimnasio',
                'descripcion' => 'asfskfksadlfkasdñflñsdk',
                'estado' => 'Activo',

                'tipo_servicio_id' => 4,

            ],
            //EXTRAS
            //nro 6
            [
                'nombre' => 'Clases grupales de fitness',
                'descripcion' => 'aerobicos,zumbas,pilates,yoga',
                'estado' => 'Inactivo',

                'tipo_servicio_id' => 1,

            ],
            //nro 7
            [
                'nombre' => 'Entrenamiento de fuerza',
                'descripcion' => 'fadsfjsakljfklasdj',
                'estado' => 'Activo',

                'tipo_servicio_id' => 7,

            ],
            //nro 8
            [
                'nombre' => 'Piscina',
                'descripcion' => 'natacion,entrenamiento acuatico',
                'estado' => 'Activo',

                'tipo_servicio_id' => 9,

            ],
            //nro 9
            [
                'nombre' => 'Canchas deportivas',
                'descripcion' => 'tenis,baloncesto,futbol',
                'estado' => 'Activo',

                'tipo_servicio_id' => 4,

            ],
            //nro 10
            [
                'nombre' => 'Clases de artes marciales',
                'descripcion' => 'karate,judo,taekwondo',
                'estado' => 'Activo',

                'tipo_servicio_id' => 10,

            ],
            //nro 11
            [
                'nombre' => 'Spa y masajes deportivos',
                'descripcion' => 'jfklasdjfklsdjfklsdjalñfj',
                'estado' => 'Activo',

                'tipo_servicio_id' => 7,

            ],
            //nro 12
            [
                'nombre' => 'Actividades al aire libre',
                'descripcion' => 'senderismo,ciclismo,carreras',
                'estado' => 'Activo',

                'tipo_servicio_id' => 11,

            ],
             //nro 13
             [
                'nombre' => 'Nutricion y asesoramiento',
                'descripcion' => 'jfaksdljlfsdaklfasdjfklafa',
                'estado' => 'Activo',

                'tipo_servicio_id' => 8,

            ],
            //nro 14
            [
                'nombre' => 'Rehabilitacion y fisioterapia',
                'descripcion' => 'jfaksdljlfsdaklfasdjfklafa',
                'estado' => 'Activo',

                'tipo_servicio_id' => 8,

            ],


        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }
    }
}
