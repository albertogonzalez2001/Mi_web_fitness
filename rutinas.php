<?php 
$title = "Rutinas | FitControl";
require_once __DIR__ . '/Includes/conexion.php';
include __DIR__ . '/Includes/header.php'; 
?>

<!--Filtro para acceder a las rutinas-->
<section class="buscador-rutinas">
    <div class="search-container">
        <form method="POST" action="rutinas.php">
            <div class="row">
                <div class="interactivos">
                    <input type="text" id="rutine-search" name="buscar-rutina" placeholder="Encuentra tu rutina">
                </div>
                <div class="interactivos">
                    <select name="buscar-grupomuscular" id="grupo-muscular">
                        <!--Las opciones que des ya están definidas
                        en la base de datos-->
                        <option value="Default">Músculo</option>
                        <option value="HO">Hombros</option>
                        <option value="PE">Pecho</option>
                        <option value="CU">Cuádriceps</option>
                    </select>
                </div>
                <div class="interactivos">
                    <select name="seleccionar-dificultad" id="dificultad">
                        <option value="Default">Dificultad</option>
                        <option value="EZ">Fácil</option>
                        <option value="MD">Medio</option>
                        <option value="HD">Dificil</option>
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
        <div class="rutinas">
            <div class="row1-rutina">
                <img src="/Mi_web_fitness/uploads/images/rutina-pecho.jpg">
            </div>
            <div class="row2-rutina">
                <h3>Rutina de pecho</h3>
                <p>Calentamiento de manguitos rotadores.</p>
                <p>Press de banca con sobrecarga progresiva hasta llegar a repeticiones efectivas.</p>
                <p>Calentamiento de manguitos rotadores.</p>
                <p>Press de banca con sobrecarga progresiva hasta llegar a repeticiones efectivas.</p>
                <p>Calentamiento de manguitos rotadores.</p>
                <p>Press de banca con sobrecarga progresiva hasta llegar a repeticiones efectivas.</p>
                <p>Calentamiento de manguitos rotadores.</p>
                <p>Press de banca con sobrecarga progresiva hasta llegar a repeticiones efectivas.</p>
                <p>Calentamiento de manguitos rotadores.</p>
                <p>Press de banca con sobrecarga progresiva hasta llegar a repeticiones efectivas.</p>
                <p>Calentamiento de manguitos rotadores.</p>
                <p>Press de banca con sobrecarga progresiva hasta llegar a repeticiones efectivas.</p>
            </div>
        </div>
        <br><hr><br>
        <div class="rutinas">
            <div class="row1-rutina">
                <img src="/Mi_web_fitness/uploads/images/rutina-pierna.jpg">
            </div>
            <div class="row2-rutina">
                <h3>Rutina de pierna</h3>
                <p>Calentamiento de caderas y movilidad de cadera.</p>
                <p>Sentadilla libre realizando sobrecarga progresiva de peso para adaptación.</p>
            </div>
        </div>        



    </div>




</section>

    

<?php
include __DIR__ . '/Includes/footer.php'; 
?>    