<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function inicio()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return (view('3_Inventario_Y_Productos.productos.inicio', compact('productos', 'categorias', 'marcas')));
    }

    public function buscar(Request $request)
    {
        $terminoBusqueda = $request->input('busqueda');

        $productos = Producto::query()
            ->where('nombre', 'LIKE', '%' . $terminoBusqueda . '%')
            ->orWhereHas('categoria', function ($query) use ($terminoBusqueda) {
                $query->where('nombre', 'LIKE', '%' . $terminoBusqueda . '%');
            })
            ->orWhereHas('marca', function ($query) use ($terminoBusqueda) {
                $query->where('nombre', 'LIKE', '%' . $terminoBusqueda . '%');
            })
            ->get();
            return view('3_Inventario_Y_Productos.productos.inicio', compact('productos', 'terminoBusqueda'));
        // Resto del código para cargar la vista con los productos filtrados
    }

    public function crear()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('3_Inventario_Y_Productos.productos.crear', compact('marcas', 'categorias'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precioVenta' => 'required',
            'descripcion' => 'required',
            'ID_Categoria' => 'required',
            'ID_Marca' => 'required',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precioVenta = $request->precioVenta;
        $producto->descripcion = $request->descripcion;
        $producto->cantidadGeneral = 0;
        $producto->ID_Categoria = $request->ID_Categoria;
        $producto->ID_Marca = $request->ID_Marca;
        $producto->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear producto',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'producto',
                'registroId' => $producto->id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('productos.inicio'))->with('creado', 'producto añadido exitosamente');
    }

    public function editar($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('3_Inventario_Y_Productos.productos.editar', compact('producto', 'categorias', 'marcas'));
    }

    public function actualizar(Request $request, $id)
    {
        $producto = Producto::find($id);

        $request->validate([
            'nombre' => 'required',
            'precioVenta' => 'required',
            'descripcion' => 'required',
            'ID_Categoria' => 'required',
            'ID_Marca' => 'required',
        ]);
        $producto->nombre = $request->nombre;
        $producto->precioVenta = $request->precioVenta;
        $producto->descripcion = $request->descripcion;
        $producto->cantidadGeneral = 0;
        $producto->ID_Categoria = $request->ID_Categoria;
        $producto->ID_Marca = $request->ID_Marca;
        $producto->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar producto',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'producto',
                'registroId' => $producto->id,
                'ruta' => request()->fullurl(),
            ]);
        }
        return redirect(route('productos.inicio'))->with('actualizado', 'producto actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $Producto = Producto::where('id', '=', $id)->first();
        $nombre = $Producto->nombre;
        $Producto->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Producto',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'producto',
                'registroId' => $id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('productos.inicio'))->with('eliminado', 'Producto ' . $nombre . ' eliminado exitosamente');
    }
}
