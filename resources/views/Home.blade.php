@extends('layouts.dash')

@section('title', 'home')

@section('content')
<div class="dashboard py-6">
  <main class="main-content p-4">
    <div class="content max-w-screen-xl mx-auto">

      <div class="max-w-screen-md mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-[var(--texto)]">
          Seja Bem-Vindo(a), {{ auth()->user()->nome_usuario }}!
        </h2>
      </div>

      <!-- Área de Cards -->
<!-- Área de Cards -->
<section
  id="cardsContainer"
  class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4"
>
  <!-- Botão de adicionar card -->
  <div
    id="addCard"
    class="card add bg-[var(--secundaria)] flex items-center justify-center aspect-square rounded-lg text-white font-extrabold text-5xl cursor-pointer select-none hover:bg-[var(--primaria)] transition"
    title="Adicionar novo card"
  >
    +
  </div>

  {{-- Aqui serão renderizados dinamicamente os cards existentes --}}
</section>



      <!-- Imagem de boas-vindas -->
      <div style="display: flex; justify-content: flex-end; width: 100%; padding: 0;">
        <img src="{{ asset('img/boasvindanovo.jpg') }}"
             alt="Imagem de boas vindas"
             style="max-width: 800px; width: 100%; height: auto;">
      </div>
    </div>
  </main>
</div>

<!-- Modal para criar novo card -->
<div id="createCardModal" class="modal hidden shadow-lg bg-[var(--bg)]">
  <div class="text-[var(--texto)] rounded-lg p-6 max-w-md w-full mx-auto bg-white dark:bg-gray-800">
    <h3 class="text-xl font-semibold mb-4">Criar Novo Card</h3>

    <div class="mb-4 mt-6">
      <label for="cardNameInput" class="block mb-1 text-lg">Nome do Card:</label>
      <input
        type="text"
        id="cardNameInput"
        placeholder="Digite o nome"
        class="block w-full mt-4 bg-[var(--fundo)] text-[var(--texto)] border border-[var(--borda)] rounded-md py-2 px-3 placeholder:text-[var(--borda)] focus:outline-none focus:ring-2 focus:ring-[var(--primaria)] focus:border-[var(--primaria)] transition-colors duration-150" />
    </div>

    <div class="mb-6">
      <label for="cardColorInput" class="block mb-1 text-lg">Cor:</label>
      <input
        type="color"
        id="cardColorInput"
        value="#6c5ce7"
        class="h-10 w-16 p-1 mt-4 border border-[var(--borda)] rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--primaria)] transition-colors duration-150" />
    </div>

    <div class="flex justify-end gap-2">
      <button
        id="cancelCreate"
        class="text-[var(--texto)] bg-[var(--borda)] px-4 py-2 rounded-md border border-[var(--borda)] shadow-md hover:bg-[var(--borda)] transition-colors duration-150">
        Cancelar
      </button>
      <button
        id="createCardBtn"
        class="bg-[var(--primaria)] text-[var(--texto-botao)] px-4 py-2 rounded-md border border-[var(--borda)] shadow-md hover:bg-[var(--secundaria)] transition-colors duration-150 bg-[var(--fundo)]">
        Criar
      </button>
    </div>
  </div>
</div>

<!-- Modal de visualização -->
<div id="viewModal" class="modal hidden">
  <div class="modal-content  p-6 rounded-lg max-w-md w-full mx-auto ">
    <h3 class="text-xl font-semibold mb-4">Informações do Card</h3>
    <div id="cardInfoView" class="mb-6"></div>
    <div class="modal-buttons flex justify-end gap-2">
      <button id="editCardBtn" class="px-4 py-2 bg-[var(--primaria)] text-[var(--texto-botao)] rounded-md">Editar</button>
      <button id="closeViewBtn" class="px-4 py-2 bg-[var(--borda)] text-[var(--texto)] rounded-md">Fechar</button>
    </div>
  </div>
</div>

<!-- Modal de edição -->
<div id="editModal" class="modal hidden">
  <div class="modal-content bg-white p-6 rounded-lg max-w-lg w-full mx-auto" 
       style="max-height: 80vh; display: flex; flex-direction: column; color:black">

    <h3 class="text-xl font-semibold mb-4">Editar Informações do Card</h3>

    <form id="editCardForm" style="overflow-y: auto; ">
      <label for="editCardDescription" class="block mb-1">Descrição:</label>
      <textarea id="editCardDescription" placeholder="Digite uma descrição..." 
        class="w-full mb-4 border border-gray-300 rounded px-3 py-2"></textarea>

      <div id="infoContainer" class="mb-4"></div>

      <button type="button" id="addInfoBtn" class="mb-4 px-3 py-1 rounded">+ Adicionar Mês e Valor</button>
      <button type="button" id="addSubCardBtn" class="mb-4 px-3 py-1 rounded">+ Adicionar Subcategoria</button>

      <div id="subCardContainer" class="mb-4"></div>

      <p><strong>Total:</strong> R$ <span id="editTotalValue">0,00</span></p>
    </form>

    <div class="modal-buttons flex justify-end gap-2 mt-4"
         style="position: sticky; bottom: 0; padding-top: 12px; border-top: 1px solid #ccc; z-index: 10;">
      <button type="button" id="saveEditBtn" class="px-4 py-2 rounded-md">Salvar</button>
      <button type="button" id="cancelEditBtn" class="px-4 py-2 rounded-md">Cancelar</button>
    </div>
  </div>
</div>

@section('scripts')
<script>
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
</script>
@endsection
