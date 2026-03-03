<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <?php  require_once __DIR__ . '/../template/header.php'; ?>
    
    <div class="col-md-12">
                 <div class="jumbotron text-center" >
                    <h1 class="display-3">Bienvenido</h1>
                    <p class="lead">Vamos a administrar nuestros libros en el sitio web</p>
                    <hr class="my-2">     
                    <img width="600" src="././img/logo.png" class="img-thumbnail rounded mx-auto d-block" alt=""> <br/>
                    <p class="lead"> 
                     <a href="index.php?type=books&action=index" class="btn btn-primary btn-lg " role="button">Ver Libros</a>
                     <a href="index.php?type=loans&action=index" class="btn btn-primary btn-lg m-2" role="button">Ver Prestamos</a>
                    </p>    
            </div>
                </div>

    <?php  require_once __DIR__ . '/../template/footer.php'; ?>