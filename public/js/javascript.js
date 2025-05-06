// menu 
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
  document.addEventListener('DOMContentLoaded', function() {
    const addBtn = document.getElementById('addCard');
    const container = document.getElementById('cardsContainer');

    addBtn.addEventListener('click', function() {
      const newCard = document.createElement('div');
      newCard.classList.add('card');
      
      const text = prompt('Título do novo cartão:', 'Novo Cartão');
      newCard.textContent = text || 'Novo Cartão';

      container.insertBefore(newCard, addBtn);
    });
  });
  const addBtn = document.getElementById('addCard');
  const modal = document.getElementById('modal');
  const closeModal = document.getElementById('closeModal');
  const form = document.getElementById('cardForm');
  const container = document.getElementById('cardsContainer');

  // Exibe o modal quando o botão de adicionar é clicado
  addBtn.addEventListener('click', function() {
    modal.style.display = 'block';
  });

  // Fecha o modal quando o "X" é clicado
  closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
  });

