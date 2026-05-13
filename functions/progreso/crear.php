<?php

function createProgress(PDO $pdo, int $userId, int $rutinaId, string $comentarios): bool {
    $stmt = $pdo->prepare(
        'INSERT INTO progreso (id_usuario, id_rutina, comentarios)
         VALUES (:id_usuario, :id_rutina, :comentarios)'
    );
    return $stmt->execute([
        ':id_usuario' => $userId,
        ':id_rutina' => $rutinaId,
        ':comentarios' => $comentarios,
    ]);
}
