<?php
//Campos de la tabla progreso + importar conexión con la base de datos
//Comprueba de manera exahustiva que los IDs coincidan
function updateProgress(PDO $pdo, int $progressId, int $userId, int $rutinaId, string $comentarios): bool {
    $stmt = $pdo->prepare(
        'UPDATE progreso
         SET id_rutina = :id_rutina, comentarios = :comentarios
         WHERE id = :id AND id_usuario = :id_usuario'
    );
    return $stmt->execute([
        ':id_rutina' => $rutinaId,
        ':comentarios' => $comentarios,
        ':id' => $progressId,
        ':id_usuario' => $userId,
    ]);
}
