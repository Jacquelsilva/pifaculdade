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

  <main class="main-content">

  <div style="display: flex; justify-content: flex-end; width: 100%; padding: 0px;">
    <img src="{{ asset('img/boasvindanovo.jpg') }}" 
         alt="Imagem de boas vindas" 
         style="max-width: 800px; width: 100%; height: auto;">
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
@endsection
