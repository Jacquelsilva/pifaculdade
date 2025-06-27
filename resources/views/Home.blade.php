@extends('layouts.dash', ['hideFooter' => true])

@section('title', 'Gerenciador Financeiro')

@section('content')
<div class="container-home">
  <h1>Gerenciador Financeiro</h1>

  <div class="card-container" id="cardContainer">
    <div class="card add-card" onclick="abrirModal()">
      <span class="plus">+</span>
      <strong>Adicionar Novo Card</strong>
      <small>Clique para criar</small>
    </div>
  </div>

  <div class="empty-state" id="emptyState">
    <div class="icon">💲</div>
    <h2>Nenhum card criado ainda</h2>
    <p>Comece criando seu primeiro card financeiro</p>
    <button onclick="abrirModal()">Criar Primeiro Card</button>
  </div>

  <div style="margin-top: 20px;">
    <button class="save-btn" onclick="enviarParaBackend()">Enviar para o Banco</button>
  </div>
</div>
@endsection

@section('modals')
<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <h2 id="modalTitle">Novo Card</h2>

    <label>Cor do Card</label>
    <div class="colors" id="colorOptions">
      <div class="color blue selected" data-color="#2979ff"></div>
      <div class="color green" data-color="#00b894"></div>
      <div class="color purple" data-color="#a29bfe"></div>
      <div class="color pink" data-color="#d63031"></div>
      <div class="color orange" data-color="#fd7e14"></div>
      <div class="color teal" data-color="#00cec9"></div>
    </div>

    <label for="desc">Descrição</label>
    <textarea id="desc" placeholder="Digite uma descrição para este card..."></textarea>

    <label>Adicionar Mês e Valor</label>
    <div class="month-value">
      <select id="monthSelect">
        <option value="">Selecione o mês...</option>
        <option>Janeiro</option>
        <option>Fevereiro</option>
        <option>Março</option>
        <option>Abril</option>
        <option>Maio</option>
        <option>Junho</option>
        <option>Julho</option>
        <option>Agosto</option>
        <option>Setembro</option>
        <option>Outubro</option>
        <option>Novembro</option>
        <option>Dezembro</option>
      </select>
      <input type="number" id="valueInput" placeholder="0,00" />
    </div>

    <div class="buttons">
      <button class="cancel-btn" onclick="fecharModal()">Cancelar</button>
      <button class="save-btn" onclick="salvarCard()">Salvar</button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  const cardContainer = document.getElementById('cardContainer');
  const emptyState = document.getElementById('emptyState');
  const modalOverlay = document.getElementById('modalOverlay');
  const modalTitle = document.getElementById('modalTitle');

  let selectedColor = '#2979ff';
  let cardsData = [];
  let editIndex = null;

  document.querySelectorAll('.color').forEach(color => {
    color.addEventListener('click', () => {
      document.querySelectorAll('.color').forEach(c => c.classList.remove('selected'));
      color.classList.add('selected');
      selectedColor = color.dataset.color;
    });
  });

  function abrirModal() {
    modalOverlay.style.display = 'flex';
    modalTitle.textContent = editIndex !== null ? 'Editar Card' : 'Novo Card';
  }

  function fecharModal() {
    modalOverlay.style.display = 'none';
    limparModal();
  }

  function limparModal() {
    document.getElementById('desc').value = '';
    document.getElementById('monthSelect').value = '';
    document.getElementById('valueInput').value = '';
    editIndex = null;
  }

  function salvarCard() {
    const desc = document.getElementById('desc').value.trim();
    const month = document.getElementById('monthSelect').value;
    const value = document.getElementById('valueInput').value;

    if (!desc || !month || !value) {
      alert('Preencha todos os campos!');
      return;
    }

    const entrada = { mes: month, valor: parseFloat(value).toFixed(2) };

    if (editIndex !== null) {
      cardsData[editIndex].entradas.push(entrada);
    } else {
      cardsData.push({
        descricao: desc,
        color: selectedColor,
        entradas: [entrada]
      });
    }

    renderCards();
    fecharModal();
  }

  function editarCard(index) {
    const card = cardsData[index];
    document.getElementById('desc').value = card.descricao;
    selectedColor = card.color;
    editIndex = index;

    document.querySelectorAll('.color').forEach(c => {
      c.classList.toggle('selected', c.dataset.color === selectedColor);
    });

    abrirModal();
  }

  function removerCard(index) {
    cardsData.splice(index, 1);
    renderCards();
  }

  function renderCards() {
    const cards = cardContainer.querySelectorAll('.card:not(.add-card)');
    cards.forEach(card => card.remove());

    cardsData.forEach((card, index) => {
      const cardDiv = document.createElement('div');
      cardDiv.className = 'card';
      cardDiv.setAttribute('style', `
        background-color: ${card.color};
        width: 160px;
        height: auto;
        border-radius: 10px;
        padding: 10px;
        color: #fff;
        margin-bottom: 10px;
        text-align: center;
      `);

      let entradasHTML = '';
      let total = 0;

      card.entradas.forEach(entrada => {
        entradasHTML += `<p><strong>${entrada.mes}:</strong> R$ ${entrada.valor}</p>`;
        total += parseFloat(entrada.valor);
      });

      entradasHTML += `<hr><p><strong>Total:</strong> R$ ${total.toFixed(2)}</p>`;

      cardDiv.innerHTML = `
        <h3 style="margin: 0;">${card.descricao}</h3>
        ${entradasHTML}
        <button onclick="editarCard(${index})" style="padding: 5px 8px; margin-top: 6px;">Editar</button>
        <button onclick="removerCard(${index})" style="padding: 5px 8px; margin-top: 6px;">Remover</button>
      `;

      const addCard = cardContainer.querySelector('.add-card');
      cardContainer.insertBefore(cardDiv, addCard);
    });

    emptyState.style.display = cardsData.length === 0 ? 'block' : 'none';
  }

  async function enviarParaBackend() {
    if (cardsData.length === 0) {
      alert('Nenhum card para enviar.');
      return;
    }

    try {
      const response = await fetch('/cards-lote', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ cards: cardsData })
      });

      if (!response.ok) throw new Error('Erro ao salvar os dados no servidor.');
      alert('Cards salvos com sucesso!');
    } catch (error) {
      console.error(error);
      alert('Erro ao enviar dados para o servidor.');
    }
  }

  // 🔄 CARREGA OS CARDS SALVOS QUANDO A TELA ABRIR
  async function fetchCardsSalvos() {
    try {
      const response = await fetch('/cards');
      if (!response.ok) throw new Error('Erro ao buscar os cards');
      const data = await response.json();

      cardsData = data.map(card => ({
        descricao: card.descricao,
        color: card.color,
        entradas: card.entradas.map(e => ({
          mes: e.mes,
          valor: parseFloat(e.valor).toFixed(2)
        }))
      }));

      renderCards();
    } catch (err) {
      console.error('Erro ao carregar cards:', err);
    }
  }

  // 🚀 Inicia carregamento automático
  window.onload = fetchCardsSalvos;
</script>
@endpush
