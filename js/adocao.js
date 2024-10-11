document.addEventListener('DOMContentLoaded', function() {
  const toggleButton = document.getElementById('toggle-filter');
  const filterSection = document.getElementById('filter-section');

  toggleButton.addEventListener('click', function() {
      if (filterSection.style.display === 'none' || filterSection.style.display === '') {
          filterSection.style.display = 'block';
          toggleButton.textContent = '🔍 Ocultar Filtros';
      } else {
          filterSection.style.display = 'none';
          toggleButton.textContent = '🔍 Mostrar Filtros';
      }
  });

  // Inicializa o formulário de filtro como escondido
  filterSection.style.display = 'none';
});