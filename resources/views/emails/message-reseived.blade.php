<html>
  <head>
    <title>Mensaje Enviado</title>

    <style>
      .container {
        padding: 20px;
        margin-left: 20px;
        margin-right: 20px;
      }
    </style>

  </head>
  <body>
    <div class="container">
      <p>Recibiste un mensaje de: {{ $msg['name'] }} - {{ $msg['email'] }} </p>
      <p><strong>Asunto: </strong>{{ $msg['subject'] }}</p>
      <p><strong>Contenido: </strong>{{ $msg['content'] }}</p>
    </div>
  </body>
</html>