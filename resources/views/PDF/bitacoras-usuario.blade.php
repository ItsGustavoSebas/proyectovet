<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Bitacora</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>

</head>

<body>

    <h2>Bitacoras de {{$usuario->name}}</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID_User</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>DireccionIp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bitacoras as $bitacora)
                <tr>
                    <td>{{ $bitacora->id }}</td>
                    <td>{{ $bitacora->ID_Usuario }}</td>
                    <td>{{ $bitacora->entrada }}</td>
                    <td>{{ $bitacora->salida }}</td>
                    <td>{{ $bitacora->usuario }}</td>
                    <td>{{ $bitacora->tipo }}</td>
                    <td>{{ $bitacora->direccionIp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>