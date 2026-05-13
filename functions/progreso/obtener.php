<?php

function getUserIdByEmail(PDO $pdo, string $email): ?int {
    $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email LIMIT 1');
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch();
    return $result['id'] ?? null;
}

function getRutinas(PDO $pdo): array {
    $stmt = $pdo->query('SELECT id, titulo FROM rutinas ORDER BY titulo ASC');
    return $stmt->fetchAll();
}

function getProgressForUser(PDO $pdo, int $userId): array {
    $stmt = $pdo->prepare(
        'SELECT p.id, p.id_rutina, p.comentarios, p.fecha_actualizacion, r.titulo
         FROM progreso p
         JOIN rutinas r ON r.id = p.id_rutina
         WHERE p.id_usuario = :id_usuario
         ORDER BY p.fecha_actualizacion DESC'
    );
    $stmt->bindParam(':id_usuario', $userId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getProgressById(PDO $pdo, int $progressId, int $userId): ?array {
    $stmt = $pdo->prepare(
        'SELECT p.id, p.id_rutina, p.comentarios, p.fecha_actualizacion, r.titulo
         FROM progreso p
         JOIN rutinas r ON r.id = p.id_rutina
         WHERE p.id = :id AND p.id_usuario = :id_usuario'
    );
    $stmt->bindParam(':id', $progressId, PDO::PARAM_INT);
    $stmt->bindParam(':id_usuario', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch();
    return $result ?: null;
}
