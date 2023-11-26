<?php

namespace App\Http\Livewire\Reservar;

use App\Models\Bitacora;
use Livewire\Component;
use Carbon\Carbon; // Asegúrate de importar la clase Carbon para trabajar con fechas
use Livewire\WithFileUploads;
use App\Models\Cita;
use RealRashid\SweetAlert\Facades\Alert;


class ReservarInicio extends Component
{
    use WithFileUploads;
    public $modalFecha = false;
    public $fechaProgramada, $fecha, $descripcion, $hora;
    public $horasReservadas = [];
    public $tipo;
    public $fechaDevuelta="";
    public $horaActual;
    public $reservaExitosa = false;
    

    protected $listeners = ['obtenerHorasReservadas', 'getFechaSeleccionada', 'mount', 'getHoraActual'];
   


    
    

    protected $rules=[
        'fechaProgramada' => 'required',
        'fecha' => 'required',
        'descripcion' => 'required',
        'hora' => 'required',
        'tipo' => 'required',
        'ID_Cliente' => 'required',
    ];


    public function actualizarTipo($nuevoTipo)
    {
        
        $this->tipo = $nuevoTipo;
    }

    public function confirmarFecha($fechaSelect)
    {
        $this->horasReservadas = $this->obtenerHorasReservadas($fechaSelect);
        
    }
    

    public function setHora($horaSeleccionada)
    {
        $this->hora = $horaSeleccionada;
    }


    
   

    public function mount()
    {
        $this->fecha = Carbon::now()->format('Y-m-d');
        $this->emit('mostrar2',$this->fecha);
        return $this->fecha;
    }

    public function getHoraActual()
    {
        $this->horaActual = Carbon::now('UTC');
        $this->emit('mostrar3',$this->horaActual);
        return $this->horaActual;
    }

    public function crearReserva($nuevoTipo)
    {
        
        
        $this->tipo = $nuevoTipo;
        $this->hora = substr($this->hora, 0, -6);
        
        $this->mount();
  

        $this->validate(); 




       
      $cita = Cita::create([
       'fecha' => $this->fecha,
       'descripcion' =>$this->descripcion,
       'fechaProgramada' =>$this->fechaProgramada,
       'hora' =>$this->hora,
       'tipo'=>$this->tipo,
       'ID_Cliente' => $this->ID_Cliente,
       'activo' => true
      ]);


      //Crear DetalleBitacora

      $bitacora_id = session('bitacora_id');

      if ($bitacora_id) {
          $bitacora = Bitacora::find($bitacora_id);

          $horaActual = now()->format('H:i:s');

          $bitacora->detalleBitacoras()->create([
              'accion' => 'Crear Reserva',
              'metodo' => request()->method(),
              'hora' => $horaActual,
              'tabla' => 'citas',
              'registroId' => $cita->id,
              'ruta'=> request()->fullurl(),
          ]);
      }

  

      $this->reservaExitosa = true;

      $this->reset (['fecha','descripcion','fechaProgramada','hora', 'tipo', 'modalFecha', 'horasReservadas', 'fechaDevuelta', 'horaActual']);

 

     

  
 
    }





    public function obtenerHorasReservadas($fechaProgramada, $nuevoTipo)
    {
      //  dump($fechaProgramada);
        // Filtra todas las citas de la base de datos por la fechaProgramada proporcionada
        $citas = Cita::whereDate('fechaProgramada', $fechaProgramada)
        ->where('tipo', $nuevoTipo)
        ->get();

    
        // Inicializa un array para almacenar las horas reservadas
        $this->horasReservadas = [];
    
        // Itera sobre cada cita y extrae la hora
        foreach ($citas as $cita) {
            if ($cita->hora<>null)
            {
                $this->horasReservadas[] = $cita->hora;
               
            }
          
        }
     //   $this->emit('mostrar',$this->horasReservadas);
    
        return $this->horasReservadas;
    }

    public function getFechaSeleccionada($fechaElegida)
    {
         $this->fechaDevuelta="";
    //     $fechaElegida="2023-10-30";
        // $this->fechaDevuelta[0]=$fechaElegida;

        // $this->emit('mostrar',$this->fechaDevuelta);
        // return $this->fechaDevuelta;
     
         
        $this->fechaDevuelta = implode($fechaElegida);
    

    
        $this->emit('mostrar', $this->fechaDevuelta);
    
        return $this->fechaDevuelta;
        


    }


    

    

    


    
    public $ID_Cliente;
    public function render()
    {
        // $horasReservadas = $this->obtenerHorasReservadas($this->fechaProgramada);
     

     //   return view('livewire..reservar.reservar-inicio', ['horasReservadas' => $horasReservadas,]);
        return view('livewire..reservar.reservar-inicio');
    }
}
