<?php

namespace App\Http\Livewire\Servicios;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Servicio;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;


class ServiciosInicio extends Component

{
    
    use WithFileUploads;
    public $modalCrear = false;
    public $modalServicio = false;
    public $nombre,$descripcion,$precio,$ruta_imagen,$reservable;
    public $servicioActual=null;
    public $editarServicio = false;
    public $modoEdicion = false; 
    public $confirmacionEliminar = false;
    public $reservaExitosa = false;

    protected $rules=[
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required',
        'reservable' => 'required',
        'ruta_imagen' => 'sometimes|image',
        'servicioActual.nombre' => 'sometimes|required',
        'servicioActual.descripcion' => 'sometimes|required',
        'servicioActual.precio' => 'sometimes|required',
        'servicioActual.reservable' => 'sometimes|required',
        'servicioActual.ruta_imagen' => 'sometimes|image',

        
      
    ];




 


    public function crearServicio(){
       // dump('entro');
      $this->validate(); 
     
    
      $nombreImagen= time()  . '_' . $this->ruta_imagen->getClientOriginalName();
      $ruta=$this->ruta_imagen->storeAs('public/imagenes/utilitarios',$nombreImagen);
      $url = Storage::url($ruta);
      


      //crear servicio
       $servicio = Servicio::create([
       'nombre' => $this->nombre,
       'descripcion' => $this->descripcion,
       'precio' => $this->precio,
       'reservable' => $this->reservable,
       'ruta_imagen' => $url
     
       ]);

       $this->reservaExitosa = true;

       //Crear DetalleBitacora

       $bitacora_id = session('bitacora_id');

       if ($bitacora_id) {
           $bitacora = Bitacora::find($bitacora_id);

           $horaActual = now()->format('H:i:s');

           $bitacora->detalleBitacoras()->create([
               'accion' => 'Crear Servicio',
               'metodo' => request()->method(),
               'hora' => $horaActual,
               'tabla' => 'servicios',
               'registroId' => $servicio->id,
               'ruta'=> request()->fullurl(),
           ]);
       }
    
       $this->reset (['nombre','descripcion','precio','ruta_imagen', 'reservable', 'modalCrear']);
      
       
    }



    public function confirmarEliminar()
{
    $this->confirmacionEliminar = true;
}

public function cancelarEliminar()
{
    $this->confirmacionEliminar = false;
}





    public function eliminarServicio()
    {

        if ($this->confirmacionEliminar) {
            if ($this->servicioActual) {

                //Crear DetalleBitacora

                $bitacora_id = session('bitacora_id');

                if ($bitacora_id) {
                    $bitacora = Bitacora::find($bitacora_id);

                    $horaActual = now()->format('H:i:s');

                    $bitacora->detalleBitacoras()->create([
                    'accion' => 'Eliminar Servicio',
                    'metodo' => request()->method(),
                    'hora' => $horaActual,
                    'tabla' => 'servicios',
                    'registroId' => $this->servicioActual->id,
                    'ruta'=> request()->fullurl(),
                ]);

                // Elimina el servicio de la base de datos
                $this->servicioActual->delete();
       }
                // Limpia la variable de detalles y cierra el modal
                $this->servicioActual = null;
                $this->modalServicio = false;
       
                // Puedes agregar un mensaje de éxito o realizar otras acciones necesarias aquí
            }
        }
        // Restablece la variable de confirmación
        $this->confirmacionEliminar = false;
   
   
 
    }

    public function editarServicio()
    {
        $this->modoEdicion = true;
    }
    
    public function cancelarEdicion()
    {
        $this->modoEdicion = false;
    }

    public function guardarEdicion()
    {
    $this->servicioActual->save(); // Guarda los cambios en la base de datos
    $this->editarServicio = false; // Sal del modo de edición
    $this->modoEdicion = false;

    //Crear DetalleBitacora

    $bitacora_id = session('bitacora_id');

    if ($bitacora_id) {
        $bitacora = Bitacora::find($bitacora_id);

        $horaActual = now()->format('H:i:s');

        $bitacora->detalleBitacoras()->create([
            'accion' => 'Editar Servicio',
            'metodo' => request()->method(),
            'hora' => $horaActual,
            'tabla' => 'servicios',
            'registroId' => $this->servicioActual->id,
            'ruta'=> request()->fullurl(),
        ]);
    }
    }




    public function cargarDetallesServicio($servicioId)
    {
      //  dump('ID del servicio recibido: ' . $servicioId);
        $this->servicioActual = Servicio::find($servicioId);

        // Asegúrate de que el servicio sea válido antes de mostrar el modal
        if ($this->servicioActual) {
          
            $this->modalServicio = true;
        }


    }

    

    


    public function render()
    {
        $servicio = Servicio::all();
        $this->cantidadFilas = Servicio::count(); // Consulta para obtener la cantidad de filas
        $servicioActual = Servicio::all();
        
        
        
      
        return view('livewire.servicios.servicios-inicio', ['servicio' => $servicioActual]);



        
        
    }


    
}
