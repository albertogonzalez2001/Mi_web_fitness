<?php 
$title = "Rutinas | FitControl";
require_once __DIR__ . '/Includes/conexion.php';
include __DIR__ . '/Includes/header.php';

// Obtenemos conexión a la BD
$pdo = connectionDB();

// Construir la consulta con filtros
$query = "SELECT * FROM rutinas WHERE 1=1";
$params = [];

// Filtro de búsqueda por título
if (!empty($_POST['rutine-search'])) {
    $search = $_POST['rutine-search'];
    $query .= " AND titulo LIKE ?";
    $params[] = "%$search%";
}

// Filtro de grupo muscular
if (!empty($_POST['buscar-grupomuscular'])) {
    $musculo = $_POST['buscar-grupomuscular'];
    $query .= " AND grupo_muscular = ?";
    $params[] = $musculo;
}

// Filtro de dificultad
if (!empty($_POST['seleccionar-dificultad'])) {
    $dificultad = $_POST['seleccionar-dificultad'];
    $query .= " AND dificultad = ?";
    $params[] = $dificultad;
}

// Ejecutar consulta
// Bloque seguro para trabajar con PDO y evitar inyecciones (mejor opción)
try {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $rutinas = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error al consultar rutinas: " . $e->getMessage();
    $rutinas = [];
}
?>

<!--Filtro para acceder a las rutinas-->
<section class="buscador-rutinas">
    <div class="search-container">
        <form method="POST" name="filtro-rutinas" action="rutinas.php">
            <div class="row">
                <div class="interactivos">
                    <input type="text" id="rutine-search" name="rutine-search" placeholder="Encuentra tu rutina" value="<?php echo $_POST["rutine-search"] ?? ''; ?>">
                </div>
                <div class="interactivos">
                    <select name="buscar-grupomuscular" id="grupo-muscular">
                        <?php if (isset($_POST['buscar-grupomuscular']) && $_POST['buscar-grupomuscular'] != ''){ ?>
                        <option value="<?php echo $_POST['buscar-grupomuscular'] ?? ''; ?>"><?php echo $_POST['buscar-grupomuscular'] ?? ''; ?></option>
                        <?php } ?>
                        <!--Las opciones que se den, deben estar definidas
                        en la base de datos-->
                        <option value="">Músculo</option>
                        <option value="Hombros">Hombros</option>
                        <option value="Pecho">Pecho</option>
                        <option value="Brazo">Brazo</option>
                        <option value="Pierna">Pierna</option>
                        <option value="Full-body">Full-body</option>
                    </select>
                </div>
                <div class="interactivos">
                    <select name="seleccionar-dificultad" id="dificultad">
                        <?php if (isset($_POST['seleccionar-dificultad']) && $_POST['seleccionar-dificultad'] != ''){ ?>
                        <option value="<?php echo $_POST['seleccionar-dificultad'] ?? ''; ?>"><?php echo ucfirst($_POST['seleccionar-dificultad']) ?? ''; ?></option>
                        <?php } ?>
                        <option value="">Dificultad</option>
                        <option value="Fácil">Fácil</option>
                        <option value="Medio">Medio</option>
                        <option value="Difícil">Difícil</option>
                    </select>
                </div>
                <div class="interactivos">
                    <button id="submit" type="submit">Aplicar filtros</button>
                </div>
            </div>
        </form>
    </div>
</section>

<!--Sección del contenido de las rutinas-->
<section class="contenido-rutinas">
    <div class="contenedor-main-rutinas">
        <h2 class="titulo-rutinas">NUESTRAS RUTINAS</h2>
        <hr><br>
        
        <?php 
        if (!empty($rutinas)) {
            foreach ($rutinas as $rutina) {
                // Generar ID único basado en el ID de la BD
                $rutina_id = 'rutina-' . $rutina['id'];
                
                // Mapear grupo muscular a imagen
                $grupo = strtolower($rutina['grupo_muscular']);
                $imagen = '';
                switch ($grupo) {
                    case 'pecho':
                        $imagen = '/Mi_web_fitness/uploads/images/rutina-pecho.jpg';
                        break;
                    case 'pierna':
                        $imagen = '/Mi_web_fitness/uploads/images/rutina-pierna.jpg';
                        break;
                    case 'brazo':
                        $imagen = '/Mi_web_fitness/uploads/images/rutina-brazos.jpg';
                        break;
                    case 'hombros':
                        $imagen = '/Mi_web_fitness/uploads/images/rutina-hombros.jpg';
                        break;
                    case 'full-body':
                        $imagen = '/Mi_web_fitness/uploads/images/rutina-fullbody.jpg';
                        break;
                    default:
                        $imagen = '/Mi_web_fitness/uploads/images/rutina-pecho.jpg';
                }
        ?>
        <div class="rutinas" id="<?php echo $rutina_id; ?>">
            <div class="row1-rutina">
                <img src="<?php echo $imagen; ?>" alt="<?php echo $rutina['titulo']; ?>">
            </div>
            <div class="row2-rutina">
                <h3><?php echo $rutina['titulo']; ?></h3>
                <p><strong>Dificultad:</strong> <?php echo ucfirst($rutina['dificultad']); ?></p>
                <p><strong>Grupo Muscular:</strong> <?php echo $rutina['grupo_muscular']; ?></p>
                <p>Descripción detallada de la rutina disponible.</p>
            </div>
        </div>
        <br><hr><br>
        <?php 
            }
        } else {
            echo '<p style="text-align: center; font-size: 18px; color: #666;">No se encontraron rutinas que coincidan con los filtros aplicados.</p>';
        }
        ?>
        
    </div>
</section>

<?php
include __DIR__ . '/Includes/footer.php'; 
?>    