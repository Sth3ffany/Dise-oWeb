<?php
session_start();

$mensajeRecibido = false;

if (isset($_POST['enviar'])) {
  // Registrar paciente
  if (!empty($_POST['nombre']) && !empty($_POST['edad'])) {
    $_SESSION['pacientes'][] = [
      'nombre' => $_POST['nombre'],
      'edad' => $_POST['edad']
    ];
  }

  // Guardar mensaje de contacto
  if (!empty($_POST['nombreC']) && !empty($_POST['email']) && !empty($_POST['mensaje'])) {
    $nombreC = $_POST['nombreC'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    $mensajeRecibido = true;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Procesar - Clínica Integral</title>
  <style>
    body { font-family: Arial; background: #f9f9f9; margin: 20px; }
    nav a { margin-right: 15px; text-decoration: none; color: #2980b9; font-weight: bold; }
    .mensaje { background: #ecf0f1; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
  </style>
</head>
<body>

  <h1>Clínica Integral</h1>

  <nav>
    <a href="registro.html">Formulario</a>
    <a href="regis3.php">Pacientes</a>
  </nav>

  <?php if ($mensajeRecibido): ?>
    <div class="mensaje">
      <h3>Mensaje recibido:</h3>
      <p><strong>Nombre:</strong> <?= htmlspecialchars($nombreC) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
      <p><strong>Mensaje:</strong> <?= nl2br(htmlspecialchars($mensaje)) ?></p>
    </div>
  <?php else: ?>
    <p>No se recibió ningún mensaje de contacto.</p>
  <?php endif; ?>

  <h2>Pacientes Registrados</h2>
  <?php
  if (!empty($_SESSION['pacientes'])) {
    echo "<ul>";
    foreach ($_SESSION['pacientes'] as $p) {
      echo "<li>" . htmlspecialchars($p['nombre']) . " - " . htmlspecialchars($p['edad']) . " años</li>";
    }
    echo "</ul>";
  } else {
    echo "<p>No hay pacientes registrados aún.</p>";
  }
  ?>

</body>
</html>

