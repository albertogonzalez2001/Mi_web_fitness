<?php
$title = "Página Principal | FitControl";
require __DIR__ . '/Includes/conexion.php';
include __DIR__ . '/Includes/header.php'; 
?>

<section class="section">
    <div class="hero-content">
        <div class="content">
            <h1>FITNESS IS THE CURE</h1><br>
            <p>Luchar contra las enfermedades, perseguir la longevidad, construir una comunidad y 
                hacerse más fuerte para la vida.
            </p><br>
            <p>¡Accede a nuestras rutinas personalizadas!</p><br>
            <a href="/Mi_web_fitness/rutinas.php" class="boton-estilizado">RUTINAS</a><br>
            <p>¡Consulta más info abajo!</p><br>
            <a href="/Mi_web_fitness/contacto.php" class="link-estilizado">CONTÁCTANOS SI TIENES DUDAS</a>
        </div>
    </div>
</section>

<section class="article-section">
    <div class="section-header">
        <h2>FITNESS IS FOR YOU</h2>
    </div>
    <div class="body-section">
        <article class="article">
            <div class="article-image">
                <img src="/Mi_web_fitness/uploads/images/chica-plancha.jpg" alt="">
            </div>
            <div class="article-content">
                <h3>LOS BENEFICIOS DE LA FUERZA PARA TU SALUD</h3>
                <p class="article-body">
                    El entrenamiento de fuerza es una de las formas más efectivas de mejorar la salud física y mental. 
                    A través de ejercicios que implican resistencia, como el levantamiento de pesas o el uso del propio peso corporal, 
                    el cuerpo desarrolla masa muscular, mejora la densidad ósea y fortalece las articulaciones. 
                    Esto no solo ayuda a mejorar el rendimiento físico, sino que también reduce el riesgo de lesiones en la vida diaria.
                    Además, entrenar fuerza acelera el metabolismo. A mayor masa muscular, mayor gasto energético incluso en reposo, lo que facilita el 
                    control del peso corporal. Por otro lado, numerosos estudios han demostrado que el entrenamiento regular contribuye a reducir el estrés, 
                    mejorar la calidad del sueño y aumentar los niveles de energía durante el día.
                </p>
            </div>
        </article>
        <article class="article">
            <div class="article-image">
                <img src="/Mi_web_fitness/uploads/images/chico-boxeando.jpg">
            </div>
            <div class="article-content">
                <h3>POR QUÉ EL EJERCICIO REGULAR MEJORA TU CALIDAD DE VIDA</h3>
                <p class="article-body">
                    Practicar ejercicio físico de forma regular tiene un impacto directo en la calidad de vida. Más allá de la mejora estética o del 
                    rendimiento deportivo, la actividad física ayuda a mantener el organismo en equilibrio, fortaleciendo el sistema cardiovascular, 
                    mejorando la capacidad pulmonar y favoreciendo el correcto funcionamiento del metabolismo.
                    El ejercicio también tiene un efecto muy positivo en la salud mental. Durante la actividad física, el cuerpo libera endorfinas, 
                    conocidas como las “hormonas de la felicidad”, que ayudan a reducir el estrés, la ansiedad y los síntomas asociados a estados de ánimo bajos. 
                    Esto hace que muchas personas experimenten una sensación de bienestar después de entrenar.
                </p>
            </div>
        </article>
        <article class="article">
            <div class="article-image">
                <img src="/Mi_web_fitness/uploads/images/chico-fitness.jpg">
            </div>
            <div class="article-content">
                <h3>LA IMPORTANCIA DE LA CONSTANCIA EN EL ENTRENAMIENTO</h3>
                <p class="article-body">
                  Uno de los factores más importantes para obtener resultados en el fitness no es la intensidad del entrenamiento puntual, 
                  sino la constancia a lo largo del tiempo. Muchas personas comienzan con gran motivación, pero abandonan al no ver resultados 
                  inmediatos. Sin embargo, el progreso físico es un proceso gradual que requiere paciencia y compromiso.
                  Establecer objetivos realistas y seguir un plan de entrenamiento estructurado puede ayudar a mantener la motivación. 
                  Incluso sesiones cortas pero regulares pueden generar mejoras significativas en fuerza, resistencia y movilidad si se realizan de forma consistente.
                </p>
            </div>
        </article>
    </div>    
</section>


<?php
include __DIR__ . '/Includes/footer.php'; 
?>     