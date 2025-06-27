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




/* FAC */

 document.addEventListener('DOMContentLoaded', () => {
  const accordion = document.getElementById('accordionFlushExample');
  const buttons = accordion.querySelectorAll('.accordion-button');

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      const expanded = button.getAttribute('aria-expanded') === 'true';
      // Fecha todos
      buttons.forEach(btn => {
        btn.classList.add('collapsed');
        btn.setAttribute('aria-expanded', 'false');
        const targetId = btn.getAttribute('data-bs-target').slice(1);
        const targetEl = document.getElementById(targetId);
        if (targetEl) targetEl.classList.remove('show');
      });

      // Se não estava expandido, abre o clicado
      if (!expanded) {
        button.classList.remove('collapsed');
        button.setAttribute('aria-expanded', 'true');
        const targetId = button.getAttribute('data-bs-target').slice(1);
        const targetEl = document.getElementById(targetId);
        if (targetEl) targetEl.classList.add('show');
      }
    });
  });
});



/*cards*/


document.addEventListener('DOMContentLoaded', () => {
  // Elements
  const addCardBtn = document.getElementById('addCard');
  const createCardModal = document.getElementById('createCardModal');
  const cancelCreateBtn = document.getElementById('cancelCreate');
  const createCardBtn = document.getElementById('createCardBtn');
  const cardNameInput = document.getElementById('cardNameInput');
  const cardColorInput = document.getElementById('cardColorInput');
  const cardsContainer = document.getElementById('cardsContainer');

  const viewModal = document.getElementById('viewModal');
  const cardInfoView = document.getElementById('cardInfoView');
  const closeViewBtn = document.getElementById('closeViewBtn');
  const editCardBtn = document.getElementById('editCardBtn');

  const editModal = document.getElementById('editModal');
  const editCardDescription = document.getElementById('editCardDescription');
  const infoContainer = document.getElementById('infoContainer');
  const addInfoBtn = document.getElementById('addInfoBtn');
  const addSubCardBtn = document.getElementById('addSubCardBtn');
  const subCardContainer = document.getElementById('subCardContainer');
  const editTotalValue = document.getElementById('editTotalValue');
  const saveEditBtn = document.getElementById('saveEditBtn');
  const cancelEditBtn = document.getElementById('cancelEditBtn');
  const editCardForm = document.getElementById('editCardForm');

  let cards = [];
  let currentCardId = null;

  function openModal(modal) {
    modal.classList.remove('hidden');
  }
  function closeModal(modal) {
    modal.classList.add('hidden');
  }

  addCardBtn.addEventListener('click', () => {
    cardNameInput.value = '';
    cardColorInput.value = '#6c5ce7';
    openModal(createCardModal);
  });

  cancelCreateBtn.addEventListener('click', () => {
    closeModal(createCardModal);
  });

  createCardBtn.addEventListener('click', () => {
    const name = cardNameInput.value.trim();
    const color = cardColorInput.value;

    if (!name) {
      alert('Digite o nome do card');
      return;
    }

    const id = Date.now().toString();
    const newCard = {
      id,
      name,
      color,
      description: '',
      infos: [],
      subCards: []
    };
    cards.push(newCard);
    renderCards();
    closeModal(createCardModal);
  });

  function renderCards() {
    // Remove todos os cards exceto botão de adicionar
    [...cardsContainer.querySelectorAll('.card')].forEach(el => {
      if (el.id !== 'addCard') el.remove();
    });

    cards.forEach(card => {
      const cardEl = document.createElement('div');
      cardEl.classList.add('card', 'flex', 'items-center', 'justify-center', 'aspect-square', 'rounded-lg', 'text-white', 'cursor-pointer');
      cardEl.style.backgroundColor = card.color;
      cardEl.textContent = card.name;
      cardEl.dataset.id = card.id;

      cardEl.addEventListener('click', () => {
        currentCardId = card.id;
        openViewModal(card.id);
      });

      cardsContainer.insertBefore(cardEl, addCardBtn);
    });
  }

  function openViewModal(cardId) {
    const card = cards.find(c => c.id === cardId);
    if (!card) return;

    let html = `<p><strong>Nome:</strong> ${card.name}</p>`;
    html += `<p><strong>Descrição:</strong> ${card.description || '(sem descrição)'}</p>`;

    if (card.infos.length > 0) {
      html += '<p><strong>Mês e Valores:</strong></p><ul>';
      card.infos.forEach(info => {
        html += `<li>${info.month}: R$ ${parseFloat(info.value).toFixed(2)}</li>`;
      });
      html += '</ul>';

      const total = card.infos.reduce((sum, i) => sum + parseFloat(i.value), 0);
      html += `<p><strong>Total:</strong> R$ ${total.toFixed(2)}</p>`;
    } else {
      html += '<p>(Sem mês/valor)</p>';
    }

    if (card.subCards.length > 0) {
      html += '<p><strong>Subcategorias:</strong></p><ul>';
      card.subCards.forEach(sc => {
        html += `<li>${sc.name} - ${sc.description || '(sem descrição)'}</li>`;
      });
      html += '</ul>';
    }

    cardInfoView.innerHTML = html;
    openModal(viewModal);
  }

  closeViewBtn.addEventListener('click', () => {
    closeModal(viewModal);
  });

  editCardBtn.addEventListener('click', () => {
    closeModal(viewModal);
    openEditModal(currentCardId);
  });

  function openEditModal(cardId) {
    const card = cards.find(c => c.id === cardId);
    if (!card) return;

    editCardDescription.value = card.description || '';

    // Limpa containers antes de adicionar os campos existentes
    infoContainer.innerHTML = '';
    subCardContainer.innerHTML = '';

    card.infos.forEach(info => addInfoRow(info.month, info.value));
    card.subCards.forEach(sc => addSubCardRow(sc));

    updateTotal();
    openModal(editModal);
  }

  cancelEditBtn.addEventListener('click', () => {
    closeModal(editModal);
  });

  addInfoBtn.addEventListener('click', () => {
    addInfoRow();
  });

  function addInfoRow(month = '', value = '') {
    const div = document.createElement('div');
    div.className = 'flex gap-2 mb-2';

    const monthInput = document.createElement('input');
    monthInput.type = 'text';
    monthInput.placeholder = 'Mês';
    monthInput.value = month;
    monthInput.className = 'border border-gray-300 rounded px-2 py-1 flex-grow';

    const valueInput = document.createElement('input');
    valueInput.type = 'number';
    valueInput.min = '0';
    valueInput.step = '0.01';
    valueInput.placeholder = 'Valor';
    valueInput.value = value;
    valueInput.className = 'border border-gray-300 rounded px-2 py-1 w-24';

    valueInput.addEventListener('input', updateTotal);

    const removeBtn = document.createElement('button');
    removeBtn.type = 'button';
    removeBtn.textContent = 'X';
    removeBtn.className = 'bg-red-500 text-white px-2 rounded';
    removeBtn.addEventListener('click', () => {
      div.remove();
      updateTotal();
    });

    div.appendChild(monthInput);
    div.appendChild(valueInput);
    div.appendChild(removeBtn);

    infoContainer.appendChild(div);
  }

  addSubCardBtn.addEventListener('click', () => addSubCardRow());

  function addSubCardRow(subCard = null) {
    const div = document.createElement('div');
    div.className = 'subcard border p-2 mb-3 rounded bg-gray-100';

    const nameInput = document.createElement('input');
    nameInput.type = 'text';
    nameInput.placeholder = 'Nome da Subcategoria';
    nameInput.value = subCard ? subCard.name : '';
    nameInput.className = 'border border-gray-300 rounded px-2 py-1 w-full mb-1';

    const descInput = document.createElement('textarea');
    descInput.placeholder = 'Descrição da Subcategoria';
    descInput.rows = 2;
    descInput.value = subCard ? subCard.description : '';
    descInput.className = 'border border-gray-300 rounded px-2 py-1 w-full mb-1';

    const infosDiv = document.createElement('div');
    infosDiv.className = 'infos-subcard mb-1';

    if (subCard && subCard.infos) {
      subCard.infos.forEach(info => {
        const row = document.createElement('div');
        row.className = 'flex gap-2 mb-1';

        const monthInput = document.createElement('input');
        monthInput.type = 'text';
        monthInput.placeholder = 'Mês';
        monthInput.value = info.month;
        monthInput.className = 'border border-gray-300 rounded px-2 py-1 flex-grow';

        const valueInput = document.createElement('input');
        valueInput.type = 'number';
        valueInput.min = '0';
        valueInput.step = '0.01';
        valueInput.placeholder = 'Valor';
        valueInput.value = info.value;
        valueInput.className = 'border border-gray-300 rounded px-2 py-1 w-24';

        valueInput.addEventListener('input', updateTotal);

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.textContent = 'X';
        removeBtn.className = 'bg-red-500 text-white px-2 rounded';
        removeBtn.addEventListener('click', () => {
          row.remove();
          updateTotal();
        });

        row.appendChild(monthInput);
        row.appendChild(valueInput);
        row.appendChild(removeBtn);

        infosDiv.appendChild(row);
      });
    }

    const addInfoSubBtn = document.createElement('button');
    addInfoSubBtn.type = 'button';
    addInfoSubBtn.textContent = '+ Adicionar Mês e Valor';
    addInfoSubBtn.className = 'mb-2 px-3 py-1 rounded bg-blue-600 text-white';
    addInfoSubBtn.addEventListener('click', () => {
      const row = document.createElement('div');
      row.className = 'flex gap-2 mb-1';

      const monthInput = document.createElement('input');
      monthInput.type = 'text';
      monthInput.placeholder = 'Mês';
      monthInput.className = 'border border-gray-300 rounded px-2 py-1 flex-grow';

      const valueInput = document.createElement('input');
      valueInput.type = 'number';
      valueInput.min = '0';
      valueInput.step = '0.01';
      valueInput.placeholder = 'Valor';
      valueInput.className = 'border border-gray-300 rounded px-2 py-1 w-24';
      valueInput.addEventListener('input', updateTotal);

      const removeBtn = document.createElement('button');
      removeBtn.type = 'button';
      removeBtn.textContent = 'X';
      removeBtn.className = 'bg-red-500 text-white px-2 rounded';
      removeBtn.addEventListener('click', () => {
        row.remove();
        updateTotal();
      });

      row.appendChild(monthInput);
      row.appendChild(valueInput);
      row.appendChild(removeBtn);

      infosDiv.appendChild(row);
    });

    div.appendChild(nameInput);
    div.appendChild(descInput);
    div.appendChild(infosDiv);
    div.appendChild(addInfoSubBtn);

    subCardContainer.appendChild(div);
  }

  function updateTotal() {
    let total = 0;

    [...infoContainer.querySelectorAll('input[type="number"]')].forEach(input => {
      const val = parseFloat(input.value);
      if (!isNaN(val)) total += val;
    });

    [...subCardContainer.querySelectorAll('.infos-subcard input[type="number"]')].forEach(input => {
      const val = parseFloat(input.value);
      if (!isNaN(val)) total += val;
    });

    editTotalValue.textContent = total.toFixed(2).replace('.', ',');
  }

  saveEditBtn.addEventListener('click', () => {
    if (!currentCardId) return;

    const card = cards.find(c => c.id === currentCardId);
    if (!card) return;

    card.description = editCardDescription.value;

    // Atualiza infos principais
    card.infos = [];
    [...infoContainer.children].forEach(div => {
      const inputs = div.querySelectorAll('input');
      if (inputs.length >= 2) {
        const month = inputs[0].value.trim();
        const value = inputs[1].value.trim();
        if (month && value) card.infos.push({ month, value });
      }
    });

    // Atualiza subcards
    card.subCards = [];
    [...subCardContainer.children].forEach(div => {
      const inputs = div.querySelectorAll('input, textarea');
      if (inputs.length >= 3) {
        const name = inputs[0].value.trim();
        const description = inputs[1].value.trim();

        const infos = [];
        const infosDiv = div.querySelector('.infos-subcard');
        if (infosDiv) {
          [...infosDiv.children].forEach(row => {
            const rowInputs = row.querySelectorAll('input');
            if (rowInputs.length >= 2) {
              const month = rowInputs[0].value.trim();
              const value = rowInputs[1].value.trim();
              if (month && value) infos.push({ month, value });
            }
          });
        }
        if (name) {
          card.subCards.push({ name, description, infos });
        }
      }
    });

    renderCards();
    closeModal(editModal);
  });
});