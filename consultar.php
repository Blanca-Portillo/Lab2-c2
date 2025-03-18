<?php
include 'header.php';
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM productos WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        
        echo "<div class='container'>";
        echo "<h2>Detalles del Producto</h2>";
        echo "<p><strong>ID:</strong> " . $producto['id'] . "</p>";
        echo "<p><strong>Nombre:</strong> " . $producto['nombre'] . "</p>";
        echo "<p><strong>Descripción:</strong> " . $producto['descripcion'] . "</p>";
        echo "<p><strong>Precio:</strong> $" . number_format($producto['precio'], 2) . "</p>";
        echo "<p><strong>Stock:</strong> " . $producto['stock'] . "</p>";
        echo "<a href='index.php' class='btn-back'>Volver</a>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "<p>No se encontró ningún producto con el ID proporcionado.</p>";
        echo "<a href='index.php' class='btn-back'>Volver</a>";
        echo "</div>";
    }
} else {
    echo "<div class='container'>";
    echo "<p>No se proporcionó un ID válido.</p>";
    echo "<a href='index.php' class='btn-back'>Volver</a>";
    echo "</div>";
}

include 'footer.php';
?>