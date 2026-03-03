
        <!-- Bootstrap CSS v5.2.1 -->

        <link rel="stylesheet" href="././css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- Incluir Select2 CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <script src="././js/script.js"></script>
    </head>
    <body>

    <?php $url="http://".$_SERVER['HTTP_HOST']."/proyecto-mvc" ?>

        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php?type=dashboard&action=index">ITSAT</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="index.php?type=dashboard&action=index">Inicio</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="index.php?type=books&action=index">Libros</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?type=loans&action=index">Prestamos</a>
                </li>

                <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?type=students&action=index">Alumnos</a>
                </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?type=users&action=index">Usuarios</a>
                </li>
                    <?php endif; ?>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>  <?php 
                        
                        echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Administrador'; 
                        ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?type=users&action=login">Iniciar sesión</a>
                    <a class="dropdown-item" href="index.php?type=users&action=register">Registrar</a>
                    <a class="dropdown-item" href="index.php?type=users&action=logout">Cerrar sesión</a>
                </div>
                </li>
            </ul>

            </div>
        </div>
        </nav> 
    
        <div class="container">
            <br>
            <div class="row">