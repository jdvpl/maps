<?php require 'education.php';
$edu = new education;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Access Google Maps API in PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



    <style type="text/css">
        #map {
            width: 100%;
            height: 100%;
            border: 1px solid blue;
            height: 650px;
        }

        #data,
        #Data {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="banner">
            <!-- Image and text -->
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="https://www.enticconfio.gov.co/sites/default/files/imagen-1.png" width="50" height="30" class="d-inline-block align-top" alt="">
                    Busqueda de instituciones
                </a>

                <a class="navbar-link" href="./php/update.php">
                    Datos
                </a>
            </nav>
        </div>

        <!-- INICIA EL ROW DE LSO SELECTS -->
        <div class="row my-3">

            <div class="col-md-3">
                <select name="departamento" id="departamento" class="form-select">
                    <option value="">Selecciona el Departamento</option>
                    <?php
                    $departamentos = $edu->getDepartamentos();
                    foreach ($departamentos as $v) {
                        if (!isset($departamentos[$v["departamento"]])) { ?>
                            <option value="<?php echo $v['departamento']; ?>" id="<?php echo $v['departamento']; ?>">
                                <?php echo $v['departamento']; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </div>
            <!-- municipio -->
            <div class="col-md-3" id="municipios">
            </div>

            <!-- sede -->
            <div class="col-md-3" id="sede">
            </div>

            <div class="col-md-3">
                <select name="estado" id="" class="form-select">
                    <option value=""">Estado</option>
               		<option value=" pendiente">Pendiente</option>
                    <option value="curso">En Curso</option>
                    <option value="finalizado">Finalizado</option>
                </select>
            </div>
        </div>

        <input onclick="cargar()" type="button" id="boton" class="btn btn-info btn-block" value="Buscar">


        <div id="Data">
        </div>



        <div id="map">
        </div>


        <div class="tabla mt-3">
            <table class="table table-responsive table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Institucion</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Region</th>
                        <th scope="col">Formacion</th>
                    </tr>
                </thead>
                <tbody id="tablita">

                </tbody>
            </table>
        </div>

    </div>
</body>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBotmvjuJo6UNDyj7-AbGxXPm-zISsHWF4&callback=loadMap">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="./js/index.js"></script>
<script type="text/javascript" src="js/googlemap.js"></script>


</html>