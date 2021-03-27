<?php
require_once '../education.php';
$edus = new education;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Access Google Maps API in PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5933801b0a.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <div class="banner">
            <!-- Image and text -->
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="../">
                    <img src="https://www.enticconfio.gov.co/sites/default/files/imagen-1.png" width="50" height="30"
                        class="d-inline-block align-top" alt="">
                    Busqueda de instituciones
                </a>

                <a class="navbar-link" href="#">
                    Datos
                </a>
            </nav>
        </div>





        <div class="tabla mt-3">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Sede</th>
                        <th scope="col">Institucion</th>
                        <th scope="col">Dane</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Formacion</th>
                        <th scope="col">Region</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $todo = $edus->getAllColleges();
                    $i = 1;
                    foreach ($todo as $v) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $v['departamento']; ?></td>
                        <td><?php echo $v['municipio']; ?></td>
                        <td><?php echo $v['sede']; ?></td>
                        <td><?php echo $v['institucion_educativa']; ?></td>
                        <td><?php echo $v['dane_institucion']; ?></td>
                        <td><?php echo $v['estado']; ?></td>
                        <td><?php echo $v['formacion']; ?></td>
                        <td><?php echo $v['region']; ?></td>
                        <td>
                            <a href="<?php echo $v['id']; ?>"><i class="fas fa-trash text-danger"></i></a>
                            <a href="<?php echo $v['id']; ?>"><i class="fas fa-pen pl-2 text-success"></i></a>

                        </td>

                    </tr>
                    <?php
                        $i = $i + 1;
                    } ?>


                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5k4eIFGw2Cu3dbFgkxGvfXqxOlgQsqB4&callback=loadMap">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript" src="js/googlemap.js"></script>
<script src="./js/index.js"></script>

</html>