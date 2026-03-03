<!DOCTYPE html>
<html>
<head>
    <title>Libros</title>

<?php  require_once __DIR__ . '/../template/header.php'; ?>

    <h1 class="display-5 mb-4">Lista de Libros:</h1> <br> <br> <br>
    
        <div class="col-md-5">
        <form class="d-flex justify-content-end" action="index.php?type=books&action=search" method="post">

            <?php 
            if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                <a type="button" class="btn btn-primary me-2" href="index.php?type=books&action=create">Agregar</a>
            <?php endif; ?>

            <input class="form-control form-control me-1" name="search" type="search" placeholder="Buscar libros:">
            <button class="btn btn-secondary btn-sm " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        </div>

    <div class="col-md-12">
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-dark text-center table table-sm">

            <thead class="align-middle">
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>AUTOR</th>
                    <th>EDICIÓN</th>
                    <th>ISBN</th>
                    <th>ÁREA</th>
                    <?php 
                    if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                        <th>ACCIONES</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody class="align-middle">
            <?php if (isset($searchResults)) { ?>
            <?php foreach ($searchResults as $book): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['edition']; ?></td>
                    <td><?php echo $book['isbn']; ?></td>
                    <td><?php echo $book['area']; ?></td>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                        <td style="width: 10%;">
                        <a type="button" class="btn btn-primary" href="index.php?type=books&action=edit&id=<?php echo $book['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a type="button" class="btn btn-danger" href="index.php?type=books&action=delete&id=<?php echo $book['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este libro?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php } else { ?>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['edition']; ?></td>
                    <td><?php echo $book['isbn']; ?></td>
                    <td><?php echo $book['area']; ?></td>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role']  == 'admin'): ?>
                        <td style="width: 10%;">
                        <a type="button" class="btn btn-primary" href="index.php?type=books&action=edit&id=<?php echo $book['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a type="button" class="btn btn-danger" href="index.php?type=books&action=delete&id=<?php echo $book['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este libro?');"><i class="fas fa-trash-alt"></i></a>
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
