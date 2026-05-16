<?php
//Funcion 1: Busca el email del usuario en la base de datos
function getUserIdByEmail(PDO $pdo, string $email): ?int {
    $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email LIMIT 1');
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    //Obtiene la primera fila en la base de datos y si no devuelve null
    $result = $stmt->fetch();
    return $result['id'] ?? null;
}

//Obtiene todas las rutinas de la base de datos para el formulario select options de progreso.php
function getRutinas(PDO $pdo): array {
    $stmt = $pdo->query('SELECT id, titulo FROM rutinas ORDER BY titulo ASC');
    return $stmt->fetchAll();
}

//Obtiene el historial de progreso del usuario para mostrarlo en la página
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

//Obtiene solo un registro de progreso para poder editarlo, mostrando los datos específicos del registro, para evitar confusiones con otros users
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
