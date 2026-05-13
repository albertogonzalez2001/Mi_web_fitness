<?php
$title = 'Progreso | FitControl';
require_once __DIR__ . '/Includes/conexion.php';
require_once __DIR__ . '/functions/progreso/obtener.php';
require_once __DIR__ . '/functions/progreso/crear.php';
require_once __DIR__ . '/functions/progreso/editar.php';
require_once __DIR__ . '/functions/progreso/eliminar.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['email'])) {
    header('Location:/Mi_web_fitness/login.php');
    exit;
}

$pdo = connectionDB();
$userEmail = $_SESSION['email'];
$userId = getUserIdByEmail($pdo, $userEmail);

if (!$userId) {
    header('Location:/Mi_web_fitness/login.php');
    exit;
}

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'create') {
        $rutinaId = filter_input(INPUT_POST, 'id_rutina', FILTER_VALIDATE_INT);
        $comentarios = trim($_POST['comentarios'] ?? '');

        if (!$rutinaId || $comentarios === '') {
            $error = 'Selecciona una rutina e introduce tus comentarios de progreso.';
        } else {
            $created = createProgress($pdo, $userId, $rutinaId, $comentarios);
            if ($created) {
                header('Location:/Mi_web_fitness/progreso.php?success=created');
                exit;
            }
            $error = 'No se pudo guardar el progreso. Intenta de nuevo.';
        }
    }

    if ($action === 'update') {
        $progressId = filter_input(INPUT_POST, 'progress_id', FILTER_VALIDATE_INT);
        $rutinaId = filter_input(INPUT_POST, 'id_rutina', FILTER_VALIDATE_INT);
        $comentarios = trim($_POST['comentarios'] ?? '');

        if (!$progressId || !$rutinaId || $comentarios === '') {
            $error = 'Debes completar la edición con rutina y comentarios válidos.';
        } else {
            $updated = updateProgress($pdo, $progressId, $userId, $rutinaId, $comentarios);
            if ($updated) {
                header('Location:/Mi_web_fitness/progreso.php?success=updated');
                exit;
            }
            $error = 'No se pudo actualizar el progreso. Verifica los datos e inténtalo otra vez.';
        }
    }

    if ($action === 'delete') {
        $progressId = filter_input(INPUT_POST, 'progress_id', FILTER_VALIDATE_INT);
        if (!$progressId) {
            $error = 'No se pudo eliminar el registro. Datos invalidos.';
        } else {
            $deleted = deleteProgress($pdo, $progressId, $userId);
            if ($deleted) {
                header('Location:/Mi_web_fitness/progreso.php?success=deleted');
                exit;
            }
            $error = 'No se pudo eliminar el progreso. Intenta de nuevo.';
        }
    }
}

if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case 'created':
            $success = 'Tu progreso se ha guardado correctamente.';
            break;
        case 'updated':
            $success = 'Tu progreso se ha actualizado correctamente.';
            break;
        case 'deleted':
            $success = 'Tu progreso se ha eliminado correctamente.';
            break;
    }
}

$editId = filter_input(INPUT_GET, 'edit_id', FILTER_VALIDATE_INT);
$editing = null;
if ($editId) {
    $editing = getProgressById($pdo, $editId, $userId);
}

$rutinas = getRutinas($pdo);
$progresos = getProgressForUser($pdo, $userId);

function escape(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

include __DIR__ . '/Includes/header.php';
?>

<section class="progreso-page">
    <div class="page-header">
        <h1>Mi progreso</h1>
        <p>Registra y compara tu progreso con las rutinas disponibles. Escribe aquí cómo te ha ido y guarda tus notas en la base de datos.</p>
    </div>

    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo escape($success); ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-error"><?php echo escape($error); ?></div>
    <?php endif; ?>

    <div class="progress-form-card">
        <h2><?php echo $editing ? 'Editar progreso' : 'Registrar nuevo progreso'; ?></h2>
        <form method="post" action="/Mi_web_fitness/progreso.php">
            <input type="hidden" name="action" value="<?php echo $editing ? 'update' : 'create'; ?>">
            <?php if ($editing): ?>
                <input type="hidden" name="progress_id" value="<?php echo escape((string)$editing['id']); ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="id_rutina">Rutina</label>
                <select name="id_rutina" id="id_rutina" required>
                    <option value="">Selecciona una rutina</option>
                    <?php foreach ($rutinas as $rutina): ?>
                        <option value="<?php echo escape((string)$rutina['id']); ?>"
                            <?php if (($editing && $editing['id_rutina'] === $rutina['id']) || (! $editing && isset($_POST['id_rutina']) && $_POST['id_rutina'] == $rutina['id'])): ?> selected <?php endif; ?>>
                            <?php echo escape($rutina['titulo']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea id="comentarios" name="comentarios" placeholder="Escribe aquí tu progreso, sensaciones, peso, repeticiones, etc." required><?php echo escape($editing ? $editing['comentarios'] : ($_POST['comentarios'] ?? '')); ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary"><?php echo $editing ? 'Guardar cambios' : 'Guardar progreso'; ?></button>
                <?php if ($editing): ?>
                    <a href="/Mi_web_fitness/progreso.php" class="btn-secondary">Cancelar edición</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <?php if (!empty($progresos)): ?>
        <div class="progress-grid">
            <?php foreach ($progresos as $progreso): ?>
                <article class="progress-card">
                    <h3><?php echo escape($progreso['titulo']); ?></h3>
                    <div class="meta">Guardado el <?php echo escape(date('d/m/Y H:i', strtotime($progreso['fecha_actualizacion']))); ?></div>
                    <p><?php echo escape($progreso['comentarios']); ?></p>
                    <div class="card-actions">
                        <a href="/Mi_web_fitness/progreso.php?edit_id=<?php echo escape((string)$progreso['id']); ?>" class="btn-secondary">Editar</a>
                        <form method="post" action="/Mi_web_fitness/progreso.php" style="display:inline-block; margin:0;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="progress_id" value="<?php echo escape((string)$progreso['id']); ?>">
                            <button type="submit" class="btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este progreso?');">Eliminar</button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p style="font-size:16px; color:#555;">Aún no tienes registros de progreso. Añade tu primera entrada para poder comparar tus resultados.</p>
    <?php endif; ?>
</section>

<?php
include __DIR__ . '/Includes/footer.php';
?>