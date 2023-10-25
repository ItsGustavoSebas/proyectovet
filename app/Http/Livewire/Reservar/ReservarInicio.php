<?php

namespace App\Http\Livewire\Reservar;


use Livewire\Component;
use Carbon\Carbon; // Asegúrate de importar la clase Carbon para trabajar con fechas
use Livewire\WithFileUploads;
use App\Models\Cita;


class ReservarInicio extends Component
{
    use WithFileUploads;
    public $modalFecha = false;
    public $fechaProgramada, $fecha, $descripcion, $hora;
    public $horasReservadas = [];
    public $tipo;

    protected $listeners = ['obtenerHorasReservadas'];
    
    

    protected $rules=[
        'fechaProgramada' => 'required',
        'fecha' => 'required',
        'descripcion' => 'required',
        'hora' => 'required',
        'tipo' => 'required',
    
    ];


    public function actualizarTipo($nuevoTipo)
    {
        
        $this->tipo = $nuevoTipo;
    }

    public function confirmarFecha($fechaSelect)
    {
        $this->horasReservadas = $this->obtenerHorasReservadas($fechaSelect);
        dump($fechaSelect);
    }
    

    public function setHora($horaSeleccionada)
    {
        $this->hora = $horaSeleccionada;
    }


    
   

    public function mount()
    {
        $this->fecha = Carbon::now()->format('Y-m-d');
    }

    public function crearReserva($nuevoTipo)
    {
        
        
        $this->tipo = $nuevoTipo;
        $this->hora = substr($this->hora, 0, -6);
        
        $this->mount();
  

        $this->validate(); 




       
      Cita::create([
       'fecha' => $this->fecha,
       'descripcion' =>$this->descripcion,
       'fechaProgramada' =>$this->fechaProgramada,
       'hora' =>$this->hora,
       'tipo'=>$this->tipo
      ]);


      

      
      
      $this->reset (['fecha','descripcion','fechaProgramada','hora', 'tipo', 'modalFecha', 'horasReservadas']);

     

  
 
    }


    public function obtenerHorasReservadas($fechaProgramada)
    {
      //  dump($fechaProgramada);
        // Filtra todas las citas de la base de datos por la fechaProgramada proporcionada
        $citas = Cita::whereDate('fechaProgramada', $fechaProgramada)->get();
    
        // Inicializa un array para almacenar las horas reservadas
        $this->horasReservadas = [];
    
        // Itera sobre cada cita y extrae la hora
        foreach ($citas as $cita) {
            if ($cita->hora<>null)
            {
                $this->horasReservadas[] = $cita->hora;
               
            }
          
        }
    //    $this->emit('mostrar',$this->horasReservadas);
    
        return $this->horasReservadas;
    }
    
    

    

    


    

    public function render()
    {
        // $horasReservadas = $this->obtenerHorasReservadas($this->fechaProgramada);
     

     //   return view('livewire..reservar.reservar-inicio', ['horasReservadas' => $horasReservadas,]);
        return view('livewire..reservar.reservar-inicio');
    }
}
