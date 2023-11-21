<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Producto::create([
            'nombre' => 'Pienso para perros',
            'precioVenta' => 15.99,
            'descripcion' => 'Comida balanceada para perros, marca Hill\'s Science Diet.',
            'cantidadGeneral' => 0,            
            'ID_Categoria' => 1,
            'ID_Marca' => 15,
        ]);
        //2
        Producto::create([
            'nombre' => 'Pienso para gatos',
            'precioVenta' => 12.99,
            'descripcion' => 'Comida balanceada para gatos, marca Royal Canin.',
            'cantidadGeneral' => 0,            
            'ID_Categoria' => 1,
            'ID_Marca' => 14,
        ]);
        //3
        Producto::create([
            'nombre' => 'Lata de comida húmeda para perros',
            'precioVenta' => 7.99,
            'descripcion' => 'Lata de comida húmeda para perros, marca Purina.',
            'cantidadGeneral' => 0,            
            'ID_Categoria' => 1,
            'ID_Marca' => 12,
        ]);
        //4
        Producto::create([
            'nombre' => 'Shampoo antipulgas para gatos',
            'precioVenta' => 9.99,
            'descripcion' => 'Shampoo especial para eliminar pulgas en gatos, marca VetMed.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 3,
            'ID_Marca' => 3,
        ]);
        //5
        Producto::create([
            'nombre' => 'Pelota resistente',
            'precioVenta' => 7.50,
            'descripcion' => 'Pelota de goma resistente para perros, ideal para juegos activos.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 4,
            'ID_Marca' => 5,
        ]);
        //6
        Producto::create([
            'nombre' => 'Collar de cuero para gatos',
            'precioVenta' => 12.99,
            'descripcion' => 'Collar elegante de cuero para gatos, ajustable y duradero.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 5,
            'ID_Marca' => 10,
        ]);
        //7
        Producto::create([
            'nombre' => 'Comida en lata para gatos',
            'precioVenta' => 5.75,
            'descripcion' => 'Comida húmeda para gatos, en lata de 400g, alta en nutrientes.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 1,
            'ID_Marca' => 2,
        ]);
        //8
        Producto::create([
            'nombre' => 'Arnés para conejos',
            'precioVenta' => 8.49,
            'descripcion' => 'Arnés ajustable para conejos, seguro y cómodo para paseos.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 5,
            'ID_Marca' => 8,
        ]);
        //9
        Producto::create([
            'nombre' => 'Snacks para aves - Mezcla de semillas',
            'precioVenta' => 4.25,
            'descripcion' => 'Snacks nutritivos para aves, mezcla de semillas de alta calidad.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 1,
            'ID_Marca' => 7,
        ]);
        //10
        Producto::create([
            'nombre' => 'Arena aglomerante para gatos',
            'precioVenta' => 11.99,
            'descripcion' => 'Arena de gran absorción y aglomerante para bandejas de gatos.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 3,
            'ID_Marca' => 9,
        ]);
        //11
        Producto::create([
            'nombre' => 'Cepillo de dientes para perros',
            'precioVenta' => 6.99,
            'descripcion' => 'Cepillo de dientes y pasta dental para la higiene dental de perros.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 3,
            'ID_Marca' => 6,
        ]);
        //12
        Producto::create([
            'nombre' => 'Acuario completo',
            'precioVenta' => 89.99,
            'descripcion' => 'Kit completo para acuario con filtro, calentador y decoraciones.',
            'cantidadGeneral' => 0,            
            'ID_Categoria' => 2,
            'ID_Marca' => 4,
        ]);
        //13
        Producto::create([
            'nombre' => 'Juguete para loros - Columpio de madera',
            'precioVenta' => 8.25,
            'descripcion' => 'Columpio de madera natural para loros, entretenimiento seguro.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 4,
            'ID_Marca' => 7,
        ]);
        //14
        Producto::create([
            'nombre' => 'Cama para conejos',
            'precioVenta' => 19.99,
            'descripcion' => 'Cama suave y cómoda para conejos, lavable y resistente.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 5,
            'ID_Marca' => 10,
        ]);
        //15
        Producto::create([
            'nombre' => 'Juguete para gatos - Caña con plumas',
            'precioVenta' => 3.99,
            'descripcion' => 'Caña con plumas para gatos, estimula el juego y la actividad.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 4,
            'ID_Marca' => 2,
        ]);
        //16
        Producto::create([
            'nombre' => 'Alimento para peces tropicales',
            'precioVenta' => 7.49,
            'descripcion' => 'Alimento en escamas para peces tropicales, nutrición completa.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 1,
            'ID_Marca' => 4,
        ]);
        //17
        Producto::create([
            'nombre' => 'Cepillo para gatos',
            'precioVenta' => 5.99,
            'descripcion' => 'Cepillo suave para gatos, ideal para el cuidado del pelaje.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 5,
            'ID_Marca' => 8,
        ]);
        //18
        Producto::create([
            'nombre' => 'Comedero para aves',
            'precioVenta' => 3.25,
            'descripcion' => 'Comedero para aves pequeñas, resistente y fácil de limpiar.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 5,
            'ID_Marca' => 7,
        ]);
        //19
        Producto::create([
            'nombre' => 'Camiseta para perros',
            'precioVenta' => 11.50,
            'descripcion' => 'Camiseta cómoda y transpirable para perros, varios tamaños.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 5,
            'ID_Marca' => 6,
        ]);
        //20
        Producto::create([
            'nombre' => 'Caja de transporte para gatos',
            'precioVenta' => 29.99,
            'descripcion' => 'Caja de transporte segura y cómoda para gatos, apropiada para viajes.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 5,
            'ID_Marca' => 3,
        ]);
        //21
        Producto::create([
            'nombre' => 'Hueso masticable para perros',
            'precioVenta' => 4.99,
            'descripcion' => 'Hueso masticable para perros, ayuda a la limpieza dental y entretiene.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 4,
            'ID_Marca' => 1,
        ]);
        //22
        Producto::create([
            'nombre' => 'Juguete para roedores - Laberinto',
            'precioVenta' => 15.25,
            'descripcion' => 'Laberinto de madera para roedores, fomenta la actividad y diversión.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 4,
            'ID_Marca' => 8,
        ]);
        //23
        Producto::create([
            'nombre' => 'Antiinflamatorio para perros y gatos',
            'precioVenta' => 20.99,
            'descripcion' => 'Medicamento antiinflamatorio para perros y gatos.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 2, 
            'ID_Marca' => 24, 
        ]);
        //24
        Producto::create([
            'nombre' => 'Antiparasitario para perros y gatos',
            'precioVenta' => 18.50,
            'descripcion' => 'Antiparasitario eficaz para perros y gatos.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 2,
            'ID_Marca' => 25, 
        ]);
        //25
        Producto::create([
            'nombre' => 'Analgésico para mascotas',
            'precioVenta' => 15.75,
            'descripcion' => 'Medicamento analgésico para aliviar dolores en mascotas.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 2, 
            'ID_Marca' => 26, 
        ]);
        //26
        Producto::create([
            'nombre' => 'Suplemento vitamínico para animales',
            'precioVenta' => 12.99,
            'descripcion' => 'Suplemento vitamínico para mantener la salud de animales.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 2,
            'ID_Marca' => 27, 
        ]);
        //27
        Producto::create([
            'nombre' => 'Jarabe expectorante para aves',
            'precioVenta' => 9.99,
            'descripcion' => 'Jarabe para ayudar en problemas respiratorios en aves.',
            'cantidadGeneral' => 0,
            'ID_Categoria' => 2, 
            'ID_Marca' => 28,
        ]);
    }
}
