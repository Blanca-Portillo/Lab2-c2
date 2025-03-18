<?php
include 'header.php';
include 'conexion.php';

$query = "SELECT * FROM productos";
$stmt = $conn->query($query);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Lista de Productos</h2>

    <form action="consultar.php" method="GET" class="consultar-form">
        <label for="id">Consultar producto por ID:</label>
        <input type="number" name="id" id="id" placeholder="Ingrese el ID" required>
        <button type="submit">Consultar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($productos) > 0): ?>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo number_format($producto['precio'], 2); ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td class="actions">
                            <a href="editar.php?id=<?php echo $producto['id']; ?>" class="btn-edit">
                                <img src="img/edit-icon.png" alt="Editar"> Editar
                            </a>
                            <a href="eliminar.php?id=<?php echo $producto['id']; ?>" class="btn-delete">
                                <img src="img/delete-icon.png" alt="Eliminar"> Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay productos registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>