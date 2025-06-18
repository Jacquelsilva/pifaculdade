@extends('layouts.main')

@section('title', 'home')

@section('content')
<div class="dashboard">
  <aside class="sidebar">
    <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    <nav>
      <ul>
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i><span>Home</span></a></li>
        <li><a href="{{ route('historico') }}"><i class="fas fa-history"></i><span>Histórico</span></a></li>
        <li><a href="{{ route('configuracao') }}"><i class="fas fa-cog"></i><span>Configurações</span></a></li>
        <li><a href="{{ route('dashboard') }}"><i class="fas fa-info-circle"></i><span>Relatórios</span></a></li>
        <li><a href="{{ route('saibamais') }}"><i class="fas fa-info-circle"></i><span>Saiba mais</span></a></li>
      </ul>

      <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" style="background: none; border: none; color: inherit; padding: 0; display: flex; align-items: center;">
            <i class="fas fa-sign-out-alt"></i>
            <span style="margin-left: 5px;">Sair</span>
          </button>
        </form>
      </div>
    </nav>
  </aside>

  <main class="main-content">
    <header>
      <h1>Seja Bem-Vindo(a), Isabela!</h1>
    </header>

    <section class="cards" id="cardsContainer">
      <div class="card blue" data-info="">STREAMING</div>
      <div class="card red" data-info="">CONSULTAS</div>
      <div class="card add" id="addCard"><i>+</i></div>
    </section>
  </main>
</div>

<!-- Modal para criar novo card -->
<div id="createCardModal" class="modal hidden">
  <div class="modal-content">
    <h3>Criar Novo Card</h3>
    <label for="cardName">Nome do Card:</label>
    <input type="text" id="cardName" placeholder="Digite o nome">

    <label for="cardColor">Cor:</label>
    <input type="color" id="cardColor" value="#6c5ce7">

    <div class="modal-buttons">
      <button id="createCardBtn">Criar</button>
      <button id="cancelCreate">Cancelar</button>
    </div>
  </div>
</div>

<!-- Modal de visualização -->
<div id="viewModal" class="modal hidden">
  <div class="modal-content">
    <h3>Informações do Card</h3>
    <p id="cardInfoView"></p>
    <div class="modal-buttons">
      <button id="editCardBtn">Editar</button>
      <button id="closeViewBtn">Fechar</button>
    </div>
  </div>
</div>

<!-- Modal de edição -->
<div id="editModal" class="modal hidden">
  <div class="modal-content">
    <h3>Editar Informações do Card</h3>
    <form id="editCardForm">
       <label for="editCardDescription">Descrição:</label>
      <textarea id="editCardDescription" placeholder="Digite uma descrição..." rows="3" style="width: 100%; margin-bottom: 10px;"></textarea>
      <div id="infoContainer"></div>
      <button type="button" id="addInfoBtn">+ Adicionar Mês e Valor</button>
      <button type="button" id="addSubCardBtn">+ Adicionar Subcategoria</button>
      <div id="subCardContainer" style="margin-top: 10px;"></div>

      <p style="margin-top: 10px;">
        <strong>Total
        
        :</strong> R$ <span id="editTotalValue">0,00</span>
      </p>
    </form>

    <div class="modal-buttons">
      <button id="saveEditBtn">Salvar</button>
      <button id="cancelEditBtn">Cancelar</button>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="{{ asset('js/home.js') }}"></script>
@endsection
