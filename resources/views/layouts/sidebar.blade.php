 <!-- Navegación lateral -->
 <aside class="bg-gray-800 text-white w-64 h-100vh p-4" style="height: 84.2vh;">
     <nav>
         <ul class="space-y-2">
             <li class="opcion-con-desplegable">
                 <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                     <div class="flex items-center">
                         <i class="fas fa-calendar-alt mr-2"></i>
                         <span>Usuarios y Autentificacion</span>
                     </div>
                     <i class="fas fa-chevron-down text-xs"></i>
                 </div>
                 <ul class="desplegable ml-4 hidden">
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Visualizar Vitacora
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('register') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Registrar Usuario
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('login') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Iniciar Sesion
                         </a>
                     </li>
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Cerrar Sesion
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('roles.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Permisos
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('empleados.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Empleado
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('clientes2.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Cliente
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="opcion-con-desplegable">
                 <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                     <div class="flex items-center">
                         <i class="fas fa-money-bill-wave mr-2"></i>
                         <span>Mascotas y Atencion Veterinaria</span>
                     </div>
                     <i class="fas fa-chevron-down text-xs"></i>
                 </div>
                 <ul class="desplegable ml-4 hidden">
                    <li>
                        <a href="{{ route('mascotas.rinicio') }}" class="p-2 hover:bg-gray-700 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                            Gestionar Mascota
                        </a>
                    </li>
                    <li class="ml-4">
                        <a href="#" class="p-2 hover:bg-gray-700 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                            Generar Historial Médico
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reservar.consultar', Auth::id()) }}"
                            class=" p-2 hover:bg-gray-700 flex items-center">
                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                            Consultar Reservas
                        </a>
                    </li>
                     <li class="ml-4">
                         <a href="{{ route('consulta.consultas')}}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Consulta
                         </a>
                     </li>
                     <li class="ml-8">
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Tratamiento de la Consulta
                         </a>
                     </li>
                     <li class="ml-8">
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Receta Medica
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('tratamientos.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Tratamiento
                         </a>
                     </li>

                     <li>
                         <a href="{{ route('servicios.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Servicio
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('reservar.inicio', Auth::id()) }}"
                             class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Reserva
                         </a>
                     </li>
                     
                 </ul>
             </li>
             <li class="opcion-con-desplegable">
                 <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                     <div class="flex items-center">
                         <i class="fas fa-chart-bar mr-2"></i>
                         <span>Inventario y Productos</span>
                     </div>
                     <i class="fas fa-chevron-down text-xs"></i>
                 </div>
                 <ul class="desplegable ml-4 hidden">
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Devolucion al Proveedor
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('proveedor.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Proveedor
                         </a>
                     </li>
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Producto
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('lotes.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Lote
                         </a>
                     </li>
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Categoria
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('marcas.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Marca
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="opcion-con-desplegable">
                 <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                     <div class="flex items-center">
                         <i class="fas fa-file-alt mr-2"></i>
                         <span>Ventas y Finanzas</span>
                     </div>
                     <i class="fas fa-chevron-down text-xs"></i>
                 </div>
                 <ul class="desplegable ml-4 hidden">
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Nota de Venta
                         </a>
                     </li>
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Realizar Recibo
                         </a>
                     </li>
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Realizar Factura
                         </a>
                     </li>
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Nota de Compra
                         </a>
                     </li>
                     <li>
                         <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                             <i class="fas fa-chevron-right mr-2 text-xs"></i>
                             Gestionar Pago
                         </a>
                     </li>
                 </ul>
             </li>
             <!-- Agrega más enlaces para la navegación lateral -->
         </ul>
     </nav>
 </aside>
