<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="././css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4"> <br> <br> <br>
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">Iniciar sesión</div>
                    <div class="card-body">

                    <form method="post" action="">

                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div> 
                    <?php endif; ?>

                    <?php if(isset($autenticacion)): ?>
                        <div class="alert alert-primary" role="alert">
                            <?php echo $autenticacion; ?>
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

                        <div class="btn-group" role="group" aria-label="Button group name">
                            <button type="submit" value="Iniciar Sesión" class="btn btn-primary">Iniciar Sesión</button>
                        </div> <br>

                        <a class="m-1" href="index.php?type=users&action=register">Registrarse</a>    
                        
                    </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>
