<x-app-layout>

 
    <div class="bg-gradient-to-r from-indigo-700 to-indigo-950 p-8">
        <!-- Cuadro exterior con fondo azul marino y relleno de 8 unidades -->
        <div class="bg-gray-100 p-4 overflow-hidden shadow-xl sm:rounded-lg m-5 ">
            <div class= "text-center font-sans text-black font-bold text-3xl antialiased pb-10 mt-10">
                EDITAR FACTURA
                
            </div>
         
            <form action="{{ route('facturas.actualizar', $factura->ID_Nota_Venta) }}"method="POST">
                @csrf
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-5">
                        <div>
                            <label class="font-bold text-lg" for="montoTotal">Monto total</label>
                            <div class="mt-2">
                                <input id="montoTotal" name="montoTotal" type="integer"
                                    class="block w-full px-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500 bg-blue-100"
                                    value="{{ $factura->nota_venta->montoTotal }}">
                                @error('montoTotal')
                                    <strong class="text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
        
        
                        
                        <div>
                            <label class="font-bold text-lg" for="fecha">Fecha</label>
                            <div class="mt-2">
                                <input id="fecha" name="fecha" type="date"
                                    class="block w-full px-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500 bg-blue-100"
                                    value="{{ $factura->nota_venta->fecha }}">
                                @error('fecha')
                                    <strong class="text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <label class="font-bold text-lg" for="nroFactura">Nro Factura</label>
                            <div class="mt-2">
                                <input id="nroFactura" name="nroFactura" type="integer"
                                    class="block w-full px-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500 bg-blue-100"
                                    value="{{ $factura->nroFactura }}" placeholder="Ingresa su numero factura">
                                @error('nroFactura')
                                    <strong class="text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <label class="font-bold text-lg" for="nit">NIT</label>
                            <div class="mt-2">
                                <input id="nit" name="nit" type="integer"
                                    class="block w-full px-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500 bg-blue-100"
                                    value="{{ $factura->nit }}" placeholder="Ingresa el nit">
                                @error('nit')
                                    <strong class="text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                 
                  
                        
        
                    </div>
                           
                    <div class="flex justify-center mt-5 mb-5" >
                        <button type="submit" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg flex items-center">
                            <i class="fa-solid fa-floppy-disk mr-2"></i>
                            Guardar
                        </button>
                    </div>
                    
        
                </div>
                
            </form>
         

        </div>    

    </div>     



</x-app-layout>
