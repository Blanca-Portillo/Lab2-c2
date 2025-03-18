<?php
include 'header.php';
include 'conexion.php';

$query = "SELECT * FROM productos";
$stmt = $conn->query($query);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Lista de Productos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['id']; ?></td>
            <td><?php echo $producto['nombre']; ?></td>
            <td><?php echo $producto['descripcion']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['stock']; ?></td>
            <td class="actions">
                <a href="editar.php?id=<?php echo $producto['id']; ?>" class="edit">
                   <button> <img src="https://cdn-icons-png.flaticon.com/512/1160/1160515.png" alt="Editar" width="24" height="24"> </button>
                </a>
                <a href="eliminar.php?id=<?php echo $producto['id']; ?>" class="delete">
                <button><img src="https://cdn.pixabay.com/photo/2021/11/30/00/42/backspace-button-6834137_960_720.png" alt="Eliminar" width="24" height="24"> </button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'footer.php'; ?>