<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href= "{{asset('build/imagenes/utilitarios/icono.png')}}">
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-..." crossorigin="anonymous">
    <style>
        @media (max-width: 600px) {
            /* Aplicar estilos solo si el ancho de la ventana es menor o igual a 600px */
            .show-on-small-screen {
                display: none;
            }
        }
    </style>

    <title>Inicio</title>
</head>

<body class="h-screen" style="background: #f9fafa">
    <div class="flex flex-col h-full">
        <div class="flex items-center justify-between " style="background: linear-gradient(to right, #4338ca, #1e1b4b); height: 80px;">
            <div style="width: 100%;">
                <!-- Contenido del primer div -->
                @include('navigation-menu')
            </div>

            <div style="width: 35%; position: absolute; top: 0; right: 0;">
                <ul class="flex items-center text-base text-white show-on-small-screen">
                    <li>
                        <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-white text-center sm:text-base"
                            href="https://api.whatsapp.com/send?phone=59172636967&amp;text=">
                            <span class="text-white pr-2"><i class="fab fa-whatsapp"></i></span><br>Whatsapp
                        </a>
                    </li>
                    <li>
                        <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-white text-center sm:text-base"
                            href="tel:+591-72636967">
                            <span class="text-white pr-2"><i class="fas fa-phone"></i></span><br>Llamar Ahora
                        </a>
                    </li>
                    <li>
                        <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-white text-center sm:text-base"
                            href="https://maps.google.com/maps/dir//Agro+Veterinaria+LA+HACIENDA+Av.+Grigot%C3%A1+222+Santa+Cruz+de+la+Sierra/@-17.7946679,-63.1891255,16z/data=!4m5!4m4!1m0!1m2!1m1!0x93f1e9856992bb23!8m2!3d-17.7946679!4d-63.1891255">
                            <span class="text-white pr-2"><i class="fas fa-map-marker-alt"></i></span><br>Como Llegar
                        </a>
                    </li>
                </ul>
            </div>
            

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
                                    <td class="pr-4  text-gray-800 w-1/2 text-sm  md:text-base">Lunes a Sábado:</td>
                                    <td class="text-sm text-gray-800 md:text-base w-1/2">8:00 a. m. – 7:30 p. m.</td>
                                </tr>
                                <tr class="pt-4">
                                    <td rowspan="2" class="pr-4 text-gray-800 w-1/2 text-sm  md:text-base">Domingo:</td>
                                    <td class="text-sm pt-4 text-gray-800 md:text-base w-1/2">8:00 a. m. –
                                        9:30 a. m.</td>
                                    <tr>
                                    <td class="text-sm text-gray-800 md:text-base w-1/2">2:00 p. m. –
                                        7:30 p. m.</td>
                                    </tr>
                                </tr>
                            </table>
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
                    <ul class="flex items-center text-base text-indigo-800 lg:invisible show-on-small-screen">
                        <li>
                            <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-indigo-400 text-center sm:text-base"
                                href="https://api.whatsapp.com/send?phone=59172636967&amp;text=">
                                <span class="text-indigo-800 pr-2"><i class="fab fa-whatsapp"></i></span><br>Whatsapp
                            </a>
                        </li>
                        <li>
                            <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-indigo-700 text-center sm:text-base"
                                href="tel:+591-72636967">
                                <span class="text-indigo-800 pr-2"><i class="fas fa-phone"></i></span><br>Llamar Ahora
                            </a>
                        </li>
                        <li>
                            <a class="lg:p-4 py-3 px-2 block border-b-2 border-transparent hover:border-indigo-400 text-center sm:text-base"
                                href="https://maps.google.com/maps/dir//Agro+Veterinaria+LA+HACIENDA+Av.+Grigot%C3%A1+222+Santa+Cruz+de+la+Sierra/@-17.7946679,-63.1891255,16z/data=!4m5!4m4!1m0!1m2!1m1!1s0x93f1e9856992bb23:0x410805351b81665c">
                                <span class="text-indigo-800 pr-2"><i class="fas fa-map-marker-alt"></i></span><br>Como Llegar
                            </a>
                        </li>
                    </ul>
                </div>

                <style>
                    @media (max-width: 600px) {
                        /* Aplicar estilos solo si el ancho de la ventana es menor o igual a 600px */
                        .show-on-small-screen {
                            display: flex;
                            justify-content: center;
                            position: fixed;
                            bottom: 0;
                            width: 100%;
                            background-color: #f5f8f8;
                            padding: 10px;
                        }
            
                        .show-on-small-screen li {
                            margin: 0 10px;
                        }
                    }
                </style>

            </div>
        </div>
    </div>
</body>

</html>
