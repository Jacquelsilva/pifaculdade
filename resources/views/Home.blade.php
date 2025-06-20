@extends('layouts.dash')

@section('title', 'home')

@section('content')
<div class="dashboard py-6">
  <!-- <main class="main-content">
    <div class="content"> -->
  <main class="main-content p-4">
    <div class="content max-w-screen-lg mx-auto">
   

      <div class="max-w-screen-md mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-[var(--texto)]">Seja Bem-Vindo(a), Isabela!</h2>
      </div>

      <section
        id="cardsContainer"
        class="
          grid grid-cols-2 gap-4                   
          sm:[grid-template-columns:repeat(auto-fill,minmax(200px,1fr))] 
          sm:gap-6  
          flex flex-wrap justify-center gap-2     
          sm:grid                                  
  ">
        <div class="card blue bg-[var(--primaria)] flex items-center justify-center aspect-square rounded-lg text-white font-bold">
          STREAMING
        </div>
        <div class="card red bg-red-500 flex items-center justify-center aspect-square rounded-lg text-white font-bold">
          CONSULTAS
        </div>
        <div
          id="addCard"
          class="card add bg-[var(--secundaria)] flex items-center justify-center aspect-square rounded-lg text-white font-bold
     text-3xl">
          +
        </div>
        <!-- …outros cards… -->
      </section>



    </div>
  </main>

</div>

<!-- Modal para criar novo card -->
<div id="createCardModal" class="modal hidden shadow-lg bg-[var(--bg)]">
  <div
    class="text-[var(--texto)] rounded-lg  p-6 max-w-md w-full mx-auto">
    <h3 class="text-xl font-semibold mb-4">Criar Novo Card</h3>

    <div class="mb-4 mt-6">
      <label for="cardName" class="block mb-1 text-lg">Nome do Card:</label>
      <input
        type="text"
        id="cardName"
        placeholder="Digite o nome"
        class="block w-full mt-4
             bg-[var(--fundo)] text-[var(--texto)]
             border border-[var(--borda)]
             rounded-md py-2 px-3
             placeholder:text-[var(--borda)]
             focus:outline-none focus:ring-2 focus:ring-[var(--primaria)] focus:border-[var(--primaria)]
             transition-colors duration-150" />
    </div>

    <div class="mb-6">
      <label for="cardColor" class="block mb-1 text-lg">Cor:</label>
      <input
        type="color"
        id="cardColor"
        value="#6c5ce7"
        class="h-10 w-16 p-1 mt-4
             border border-[var(--borda)]
             rounded-md
             focus:outline-none focus:ring-2 focus:ring-[var(--primaria)]
             transition-colors duration-150" />
    </div>

    <div class="flex justify-end gap-2">
      <button
        id="cancelCreate"
        class="text-[var(--texto)]
         bg-[var(--borda)]
         px-4 py-2 rounded-md border border-[var(--borda)] shadow-md
         hover:bg-[var(--borda)] transition-colors duration-150">
        Cancelar
      </button>
      <button
        id="createCardBtn"
        class="bg-[var(--primaria)] text-[var(--texto-botao)]
             px-4 py-2 rounded-md border border-[var(--borda)] shadow-md
             hover:bg-[var(--secundaria)] transition-colors duration-150 bg-[var(--fundo)]">
        Criar
      </button>
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

<!-- @section('scripts') -->
<!-- <link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="{{ asset('js/home.js') }}"></script> -->
<!-- @endsection -->