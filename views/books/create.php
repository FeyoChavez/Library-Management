<!DOCTYPE html>
<html>
<head>
    <title>Agregar Libro</title>

    <?php  require_once __DIR__ . '/../template/header.php'; ?>

    <div class="col-md-3"></div>

    <div class="col-md-5">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">Agregar Libros</div>
            <div class="card-body">

                <form method="post" action="" onsubmit="transformToUpperCase()">

                <div class="form-group">
                    <label for="title">Título:</label><br>
                    <input class="form-control" type="text" name="title" id="title" placeholder="Titulo:" required><br>
                </div>

                <div class="form-group">
                    <label for="author">Autor:</label><br>
                    <input class="form-control" type="text" name="author" id="author" placeholder="Autor:" required><br>

                </div>

                <div class="form-group">
                    <label for="edition">Edición:</label><br>
                    <input class="form-control" type="text" name="edition" id="edition" placeholder="Edición:" required><br>

                </div>

                <div class="form-group">
                    <label for="isbn">ISBN:</label><br>
                    <input class="form-control" type="text" name="isbn" id="isbn" placeholder="ISBN:" required><br>
                </div>

                <div class="form-group">
                    <label for="area">Área:</label><br>
                        <select name="area" class="form-select" id="area" required>
                            <option value="SISTEMAS COMPUTACIONALES">Sistemas Computacionales</option>
                            <option value="ADMINISTRACION">Administración</option>
                            <option value="INDUSTRIAS ALIMENTARIAS">Industrias Alimentarias</option>
                            <option value="INDUSTRIAL">Industrial</option>
                            <option value="AMBIENTAL">Ambiental</option>
                            <option value="AGRICOLA">Agrícola</option>
                            <option value="TICS">TICS</option>
                            <option value="CULTURA GENERAL">Cultura General</option>
                            <option value="COMUNES">Comunes</option>
                        </select><br>
                  <!--  <input class="form-control" type="text" name="area" id="area" required><br><br> -->
                </div>

                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="submit" value="Agregar" class="btn btn-success">Agregar</button>
                </div>

                <div class="btn-group" role="group" aria-label="Button group name">
                    <a type="button" class="btn btn-primary" href="index.php?type=books&action=index">Regresar</a>
                </div>

                </form>

            </div>
        </div>
    </div>

     <?php  require_once __DIR__ . '/../template/footer.php'; ?>
