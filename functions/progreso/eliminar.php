<?php

//Elimina el progreso a petición del usuario
function deleteProgress(PDO $pdo, int $progressId, int $userId): bool {
    $stmt = $pdo->prepare(
        'DELETE FROM progreso WHERE id = :id AND id_usuario = :id_usuario'
    );
    return $stmt->execute([
        ':id' => $progressId,
        ':id_usuario' => $userId,
    ]);
}
