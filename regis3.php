<?php if ($mensajeRecibido): ?>
    <div class="mensaje">
      <h3>Mensaje recibido:</h3>
      <p><strong>Nombre:</strong> <?= htmlspecialchars($nombreC) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
      <p><strong>Mensaje:</strong> <?= nl2br(htmlspecialchars($mensaje)) ?></p>
    </div>
  <?php endif; ?>

  <h2 id="pacientes">Pacientes Registrados</h2>
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
