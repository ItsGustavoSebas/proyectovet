<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de tratamientos</title>

    <style>
        body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 20px;
    }
    .certificate {
      background-color: #fff;
      max-width: 600px;
      margin: 0 auto;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    td.empty-cell {
  width: 90px; /* Ancho deseado */
}
td.cell-cell {
  width: 70px; /* Ancho deseado */
}
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .header h1 {
      margin: 0;
      font-size: 28px;
      color: #333;
    }
    .animal-details {
      margin-bottom: 20px;
    }
    .animal-details p {
      margin: 5px 0;
      font-size: 18px;
      color: #555;
    }
    .vaccines {
      margin-bottom: 20px;
    }
    .vaccines h2 {
      margin-bottom: 10px;
      font-size: 24px;
      color: #333;
    }
    .vaccine-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px;
    }
    .vaccine-item span {
      font-size: 16px;
      color: #444;
    }
    .footer {
      text-align: center;
      color: #888;
    }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 13px;
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
    <div class="certificate">
        <div class="header">
          <h1>Certificado de Tratamientos-Vacunas</h1>
        </div>
        <div class="animal-details">
          <p><strong>Nombre:</strong> {{$mascota->nombre}} </p>
          <p><strong>Especie:</strong> {{$mascota->especie->nombre}} </p>
          <p><strong>Raza:</strong> {{$mascota->raza->nombre}} </p>
          <p><strong>Propietario:</strong>  {{$mascota->dueño->name}} </p>
        </div>
        <div class="vaccines">
          <h2>Tratamientos Recibidos</h2>
        </div>
        
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Tratamiento</th>
                <th>Prox.Visita</th>
                <th>Firma</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tratamientos_consulta as $tratamiento_consulta)
                <tr>
                    <td class="cell-cell">{{ $tratamiento_consulta->fecha}}</td>
                    <td>{{ $tratamiento_consulta->tratamientoMascota->tratamiento->descripcion }}</td>
                    <td class="cell-cell">{{ $tratamiento_consulta->tratamientoMascota->SiguienteVisita }}</td>
                    <td class="empty-cell"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p>Este certificado atestigua que los tratamientos mencionados han sido administradas correctamente.</p>
        <p>&copy; 2023 Agro-Vetrinaria La Hacienda</p>
      </div>
    </div>
</body>

</html>