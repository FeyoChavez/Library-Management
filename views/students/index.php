<!DOCTYPE html>
<html>
<head>
    <title>Alumnos</title>

<?php  require_once __DIR__ . '/../template/header.php'; ?>

    <h1 class="display-5 mb-4">Lista de Alumnos:</h1> <br> <br> <br>
    
        <div class="col-md-5">
        <form class="d-flex justify-content-end" action="index.php?type=students&action=search" method="post">

            <?php 
            if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                <a type="button" class="btn btn-primary me-2" href="index.php?type=students&action=create">Agregar</a>
            <?php endif; ?>

            <input class="form-control form-control me-1" name="search" type="search" placeholder="Buscar alumnos:">
            <button class="btn btn-secondary btn-sm " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

        </form>
        </div>

    <div class="col-md-12">
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-dark text-center table table-sm">

            <thead class="align-middle">
                <tr>
                    <th>ID</th>
                    <th>ALUMNO</th>
                    <th>NUMERO DE CONTROL</th>
                    <th>CARRERA</th>
                    <?php 
                    if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                        <th>ACCIONES</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody class="align-middle">
            <?php if (isset($searchResults)) { ?>
            <?php foreach ($searchResults as $student): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['student_name']; ?></td>
                    <td><?php echo $student['control_number']; ?></td>
                    <td><?php echo $student['career']; ?></td>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                        <td style="width: 10%;">
                        <a type="button" class="btn btn-primary" href="index.php?type=students&action=edit&id=<?php echo $student['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a type="button" class="btn btn-danger" href="index.php?type=students&action=delete&id=<?php echo $student['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este alumno?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['student_name']; ?></td>
                    <td><?php echo $student['control_number']; ?></td>
                    <td><?php echo $student['career']; ?></td>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                        <td style="width: 10%;">
                        <a type="button" class="btn btn-primary" href="index.php?type=students&action=edit&id=<?php echo $student['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a type="button" class="btn btn-danger" href="index.php?type=students&action=delete&id=<?php echo $student['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este alumno?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php } ?>
            </tbody>

            </table>
        </div>
    </div>

    <?php  require_once __DIR__ . '/../template/footer.php'; ?>
