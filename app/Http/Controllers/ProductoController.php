<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Users;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function inicio($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $Productos = Producto::where('ID_Cliente', '=', $id)->get();
        return view('Productos.inicio', compact('Productos', 'usuario'));
    }

    public function rinicio()
    {
        $Productos =   Producto::all();
        return view('Productos.rinicio', compact('Productos'));
    }

    public function crear($id)
    {
        $usuario = $id;
        $categoria = Categoria::all();
        $marcas = Marca::all();
        return view('Productos.crear', compact('usuario', 'categoria', 'marca'));
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precioVenta' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'fechaVencimiento' => 'required',
        ]);
        $esterilizado = $request->has('esterilizado') ? true : false;
        if ($request->has('ID_Especie') && $request->input('ID_Especie') !== 'nueva') {
            $idEspecie = $request->input('ID_Especie');
        } else {
            $especie = new Especie();
            $especie->nombre = $request->input('nuevaEspecie');
            $especie->save();
            $idEspecie = $especie->id;
        }
        if ($request->has('ID_Raza') && $request->input('ID_Raza') !== 'nueva') {
            $idRaza = $request->input('ID_Raza');
        } else {
            $raza = new Raza();
            $raza->nombre = $request->input('nuevaRaza');
            $raza->descripcion = $request->input('descripcionRaza');
            $raza->save();
            $idRaza = $raza->id;
        }
        $historial = new Historial();
        $historial->peso = $request->peso;
        $historial->altura = $request->altura;
        $historial->observacion = $request->observacion;
        $historial->save();
        $Producto = new Producto();
        $Producto->nombre = $request->nombre;
        $Producto->sexo = $request->sexo;
        $Producto->color = $request->color;
        $Producto->fechaNacimiento = $request->fechaNacimiento;
        $Producto->edad = $request->edad;
        $Producto->esterilizado = $esterilizado;
        $Producto->ID_Cliente = $request->ID_Cliente;
        $Producto->ID_Especie = $idEspecie;
        $Producto->ID_Raza = $idRaza;
        $Producto->ID_Historial = $historial->id;
        $Producto->save();

        return redirect(route('Productos.inicio', $request->ID_Cliente))->with('creado', 'Producto añadida exitosamente');
    }

    public function editar($id)
    {
        $Producto = Producto::where('id', '=', $id)->first();
        $especies = Especie::all();
        $razas = Raza::all();
        return view('Productos.editar', compact('Producto', 'especies', 'razas'));
    }

    public function actualizar(REQUEST $request, $id)
    {
        $Producto = Producto::where('id', '=', $id)->first();
        $request->validate([
            'nombre' => 'required',
            'precioVenta' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'fechaVencimiento' => 'required',
        ]);
        $esterilizado = $request->has('esterilizado') ? true : false;
        if ($request->has('ID_Especie') && $request->input('ID_Especie') !== 'nueva') {
            $idEspecie = $request->input('ID_Especie');
        } else {
            $especie = new Especie();
            $especie->nombre = $request->input('nuevaEspecie');
            $especie->save();
            $idEspecie = $especie->id;
        }
        if ($request->has('ID_Raza') && $request->input('ID_Raza') !== 'nueva') {
            $idRaza = $request->input('ID_Raza');
        } else {
            $raza = new Raza();
            $raza->nombre = $request->input('nuevaRaza');
            $raza->descripcion = $request->input('descripcionRaza');
            $raza->save();
            $idRaza = $raza->id;
        }
        $historial = Historial::where('id', '=', $Producto->ID_Historial)->first();
        $historial->peso = $request->peso;
        $historial->altura = $request->altura;
        $historial->observacion = $request->observacion;
        $historial->save();
        $Producto->nombre = $request->nombre;
        $Producto->sexo = $request->sexo;
        $Producto->color = $request->color;
        $Producto->fechaNacimiento = $request->fechaNacimiento;
        $Producto->edad = $request->edad;
        $Producto->esterilizado = $esterilizado;
        $Producto->ID_Cliente = $request->ID_Cliente;
        $Producto->ID_Categoria = $idCategoria;
        $Producto->ID_Marcas = $idMarcas;
        $Producto->save();
        
        return redirect(route('Productos.inicio', $request->ID_Cliente))->with('actualizado', 'Producto actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $producto = Producto::where('id', '=', $id)->first();
        $nombre = $producto->nombre;
        $ID_Cliente = $producto->ID_Cliente;
        $Producto->delete();
        return redirect(route('Productos.inicio', $ID_Cliente))->with('eliminado', 'Producto ' . $nombre . ' eliminada exitosamente');
    }
}

