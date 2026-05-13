
//Funcion para que se muestre al cliente la página donde este se encuentra
document.addEventListener("DOMContentLoaded", function() {
  // Obtener la URL actual
  const currentUrl = window.location.href;
  
  // Seleccionar todos los enlaces del menú
  const menuLinks = document.querySelectorAll('.header-navigation a');
  
  menuLinks.forEach(link => {
    // Si el href del enlace coincide con la URL actual
    if (link.href === currentUrl) {
      link.classList.add('active'); // O link.parentElement.classList.add('active')
    }
  });
});

