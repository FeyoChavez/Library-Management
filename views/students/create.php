<!DOCTYPE html>
<html>
<head>
    <title>Agregar Alumno</title>

    <?php  require_once __DIR__ . '/../template/header.php'; ?>

    <div class="col-md-3"></div>

    <div class="col-md-5">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">Agregar Alumnos</div>
            <div class="card-body">

                <form method="post" action="" onsubmit="transformToUpperCase()">

                <div class="form-group">
                    <label for="student_name">Nombre del alumno:</label><br>
                    <input class="form-control" type="text" name="student_name" id="student_name" placeholder="Nombre del alumno:" required><br>
                </div>

                <div class="form-group">
                    <label for="control_number">Número de control:</label><br>
                    <input class="form-control" type="text" name="control_number" id="control_number" placeholder="Número de control:" required><br>
                </div>

                <div class="form-group">
                    <label for="career">Carrera:</label><br>
                        <select name="career" class="form-select" id="career" required>
                            <option value="SISTEMAS COMPUTACIONALES">Sistemas Computacionales</option>
                            <option value="ADMINISTRACION">Administración</option>
                            <option value="INDUSTRIAS ALIMENTARIAS">Industrias Alimentarias</option>
                            <option value="INDUSTRIAL">Industrial</option>
                            <option value="AMBIENTAL">Ambiental</option>
                            <option value="AGRICOLA">Agrícola</option>
                            <option value="TICS">TICS</option>
                        </select><br>
                  <!--  <input class="form-control" type="text" name="area" id="area" required><br><br> -->
                </div>

                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="submit" value="Agregar" class="btn btn-success">Agregar</button>
                </div>

                <div class="btn-group" role="group" aria-label="Button group name">
                    <a type="button" class="btn btn-primary" href="index.php?type=students&action=index">Regresar</a>
                </div>

                </form>

            </div>
        </div>
    </div>

     <?php  require_once __DIR__ . '/../template/footer.php'; ?>
