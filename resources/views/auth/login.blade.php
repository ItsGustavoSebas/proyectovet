<x-guest-layout>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <body>
        <section class="min-h-screen flex items-stretch text-white ">
            <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center">
                <img src='build/imagenes/utilitarios/login.jpg'>
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0"
                style="background-color: rgb(24, 24, 24);">
                <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center"
                style="background-image: {{asset('build/imagenes/utilitarios/logo.png')}}">
                    <img src="{{ asset('build/imagenes/utilitarios/login1.jpg') }}">
                    <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
                </div>
                <div class="w-full py-6 z-20">
                    <div align="center">
                        <img src="{{ asset('build/imagenes/utilitarios/logo.png') }}" alt="logo" width="250" class="rounded-3xl"/>
                    </div>
                    <form class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="pb-2 pt-4">
                            <input type="email" name="email" id="email" placeholder="Ingrese su correo"
                                class="block w-full p-4 text-lg rounded-lg bg-black">
                        </div>
                        <div class="pb-2 pt-4">
                            <input class="block w-full p-4 text-lg rounded-lg bg-black" type="password" name="password"
                                id="password" placeholder="Ingrese su contraseña ">
                        </div>
                        <div class="text-right text-gray-400 hover:underline hover:text-gray-100">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Has olvidado tu contraseña?</a>
                            @endif

                        </div>
                        <div class="px-4 pb-2 pt-4">
                            <button
                                class="uppercase block w-full p-4 text-lg rounded-full bg-indigo-500 hover:bg-indigo-600 focus:outline-none">
                                Iniciar sesión</button>
                        </div>

                        <hr class = "my-6 border-gray-300 w-full">

                        @if (Route::has('register'))
                            <p class ="mt-8">¿Necesitas una cuenta? <a href="{{ route('register') }}"
                                    class ="text-blue-500 hover:text-blue-700 font-semibold">Create una</a></p>
                        @endif

                </div>
                </form>
            </div>
            </div>
        </section>
    </body>

</x-guest-layout>
