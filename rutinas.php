<?php 
$title = "Rutinas | FitControl";
include __DIR__ . '/Includes/header.php'; 
?>

<!--Filtro para acceder a las rutinas-->
<section class="buscador-rutinas">
    <div class="search-container">
        <form action="rutinas.php" method="POST">
            <div class="row">
                <div class="interactivos">
                    <input type="text" id="rutine-search" placeholder="Encuentra tu rutina">
                </div>
                <div class="interactivos">
                    <select name="buscar-grupomuscular" id="grupo-muscular">
                    <!--Las opciones que des ya están definidas
                    en la base de datos-->
                    <option value="Default">Grupo muscular</option>
                    <option value="HO">Hombros</option>
                    <option value="PE">Pecho</option>
                    <option value="CU">Cuádriceps</option>
                    </select>
                </div>
                <div class="interactivos">
                    <select name="seleccionar-dificultad" id="dificultad">
                        <option value="default">Dificultad</option>
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

    

<?php
include __DIR__ . '/Includes/footer.php'; 
?>    