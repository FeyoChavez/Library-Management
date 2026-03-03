<!DOCTYPE html>
<html>
<head>
    <title>Editar Préstamo</title>

   <?php  require_once __DIR__ . '/../template/header.php'; ?>

   <div class="col-md-3"></div>

   <div class="col-md-5">
    <div class="card text-white bg-dark mb-3">
        <div class="card-header">Editar Préstamo</div>
        <div class="card-body">

        <form method="post"  onsubmit="transformToUpperCase()">

        <div class="form-group">
            <label for="control_number">Número de Control:</label><br>
            <input type="text" class="form-control" name="control_number" id="control_number" placeholder="No. de control:" value="<?php echo $loan['control_number']; ?>" required><br>
        </div>

        <div class="form-group mb-4">
                <label for="book_id">Libro:</label><br>
                <select class="form-control" name="book_id" id="book_id" required>
                    <option></option>
                </select><br>
            </div>

         <div class="btn-group" role="group" aria-label="Button group name">
                <button type="submit" value="Actualizar" class="btn btn-success">Actualizar</button>
            </div>

        <div class="btn-group" role="group" aria-label="Button group name">
                <a type="button" class="btn btn-primary" href="index.php?type=loans&action=index">Regresar</a>
        </div>
    </form>

        </div>
    </div>
   </div>

   
    <?php  require_once __DIR__ . '/../template/footer.php'; ?>
