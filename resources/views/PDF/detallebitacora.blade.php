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

    <h2>Detalles de la Bitacora {{$bitacora->id}}</h2>
    <h2>Bitacora de {{$bitacora->usuario}}</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID_Bitacora</th>
                <th>Accion</th>
                <th>Metodo</th>
                <th>Hora</th>
                <th>Tabla</th>
                <th>RegistroID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detbitacoras as $detbitacora)
                <tr>
                    <td>{{ $detbitacora->id }}</td>
                    <td>{{ $detbitacora->ID_Bitacora }}</td>
                    <td>{{ $detbitacora->accion }}</td>
                    <td>{{ $detbitacora->metodo }}</td>
                    <td>{{ $detbitacora->hora }}</td>
                    <td>{{ $detbitacora->tabla }}</td>
                    <td>{{ $detbitacora->registroId }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>