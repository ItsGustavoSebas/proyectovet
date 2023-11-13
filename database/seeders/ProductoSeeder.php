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
        Producto::create([
            'nombre' => 'Pienso para perros',
            'precioVenta' => 15.99,
            'descripcion' => 'Comida balanceada para perros, marca Hill\'s Science Diet.',
            'ID_Categoria' => 1, 
            'ID_Marca' => 1, 
        ]);

        Producto::create([
            'nombre' => 'Comida para gatos',
            'precioVenta' => 15.99,
            'descripcion' => 'Comida balanceada para perros, marca Hill\'s Science Diet.',
            'ID_Categoria' => 1, // ID de la categoría de Alimentación
            'ID_Marca' => 2, 
        ]);

        Producto::create([
            'nombre' => 'Shampoo para gatos',
            'precioVenta' => 8.99,
            'descripcion' => 'Shampoo suave para gatos, marca Purina.',
            'ID_Categoria' => 3, 
            'ID_Marca' => 3, 
        ]);
    }
}
