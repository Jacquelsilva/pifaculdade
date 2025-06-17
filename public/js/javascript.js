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

// Dentro do DOMContentLoaded
document.addEventListener("DOMContentLoaded", () => {
  const cardsContainer     = document.getElementById("cardsContainer");
  const createCardModal    = document.getElementById("createCardModal");
  const viewModal          = document.getElementById("viewModal");
  const editModal          = document.getElementById("editModal");

  const createCardBtn      = document.getElementById("createCardBtn");
  const cancelCreate       = document.getElementById("cancelCreate");
  const cardNameInput      = document.getElementById("cardName");
  const cardColorInput     = document.getElementById("cardColor");
  const addCard            = document.getElementById("addCard");

  const cardInfoView       = document.getElementById("cardInfoView");
  const editCardBtn        = document.getElementById("editCardBtn");
  const closeViewBtn       = document.getElementById("closeViewBtn");

  const infoContainer      = document.getElementById("infoContainer");
  const addInfoBtn         = document.getElementById("addInfoBtn");
  const editTotalValue     = document.getElementById("editTotalValue");
  const editCardDescription= document.getElementById("editCardDescription");

  const saveEditBtn        = document.getElementById("saveEditBtn");
  const cancelEditBtn      = document.getElementById("cancelEditBtn");

  const addSubCardBtn      = document.getElementById("addSubCardBtn");
  const subCardContainer   = document.getElementById("subCardContainer");

  let currentCard = null;

  // Criar nova categoria principal
  addCard.addEventListener("click", () => {
    cardNameInput.value = "";
    cardColorInput.value = "#6c5ce7";
    createCardModal.classList.remove("hidden");
  });

  cancelCreate.addEventListener("click", () => {
    createCardModal.classList.add("hidden");
  });

  createCardBtn.addEventListener("click", () => {
    const name  = cardNameInput.value.trim();
    const color = cardColorInput.value;

    if (!name) return alert("Nome do card é obrigatório");

    const cardData = {
      name,
      color,
      description: "",
      valores: [],
      subcategorias: []
    };

    const card = document.createElement("div");
    card.className = "card";
    card.style.backgroundColor = color;
    card.textContent = name;
    card.dataset.info = JSON.stringify(cardData);
    card.addEventListener("click", () => openViewModal(card));

    cardsContainer.insertBefore(card, addCard);
    createCardModal.classList.add("hidden");

    card.addEventListener("click", () => openViewModal(card));
  });

  function openViewModal(card) {
    currentCard = card;
    const data = JSON.parse(card.dataset.info);
    let html = `<strong>Nome:</strong> ${data.name}<br>`;

    if (data.description) {
      html += `<strong>Descrição:</strong> ${data.description}<br>`;
    }

    if (data.valores.length) {
      let total = 0;
      html += "<strong>Valores:</strong><ul>";
      data.valores.forEach(v => {
        html += `<li>${v.mes}: R$ ${parseFloat(v.valor).toFixed(2)}</li>`;
        total += parseFloat(v.valor);
      });
      html += `</ul><strong>Total:</strong> R$ ${total.toFixed(2)}<br>`;
    }

    if (data.subcategorias.length) {
      html += "<strong>Subcategorias:</strong><ul>";
      data.subcategorias.forEach(sub => {
        html += `<li><em>${sub.descricao}</em><ul>`;
        sub.valores.forEach(v => {
          html += `<li>${v.mes}: R$ ${parseFloat(v.valor).toFixed(2)}</li>`;
        });
        const subTotal = sub.valores.reduce((sum, v) => sum + parseFloat(v.valor), 0);
        html += `</ul>Total Sub: R$ ${subTotal.toFixed(2)}</li>`;
      });
      html += "</ul>";
    }

    cardInfoView.innerHTML = html;
    viewModal.classList.remove("hidden");
  }

  closeViewBtn.addEventListener("click", () => {
    viewModal.classList.add("hidden");
  });
  

  editCardBtn.addEventListener("click", () => {
    const data = JSON.parse(currentCard.dataset.info);
    infoContainer.innerHTML = "";
    subCardContainer.innerHTML = "";

    editCardDescription.value = data.description;
    data.valores.forEach(({ mes, valor }) => addInfoField(mes, valor));
    data.subcategorias.forEach(sub => {
      const subBox = createSubCard(sub.descricao, sub.valores);
      subCardContainer.appendChild(subBox);
    });

    updateEditTotal();
    viewModal.classList.add("hidden");
    editModal.classList.remove("hidden");
  });

  cancelEditBtn.addEventListener("click", () => {
    editModal.classList.add("hidden");
  });

  saveEditBtn.addEventListener("click", () => {
    const valores = [];
    infoContainer.querySelectorAll(".info-group").forEach(group => {
      const mes   = group.querySelector("select").value;
      const valor = parseFloat(group.querySelector("input").value) || 0;
      if (mes) valores.push({ mes, valor });
    });

    const subcategorias = [];
    subCardContainer.querySelectorAll(".subcard-box").forEach(box => {
      const descricao = box.querySelector("textarea").value.trim();
      const vals = [];
      box.querySelectorAll(".info-group").forEach(g => {
        vals.push({
          mes: g.querySelector("select").value,
          valor: parseFloat(g.querySelector("input").value) || 0
        });
      });
      subcategorias.push({ descricao, valores: vals });
    });

    const data = JSON.parse(currentCard.dataset.info);
    data.description    = editCardDescription.value.trim();
    data.valores        = valores;
    data.subcategorias  = subcategorias;
    currentCard.dataset.info = JSON.stringify(data);

    // Atualizar o texto do card (nome)
    currentCard.textContent = data.name || currentCard.textContent;

    // Atualizar a cor, se quiser permitir edição da cor no futuro
    // currentCard.style.backgroundColor = data.color || currentCard.style.backgroundColor;

    editModal.classList.add("hidden");

    // Reabrir modal de visualização com os dados atualizados
    openViewModal(currentCard);
  });

  addInfoBtn.addEventListener("click", () => addInfoField());

  function addInfoField(mes = "", valor = "") {
    const group = document.createElement("div");
    group.className = "info-group";

    const select = document.createElement("select");
    ["Janeiro","Fevereiro","Março","Abril","Maio","Junho",
     "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"]
      .forEach(m => {
        const opt = document.createElement("option");
        opt.value = opt.textContent = m;
        if (m === mes) opt.selected = true;
        select.appendChild(opt);
      });

    const input = document.createElement("input");
    input.type = "number";
    input.placeholder = "Valor";
    input.value = valor;
    input.addEventListener("input", updateEditTotal);

    const removeBtn = document.createElement("button");
    removeBtn.type = "button";
    removeBtn.className = "remove-info";
    removeBtn.textContent = "X";
    removeBtn.addEventListener("click", () => {
      group.remove();
      updateEditTotal();
    });

    group.appendChild(select);
    group.appendChild(input);
    group.appendChild(removeBtn);
    infoContainer.appendChild(group);
  }

  function updateEditTotal() {
    let tot = 0;
    infoContainer.querySelectorAll("input[type='number']").forEach(i => {
      const v = parseFloat(i.value);
      if (!isNaN(v)) tot += v;
    });
    editTotalValue.textContent = tot.toFixed(2);
  }

  addSubCardBtn.addEventListener("click", () => {
    const subBox = createSubCard();
    subCardContainer.appendChild(subBox);
  });

  function createSubCard(descValue = "", valores = []) {
    const container = document.createElement("div");
    container.className = "subcard-box";
    container.style.cssText = "border:1px solid #ccc;padding:10px;margin-top:10px;border-radius:6px;background:#f8f9fa";

    const desc = document.createElement("textarea");
    desc.placeholder = "Descrição da Subcategoria";
    desc.rows = 2;
    desc.style.width = "100%";
    desc.style.marginBottom = "10px";
    desc.value = descValue;

    const subInfo = document.createElement("div");

    const totalDisplay = document.createElement("p");
    totalDisplay.innerHTML = `<strong>Total Subcategoria:</strong> R$ <span>0.00</span>`;

    const btn = document.createElement("button");
    btn.type = "button";
    btn.textContent = "+ Adicionar Mês/Valor";
    btn.style.marginBottom = "10px";
    btn.addEventListener("click", () => {
      const g = document.createElement("div");
      g.className = "info-group";

      const sel = document.createElement("select");
      ["Janeiro","Fevereiro","Março","Abril","Maio","Junho",
       "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"]
        .forEach(m => {
          const o = document.createElement("option");
          o.value = o.textContent = m;
          sel.appendChild(o);
        });

      const inp = document.createElement("input");
      inp.type = "number";
      inp.placeholder = "Valor";
      inp.addEventListener("input", updateSubTotal);

      const rem = document.createElement("button");
      rem.type = "button";
      rem.textContent = "X";
      rem.className = "remove-info";
      rem.addEventListener("click", () => {
        g.remove();
        updateSubTotal();
      });

      g.appendChild(sel);
      g.appendChild(inp);
      g.appendChild(rem);
      subInfo.appendChild(g);
      updateSubTotal();
    });

    function updateSubTotal() {
      let t = 0;
      subInfo.querySelectorAll("input[type='number']").forEach(i => {
        const v = parseFloat(i.value);
        if (!isNaN(v)) t += v;
      });
      totalDisplay.querySelector("span").textContent = t.toFixed(2);
    }

    valores.forEach(v => {
      btn.click();
      const last = subInfo.lastElementChild;
      last.querySelector("select").value = v.mes;
      last.querySelector("input").value  = v.valor;
    });
    updateSubTotal();

    container.appendChild(desc);
    container.appendChild(subInfo);
    container.appendChild(btn);
    container.appendChild(totalDisplay);
    return container;
  }
});




/*Editar conta*/
const temaServidor = document.documentElement.className || 'claro';
localStorage.setItem('tema', temaServidor);
const idiomaServidor = document.getElementById('selectIdioma').value || 'pt';
localStorage.setItem('idioma', idiomaServidor);

const temaSalvo = localStorage.getItem('tema');
const idiomaSalvo = localStorage.getItem('idioma');

selectTema.value = temaSalvo;
selectIdioma.value = idiomaSalvo;

aplicarTema(temaSalvo);
aplicarIdioma(idiomaSalvo);
