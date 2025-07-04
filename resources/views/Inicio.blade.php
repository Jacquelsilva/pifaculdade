@extends('layouts.main')

@section('title', 'Início')

@section('content')

<nav class="navbar" aria-label="Navegação principal">
  <div class="logo">
    <p>
      <img src="{{ asset('img/logonovomenor.png') }}" alt="Ícone do Recora" width="15" height="15">
    </p>
  </div>

  <ul class="nav-links">
    <li>
      <a href="/contato" aria-label="Ajuda">
        <i class="bi bi-question-circle" aria-hidden="true"></i>
        Ajuda
      </a>
    </li>
    <li>
      <a href="/login" aria-label="Entrar">
        <i class="bi bi-person" aria-hidden="true"></i>
        Entrar
      </a>
    </li>
  </ul>
</nav>

<!-- Hero Section (CTA Principal) -->
<section class="hero" aria-labelledby="hero-heading">
  <div class="hero-text">
    <h1 id="hero-heading">Organize suas Assinaturas com Recora</h1>
    <p>Controle suas contas e evite gastos desnecessários de forma inteligente.</p>
    <div class="hero-cta">
      <a href="/cadastro" class="btn btn-primary">Cadastre-se agora</a>
      <a href="#planos" class="btn btn-secondary">Conheça os planos</a>
    </div>
  </div>
  <div class="hero-img">
    <img src="{{ asset('img/fotosmartok.png') }}" alt="Aplicativo Recora mostrando dashboard de assinaturas" loading="lazy"
    style="max-width: 1100px; width: 500%; height: auto;">
  </div>
</section>

<!-- Benefícios/Diferenciais -->
<section class="diferenciais" aria-labelledby="diferenciais-heading">
  <h2 id="diferenciais-heading" class="visually-hidden">Nossos diferenciais</h2>
  <div class="diferencial-item">
    <i class="bi bi-graph-up" aria-hidden="true"></i>
    <h3>Economia comprovada</h3>
    <p>Usuários economizam em média R$120,00/mês</p>
  </div>
  <div class="diferencial-item">
    <i class="bi bi-bell" aria-hidden="true"></i>
    <h3>Alertas inteligentes</h3>
    <p>Notificações antes de cobranças e reajustes</p>
  </div>
  <div class="diferencial-item">
    <i class="bi bi-shield-check" aria-hidden="true"></i>
    <h3>Segurança</h3>
    <p>Seus dados protegidos com criptografia</p>
  </div>
</section>

<!-- App Feature -->
<section class="smartphone-promo" aria-labelledby="app-feature-heading">
  <div class="smartphone-content">
    <div class="smartphone-image">
      <img src="{{ asset('img/homem.jpg') }}" alt="App Recora sendo exibido em um smartphone" loading="lazy"
      style="max-width: 500px; width: 100%; height: auto;">
    </div>
    
    <div class="smartphone-text">
      <h2 id="app-feature-heading">Tudo na palma da sua mão</h2>
      <p>O aplicativo Recora oferece:</p>
      <ul>
        <li><span aria-hidden="true">✅</span> Controle em tempo real</li>
        <li><span aria-hidden="true">📊</span> Análises personalizadas</li>
        <li><span aria-hidden="true">🔔</span> Alertas push importantes</li>
        <li><span aria-hidden="true">💳</span> Gerenciamento multiplataforma</li>
      </ul>
      <div class="app-download">
        <div class="download-buttons">
          <a href="#" class="download-btn google-play" aria-label="Baixar na Google Play">
            <span class="store-logo">
              <svg viewBox="0 0 24 24" width="24" height="24">
                <path d="M3.063 3.627v16.747c0 .54.442.977.987.977h16.762c.545 0 .987-.438.987-.977V3.627c0-.54-.442-.977-.987-.977H4.05c-.545 0-.987.438-.987.977zm16.762 1.955H4.05v14.836h15.775V5.582zM12 7.174l3.482 3.482-3.482 3.482-3.482-3.482L12 7.174zm-4.468 2.495l3.482 3.482-3.482 3.482V9.669zm8.936 0v7.413l-3.482-3.482 3.482-3.482z"/>
              </svg>
            </span>
            <span class="store-info">
              <span class="available-on">Disponível no</span>
              <span class="store-name">Google Play</span>
            </span>
          </a>

          <a href="#" class="download-btn app-store" aria-label="Baixar na App Store">
            <span class="store-logo">
              <svg viewBox="0 0 24 24" width="24" height="24">
                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
              </svg>
            </span>
            <span class="store-info">
              <span class="available-on">Baixe na</span>
              <span class="store-name">App Store</span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Depoimentos -->
<section class="depoimentos" aria-labelledby="depoimentos-heading">
  <h2 id="depoimentos-heading">Quem usa recomenda</h2>
  <div class="depoimento-lista">
    <div class="depoimento">
      <div class="rating" aria-label="5 estrelas">★★★★★</div>
      <p>"Economizei R$150,00 no primeiro mês!"</p>
      <span>João M., São Paulo</span>
    </div>
    <div class="depoimento">
      <div class="rating" aria-label="4 estrelas">★★★★☆</div>
      <p>"Finalmente tenho controle das minhas assinaturas"</p>
      <span>Ana L., Rio de Janeiro</span>
    </div>
    <div class="depoimento">
      <div class="rating" aria-label="5 estrelas">★★★★★</div>
      <p>"O app mudou minha relação com gastos recorrentes"</p>
      <span>Lucas R., Curitiba</span>
    </div>
  </div>
