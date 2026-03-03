<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>

    <?php  require_once __DIR__ . '/../template/header.php'; ?>

    <div class="col-md-1"></div>

    <div class="col-md-10">
        <div class="table-responsive">
            <table class="table table-bordered table-dark text-center table-sm">
                <h1 class="display-5">Lista de Usuarios:</h1> <br>

                <thead class="align-middle">
                    <tr>
                        <th>USUARIO</th>
                        <th>NOMBRE</th>
                        <th>APELLIDOS</th>
                        <th>NO.CONTROL</th>
                        <th>ROL</th>
                        <th>ASIGNAR ROL</th>
                    </tr>
                </thead>

                <tbody class="align-middle">
                    <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['names']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['control']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <form method="post" action="index.php?type=users&action=updateRole">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        
                            <select class="form" name="role">
                                <option value="user" <?php if($user['role'] == 'user') echo 'selected'; ?>>Usuario</option>
                                <option value="admin" <?php if($user['role'] == 'admin') echo 'selected'; ?>>Administrador</option> 
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm" value="Actualizar Rol"><i class="fa-solid fa-check"></i></button>
                            <a type="button" class="btn btn-danger btn-sm" href="index.php?type=users&action=delete&id=<?php echo $user['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?');"><i class="fas fa-trash-alt"></i></a> 
                        </form>
                       
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

     <?php  require_once __DIR__ . '/../template/footer.php'; ?>
