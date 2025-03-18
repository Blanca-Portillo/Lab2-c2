<?php
include 'header.php';
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $query = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':id' => $id,
        ':nombre' => $nombre,
        ':descripcion' => $descripcion,
        ':precio' => $precio,
        ':stock' => $stock
    ]);

    header('Location: index.php');
}

$id = $_GET['id'];
$query = "SELECT * FROM productos WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->execute([':id' => $id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h2>Editar Producto</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
    <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
    <input type="number" name="precio" value="<?php echo $producto['precio']; ?>" step="0.01" required>
    <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required>
    <button type="submit">Actualizar</button>
</form>

<?php include 'footer.php'; ?>