<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>
     <link rel="stylesheet" href="././css/bootstrap.min.css">
     <script src="././js/script.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4"> <br> <br> <br>
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Registrarse:</div>
                <div class="card-body">

                <form method="post" action="" onsubmit=""> 

                <?php if(isset($mensaje)): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                        
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="username">Usuario:</label><br>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Usuario:" required><br>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña:</label><br>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña:" required><br>
                    </div>

                    <div class="form-group">
                        <label for="names">Nombre:</label><br>
                        <input class="form-control" type="text" name="names" id="names" placeholder="Nombre:" required><br>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellidos:</label><br>
                        <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Apellidos:" required><br>
                    </div>

                    <div class="form-group">
                        <label for="control">Numero de control:</label><br>
                        <input class="form-control" type="text" name="control" id="control" placeholder="No. Control:" required><br>
                    </div>

                     <div class="btn-group" role="group" aria-label="Button group name">
                            <button type="submit" value="Registrar" class="btn btn-primary">Registrar</button>
                    </div> <br>

                     <a class="" href="index.php?type=users&action=login">Iniciar sesión</a>

                </form>


                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
