<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA CARNES FRIAS',
            'precio' => 150,
            'ingredientes' => 'Salami, pepperonni, jamón, finas hierbas',
            'urlImagen' => 'imagenes/Pizzas/Carnes-frias-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA DELUXE',
            'precio' => 160,
            'ingredientes' => 'Pepperoni, carne molida, champiñones, pimiento cebolla',
            'urlImagen' => 'imagenes/Pizzas/Deluxe-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA 4 QUESOS',
            'precio' => 105,
            'ingredientes' => '>Queso mozzarella, queso crema, queso cheddar, queso parmesano',
            'urlImagen' => 'imagenes/Pizzas/Cuatro-quesos-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA HONOLULU',
            'precio' => 120,
            'ingredientes' => 'Jamón, tocino, piña, jalapeño',
            'urlImagen' => 'imagenes/Pizzas/Honolulu-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA HAWAIANA',
            'precio' => 130,
            'ingredientes' => 'Jamón, piña',
            'urlImagen' => 'imagenes/Pizzas/Hawaiana-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA EXTRAVAGANZZA',
            'precio' => 180,
            'ingredientes' => 'Pepperoni, carne molida, jamón, chorizo, pimiento, cebolla, champiñones',
            'urlImagen' => 'imagenes/Pizzas/Extravaganzza-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA PEPPERONI ESPECIAL',
            'precio' => 150,
            'ingredientes' => '164 gr de pepperoni, champiñones, extra queso',
            'urlImagen' => 'imagenes/Pizzas/Pepperoni-Especial-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA CHIKEN HAWAIANA',
            'precio' => 145,
            'ingredientes' => 'Pollo, tocino, piña, salsa mango habanero',
            'urlImagen' => 'imagenes/Pizzas/Chicken-Hawaianna-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA MEXICANA',
            'precio' => 135,
            'ingredientes' => 'Chorizo, carne molida, jalapeño, cebolla',
            'urlImagen' => 'imagenes/Pizzas/Mexicana-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PALITOS MOTZARELA',
            'precio' => 65,
            'ingredientes' => 'Palitos de queso motzarella',
            'urlImagen' => 'imagenes/Pizzas/Palitos.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA VOGGIO',
            'precio' => 115,
            'ingredientes' => 'Pimiento, champiñones, aceitunas, cebolla',
            'urlImagen' => 'imagenes/Pizzas/Veggie-compressor.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PAPOTAS',
            'precio' => 45,
            'ingredientes' => 'Papas con sasonador y aderesos',
            'urlImagen' => 'imagenes/Pizzas/Papotas.png'
        ]);
        DB::table('pizzas')->insert([
            'nombre' => 'PIZZA DE PEPPERONI',
            'precio' => 125,
            'ingredientes' => 'La tradicional pizza de pepperoni',
            'urlImagen' => 'imagenes/Pizzas/pizza-peperonni.png'
        ]);
    }
}
