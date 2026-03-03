<!DOCTYPE html>
<html>
<head>
    <title>Editar Alumno</title>

    <?php  require_once __DIR__ . '/../template/header.php'; ?>

    <div class="col-md-3"></div>

    <div class="col-md-5">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">Editar Alumno</div>
            <div class="card-body">

            <form method="post" onsubmit="transformToUpperCase()">

               <!-- <input type="hidden" class="form-control" value="<?php //echo $book['id']; ?>"> <br> -->
        
            <div class="form-group">
                <label for="student_name">Nombre del alumno:</label><br>
                <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Titulo:" value="<?php echo $student['student_name']; ?>" required><br>
            </div>

            <div class="form-group">
                <label for="control_number">Numero de control:</label><br>
                <input type="text" class="form-control" name="control_number" id="control_number" placeholder="Número de control:" value="<?php echo $student['control_number']; ?>" required><br>
            </div>

            <div class="form-group">
            <label for="career">Carrera:</label><br>
                <select class="form-select" name="career" id="career" required>
                    <option value="SISTEMAS COMPUTACIONALES" <?php if($student['career'] == 'SISTEMAS COMPUTACIONALES ') echo 'selected'; ?>>Sistemas Computacionales</option>
                    <option value="ADMINISTRACION" <?php if($student['career'] == 'ADMINISTRACION') echo 'selected'; ?>>Administración</option>
                    <option value="INDUSTRIAS ALIMENTARIAS" <?php if($student['career'] == 'INDUSTRIAS ALIMENTARIAS') echo 'selected'; ?>>Industrias Alimentarias</option>
                    <option value="INDUSTRIAL" <?php if($student['career'] == 'INDUSTRIAL') echo 'selected'; ?>>Industrial</option>
                    <option value="AMBIENTAL" <?php if($student['career'] == 'AMBIENTAL') echo 'selected'; ?>>Ambiental</option>
                    <option value="AGRICOLA" <?php if($student['career'] == 'AGRICOLA') echo 'selected'; ?>>Agrícola</option>
                    <option value="TICS" <?php if($student['career'] == 'TICS') echo 'selected'; ?>>TICS</option>   
                </select><br>

            <div class="btn-group" role="group" aria-label="Button group name">
                <button type="submit" value="Actualizar" class="btn btn-success">Actualizar</button>
            </div>

            <div class="btn-group" role="group" aria-label="Button group name">
                    <a type="button" class="btn btn-primary" href="index.php?type=students&action=index">Regresar</a>
            </div>

             </form>


            </div>
        </div>
    </div>

    <?php  require_once __DIR__ . '/../template/footer.php'; ?>