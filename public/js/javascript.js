document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.querySelector('.menu-toggle');
  const sidebar = document.querySelector('.sidebar');
  
  // Toggle sidebar no desktop
  menuToggle.addEventListener('click', function() {
    sidebar.classList.toggle('collapsed');
  });
  
  // Toggle sidebar no mobile
  function handleMobileMenu() {
    if (window.innerWidth <= 768) {
      sidebar.classList.remove('collapsed');
      menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
      });
    } else {
      sidebar.classList.remove('active');
    }
  }
  
  // Verificar no carregamento e no redimensionamento
  handleMobileMenu();
  window.addEventListener('resize', handleMobileMenu);
});









