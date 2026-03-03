<!DOCTYPE html>
<html>
<head>
    <title>Prestamos</title>

<?php  require_once __DIR__ . '/../template/header.php'; ?>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-dark text-center table-sm">

                <h1 class="display-5">Lista de Prestamos:</h1> <br>

                    <a type="button" class="btn btn-success mb-3" href="././excel.php">Descargar excel</a>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                        <a type="button" class="btn btn-primary mb-4 m-2" href="index.php?type=loans&action=create">Agregar</a>
                    <?php endif; ?>
                    
                <thead class="align-middle">
                    <tr>
                        <th>ID</th>
                        <th>ALUMNO</th>
                        <th>NO. CONTROL</th>
                        <th>CARRERA</th>
                        <th>LIBRO</th>
                        <th>FECHA DEL PRESTAMO</th>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                        <th>ACCIONES</th>
                    <?php endif; ?>
                    </tr>
                </thead>

                <tbody class="align-middle">
                    <?php foreach($loans as $loan): ?>
                        <tr>
                            <td><?php echo $loan['id']; ?></td>
                            <td><?php echo $loan['student_name']; ?></td>
                            <td><?php echo $loan['control_number']; ?></td>
                            <td><?php echo $loan['career']; ?></td>
                            <td><?php echo $loan['book_title']; ?></td> <!-- Aquí debe coincidir con el alias en la consulta -->
                            <td><?php echo $loan['created_at']; ?> </td>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                            <td style="width: 10%;">
                                 <a type="button" class="btn btn-primary" href="index.php?type=loans&action=edit&id=<?php echo $loan['id']; ?>"><i class="fas fa-edit"></i></a> 
                                 <a type="button" class="btn btn-danger" href="index.php?type=loans&action=delete&id=<?php echo $loan['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este préstamo?');"><i class="fas fa-trash-alt"></i></a> 
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    

    <?php  require_once __DIR__ . '/../template/footer.php'; ?>
