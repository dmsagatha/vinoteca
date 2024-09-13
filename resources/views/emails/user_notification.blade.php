<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviar Correos</title>
    <style>
      table {
        border-collapse: collapse;
      }

      table th {
        text-align: center;
      }

      table td,
      table th {
        border: 1px solid black;
        padding: 8px;
      }

      p {
        text-align: justify;
      }

      .p_inline {
        margin-inline: 2em;
        margin-left: 0cm;
      }

      .p_mailto {
        font-size: .8em;
      }
    </style>
  </head>
  <body>
    <div style="font-family: Georgia, serif;">
      <p>Cordial saludo {{ $user->name }}.</p>
      
      <p>
        Los siguientes periféricos están a su cargo en el sistema de inventario SABS, pero están siendo utilizados por . . . 
      </p>
      
      Nombre: {{ $user->name }} <br>
      Correo electrónico: {{ $user->email }} <br>
      Fecha de creación: {{ $user->created_at }}
    </div>
  </body>
</html>