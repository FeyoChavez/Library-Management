<!DOCTYPE html>
<html>
<head>
    <title>Editar Libro</title>

    <?php  require_once __DIR__ . '/../template/header.php'; ?>

    <div class="col-md-3"></div>

    <div class="col-md-5">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">Editar Libro</div>
            <div class="card-body">

            <form method="post" onsubmit="transformToUpperCase()">

               <!-- <input type="hidden" class="form-control" value="<?php //echo $book['id']; ?>"> <br> -->
        
            <div class="form-group">
                <label for="title">Título:</label><br>
                <input type="text" class="form-control" name="title" id="title" placeholder="Titulo:" value="<?php echo $book['title']; ?>" required><br>
            </div>

            <div class="form-group">
                <label for="author">Autor:</label><br>
                <input type="text" class="form-control" name="author" id="author" placeholder="Autor:" value="<?php echo $book['author']; ?>" required><br>
            </div>

            <div class="form-group">
                <label for="edition">Edición:</label><br>
                <input type="text" class="form-control" name="edition" id="edition" placeholder="Edición:" value="<?php echo $book['edition']; ?>" required><br>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label><br>
                <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN:" value="<?php echo $book['isbn']; ?>" required><br>
            </div>

            <div class="form-group">
            <label for="area">Área:</label><br>
                <select class="form-select" name="area" id="area" required>
                    <option value="SISTEMAS COMPUTACIONALES" <?php if($book['area'] == 'SISTEMAS COMPUTACIONALES ') echo 'selected'; ?>>Sistemas Computacionales</option>
                    <option value="ADMINISTRACION" <?php if($book['area'] == 'ADMINISTRACION') echo 'selected'; ?>>Administración</option>
                    <option value="INDUSTRIAS ALIMENTARIAS" <?php if($book['area'] == 'INDUSTRIAS ALIMENTARIAS') echo 'selected'; ?>>Industrias Alimentarias</option>
                    <option value="INDUSTRIAL" <?php if($book['area'] == 'INDUSTRIAL') echo 'selected'; ?>>Industrial</option>
                    <option value="AMBIENTAL" <?php if($book['area'] == 'AMBIENTAL') echo 'selected'; ?>>Ambiental</option>
                    <option value="AGRICOLA" <?php if($book['area'] == 'AGRICOLA') echo 'selected'; ?>>Agrícola</option>
                    <option value="TICS" <?php if($book['area'] == 'TICS') echo 'selected'; ?>>TICS</option>  
                    <option value="CULTURA GENERAL" <?php if($book['area'] == 'CULTURA GENERAL') echo 'selected'; ?>>Cultura General</option>
                    <option value="COMUNES" <?php if($book['area'] == 'COMUNES') echo 'selected'; ?>>Comunes</option>  
                </select><br>

            <div class="btn-group" role="group" aria-label="Button group name">
                <button type="submit" value="Actualizar" class="btn btn-success">Actualizar</button>
            </div>

            <div class="btn-group" role="group" aria-label="Button group name">
                    <a type="button" class="btn btn-primary" href="index.php?type=books&action=index">Regresar</a>
            </div>

             </form>


            </div>
        </div>
    </div>

    <?php  require_once __DIR__ . '/../template/footer.php'; ?>