</section>

<!-- Planos (com âncora #planos) -->
<section id="planos" class="planos" aria-labelledby="planos-heading">
  <div class="planos-header">
    <h2 id="planos-heading">Planos que cabem no seu bolso</h2>
    <p class="planos-obs">Experimente 30 dias grátis</p>
    <p class="planos-obs">*Cancele quando quiser sem taxas</p>
  </div>
  <div class="planos-grid">
    <div class="plano">
      <h3>Básico</h3>
      <p class="preco">Grátis</p>
      <ul>
        <li><span aria-hidden="true">✓</span> Até 5 assinaturas</li>
        <li><span aria-hidden="true">✓</span> Relatórios básicos</li>
        <li><span aria-hidden="true">✓</span> Suporte por e-mail</li>
        <li class="nao-inclui"><span aria-hidden="true">✗</span> Alertas personalizados</li>
      </ul>
      <a href="/cadastro" class="btn">Começar agora</a>
    </div>
    <div class="plano destaque">
      <div class="badge-recomendado">Recomendado</div>
      <h3>Premium</h3>
      <p class="preco">R$9,90/mês</p>
      <ul>
        <li><span aria-hidden="true">✓</span> Assinaturas ilimitadas</li>
        <li><span aria-hidden="true">✓</span> Relatórios completos</li>
        <li><span aria-hidden="true">✓</span> Alertas inteligentes</li>
        <li><span aria-hidden="true">✓</span> Suporte prioritário</li>
      </ul>
      <a href="/cadastro" class="btn btn-premium">Assinar Premium</a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section aria-labelledby="faq-title">
  <h2 id="faq-title">PERGUNTAS FREQUENTES</h2>

  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button 
          class="accordion-button" 
          type="button" 
          data-bs-toggle="collapse" 
          data-bs-target="#collapseOne" 
          aria-expanded="true" 
          aria-controls="collapseOne">
          Como faço para cancelar minha assinatura pelo app?
        </button>
      </h2>
      <div 
        id="collapseOne" 
        class="accordion-collapse collapse show" 
        aria-labelledby="headingOne" 
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Você pode cancelar assinaturas diretamente pelo app acessando a seção "Minhas Assinaturas" e selecionando o botão "Cancelar" na assinatura desejada.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button 
          class="accordion-button collapsed" 
          type="button" 
          data-bs-toggle="collapse" 
          data-bs-target="#collapseTwo" 
          aria-expanded="false" 
          aria-controls="collapseTwo">
          O app possui versão gratuita?
        </button>
      </h2>
      <div 
        id="collapseTwo" 
        class="accordion-collapse collapse" 
        aria-labelledby="headingTwo" 
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Sim! O app oferece funcionalidades gratuitas para gerenciamento básico das suas assinaturas e notificações.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button 
          class="accordion-button collapsed" 
          type="button" 
          data-bs-toggle="collapse" 
          data-bs-target="#collapseThree" 
          aria-expanded="false" 
          aria-controls="collapseThree">
          Posso receber alertas de cobrança?
        </button>
      </h2>
      <div 
        id="collapseThree" 
        class="accordion-collapse collapse" 
        aria-labelledby="headingThree" 
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Sim, você pode ativar notificações para receber alertas antes das próximas cobranças das suas assinaturas.
        </div>
      </div>
    </div>
  </div>
</section>


<!-- CTA Final -->
<section class="cta-final" aria-labelledby="cta-final-heading">
  <h2 id="cta-final-heading">Pronto para transformar seu controle financeiro?</h2>
  <a href="/cadastro" class="btn btn-cta">Comece gratuitamente</a>
  <p>30 dias grátis • Sem necessidade de cartão</p>
</section>

@endsection

@section('footer')
<!-- Footer -->
<footer class="footer" aria-label="Rodapé">
  <div class="footer-content">
    <div class="footer-links">
      <div class="footer-col">
        <h4>Produto</h4>
        <a href="/recursos">Recursos</a>
        <a href="/planos">Planos</a>
        <a href="/app">Aplicativo</a>
      </div>
      <div class="footer-col">
        <h4>Empresa</h4>
        <a href="/sobre">Sobre nós</a>
        <a href="/contato">Contato</a>
      </div>
      <div class="footer-col">
        <h4>Legal</h4>
        <a href="/privacidade">Privacidade</a>
        <a href="/termos">Termos</a>
      </div>
    </div>
  </div>

  <div class="footer-copyright">
    <p>© 2025 Recora. Todos os direitos reservados.</p>
</footer>

<!-- Botão flutuante -->
<a href="/cadastro" class="cta-flutuante" aria-label="Comece agora">
  <i class="bi bi-plus-lg" aria-hidden="true"></i>
  <span>Comece agora</span>
</a>
@endsection
