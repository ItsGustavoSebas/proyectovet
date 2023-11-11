<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-..." crossorigin="anonymous">
</head>

<body class="h-screen" style="background: #edf2f7;">
    <div class="flex flex-col h-full">
        <div class="flex items-center justify-between px-4 py-2 dark:bg-gray-900 bg-white border-b border-gray-500">
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}" class="items-center">
                    <img src="{{ asset('build/imagenes/utilitarios/logotransp.png') }}" alt="logo" width="100" />
                </a>
            </div>
            <ul class="flex items-center text-base text-gray-700">
                <li>
                    <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-indigo-400 text-center sm:text-base"
                        href="https://api.whatsapp.com/send?phone=59172636967&amp;text=">
                        <span class="text-indigo-400 pr-2"><i class="fab fa-whatsapp"></i></span><br>Whatsapp
                    </a>
                </li>
                <li>
                    <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-indigo-400 text-center sm:text-base"
                        href="tel:+591-72636967">
                        <span class="text-indigo-400 pr-2"><i class="fas fa-phone"></i></span><br>Llamar Ahora
                    </a>
                </li>
                <li>
                    <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-indigo-400 text-center sm:text-base"
                        href="https://maps.google.com/maps/dir//Agro+Veterinaria+LA+HACIENDA+Av.+Grigot%C3%A1+222+Santa+Cruz+de+la+Sierra/@-17.7946679,-63.1891255,16z/data=!4m5!4m4!1m0!1m2!1m1!1s0x93f1e9856992bb23:0x410805351b81665c">
                        <span class="text-indigo-400 pr-2"><i class="fas fa-map-marker-alt"></i></span><br>Como Llegar
                    </a>
                </li>
            </ul>
        </div>

        <div class="flex lg:flex-grow bg-white border-gray-300">
            <!-- Contenido principal -->
            <div class="lg:flex">
                <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                    <div class="lg:w-full">
                        <h2 class="text-3xl font-semibold text-gray-1000 md:text-5xl">AGRO VETERINARIA <br><span
                                class="text-indigo-600">LA HACIENDA</span></h2>
                        <p class="mt-2 text-sm text-gray-700 md:text-base">Estamos comprometidos con la salud de tu
                            mascota. Nuestra misión como veterinaria es proporcionar atención de alta calidad y
                            productos agrícolas para mascotas, promoviendo el bienestar de los cultivos y la salud de
                            las mascotas.</p>


                        <div class="mt-6">
                            <p class="font-bold text-sm text-gray-800 md:text-base">Horario de Atención:</p>
                            <table class="mt-2">
                                <tr>
                                    <td class="pr-4 text-sm text-gray-800 md:text-base w-1/2">Lunes a Sábado:</td>
                                    <td class="text-sm text-gray-800 md:text-base w-1/2">8:00 a. m. – 7:30 p. m.</td>
                                </tr>
                                <tr class="pt-4">
                                    <td rowspan="2" class="pr-4 pt-4 text-sm text-gray-800 md:text-base w-1/2">Domingo:</td>
                                    <td class="text-sm pt-4 text-gray-800 md:text-base w-1/2">8:00 a. m. –
                                        9:30 a. m.</td>
                                    <tr>
                                    <td class="text-sm text-gray-800 md:text-base w-1/2">2:00 p. m. –
                                        7:30 p. m.</td>
                                    </tr>
                                </tr>
                            </table>
                        </div>

                        <div class="flex justify-center lg:justify-start mt-4">
                            @if (Route::has('login'))
                                @auth
                                    <a class="px-3 py-2 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800"
                                        href="{{ url('/dashboard') }}">Dashboard</a>
                                @else
                                    <a class="px-3 py-2 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800"
                                        href="{{ route('login') }}">Log in</a>

                                    @if (Route::has('register'))
                                        <a class="px-3 py-2 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800 ml-2"
                                            href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Mapa -->
                <!-- Mapa (oculto en dispositivos pequeños) -->
                <div class="hidden lg:block lg:w-1/2">
                    <div class="h-full w-full lg:w-96 lg:h-96 object-cover">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3798.936892772939!2d-63.19170042422621!3d-17.794662775383788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e9856992bb23%3A0x410805351b81665c!2sAgro%20Veterinaria%20LA%20HACIENDA!5e0!3m2!1ses-419!2sbo!4v1699650543809!5m2!1ses-419!2sbo"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- Mapa (visible solo en dispositivos pequeños) -->
                <div class="lg:hidden">
                    <div class="h-full w-full object-cover">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3798.936892772939!2d-63.19170042422621!3d-17.794662775383788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e9856992bb23%3A0x410805351b81665c!2sAgro%20Veterinaria%20LA%20HACIENDA!5e0!3m2!1ses-419!2sbo!4v1699650543809!5m2!1ses-419!2sbo"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
