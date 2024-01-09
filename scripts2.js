// Funcionalidad para el primer botón
document.getElementById('toggleSectionButton').addEventListener('click', function() {
    hideOtherSections('seccion1');
    toggleSection('seccion1');
});

// Funcionalidad para el segundo botón
document.getElementById('toggleSectionButton2').addEventListener('click', function() {
    hideOtherSections('seccion2');
    toggleSection('seccion2');
});

// Funcionalidad para el tercer botón
document.getElementById('toggleSectionButton3').addEventListener('click', function() {
    hideOtherSections('seccion3');
    toggleSection('seccion3');
});

// Función para alternar la visualización de la sección
function toggleSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section.style.display === 'none' || section.style.display === '') {
        section.style.display = 'block';
    } else {
        section.style.display = 'none';
    }
}

// Función para ocultar otras secciones
function hideOtherSections(sectionToKeep) {
    var sections = document.querySelectorAll('.recuadros1, .recuadros2, .recuadros3');
    sections.forEach(function(section) {
        if (section.id !== sectionToKeep) {
            section.style.display = 'none';
        }
    });
}
