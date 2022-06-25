<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Envio de correo</title>
  </head>
  <body>
    <h1>
        XAZE le desea compartir unos archivos para descargar
    </h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre de archivo</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i < count($name_file); $i++)
            <tr>
              <td> 
                <a href="{{ asset($path.'/'.$year_file[$i].'/'.$name_file[$i]) }}" target="_blank"> {{ $name_file[$i] }} </a>
              </td>
              <td> {{  $year_file[$i] }} </td>
            </tr>
          @endfor
           
        </tbody>
    </table>
    <a href="{{ asset('/admin/archivos/'.$email_id.'/download/selected' ) }}" class="btn btn-primary float-right mt-3 ml-md-1">Descargar todos los archivos</a>
  </body>
</html>