document.addEventListener('DOMContentLoaded', () => {
  const perguntas = document.querySelectorAll('.faq-pergunta');

  perguntas.forEach(botao => {
    botao.addEventListener('click', () => {
      const respostaId = botao.getAttribute('aria-controls');
      const resposta = document.getElementById(respostaId);
      const expanded = botao.getAttribute('aria-expanded') === 'true';

      botao.setAttribute('aria-expanded', String(!expanded));
      resposta.classList.toggle('ativo');
    });
  });
});
