document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('mostrarBeneficios').addEventListener('click', function() {
    var beneficiosSection = document.querySelector('.beneficios');
    if (beneficiosSection.style.display === 'none' || beneficiosSection.style.display === '') {
      beneficiosSection.style.display = 'block';
    } else {
      beneficiosSection.style.display = 'none';
    }
  });
});