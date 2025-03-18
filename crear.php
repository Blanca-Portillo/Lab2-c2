<?php
include 'header.php';
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $query = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':nombre' => $nombre,
        ':descripcion' => $descripcion,
        ':precio' => $precio,
        ':stock' => $stock
    ]);

    header('Location: index.php');
}
?>

<h2>Crear Producto</h2>
<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <textarea name="descripcion" placeholder="Descripción" required></textarea>
    <input type="number" name="precio" placeholder="Precio" step="0.01" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <button type="submit">Guardar</button>
</form>

<?php include 'footer.php'; ?>