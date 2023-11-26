<div>
    {!! Form::model($rol, ['route' => ['roles.actualizar', $rol->id], 'method' => 'post', 'autocomplete' => 'off']) !!}
    @csrf
    <div class="bg-gradient-to-r from-indigo-700 to-indigo-950 p-8">
        <!-- Cuadro exterior con fondo azul marino y relleno de 8 unidades -->
        <div class="bg-gray-100 p-4 overflow-hidden shadow-xl sm:rounded-lg m-5 ">
            <div class= "text-center font-sans text-black font-bold text-3xl antialiased pb-10 mt-10">
                EDITAR ROL
            </div>
            <div>
                <label class="font-bold text-lg" for=""> Nombre</label>
                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-5">
                        <div class="flex">
                            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fa-solid fa-user text-gray-400 text-lg"></i>
                            </div>
                            <input id= "name" type="text" name="name"
                                class="w-1/2 -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                placeholder="Ingresar nombre" value="{{ $rol->name }}">
                            @error('name')
                                <strong class = "text-red-500">Debes ingresar el nombre</strong>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <h1 class="font-bold">Selecciona los permisos:</h1>

                    <br>

                    <div class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input placeholder="Buscar" wire:model="filtro"
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-1/4 bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>

                    <br>

                    <div>
                        @foreach ($permissions as $permission)
                            <label for= "{{ $permission->id }}">
                                {!!Form::checkbox('permissions[]', $permission->id, null,['class'=> 'mr-1'])!!}
                                {{ $permission->name }}
                            </label>
                            <br>
                        @endforeach
                    </div>

                    @error('permisos')
                        <strong class="text-red-500 font-bold">Ingresar al menos un Permiso</strong>
                    @enderror
                </div>

                <div class="flex -mx-3 pt-9">
                    <div class="w-full px-3 mb-5">
                        <button type ="submit" id="registrar"
                            class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">ACTUALIZAR
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
