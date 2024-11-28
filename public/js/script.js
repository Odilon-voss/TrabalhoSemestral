document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.survey-container');
    const mensagem = document.createElement('div');
    mensagem.id = 'mensagem';
    form.appendChild(mensagem);
    
    const tempoTotal = 2 * 60; // Tempo total em segundos (2 minutos)
    let tempoRestante = tempoTotal;

    // Exibir o temporizador
    const temporizador = document.createElement('div');
    temporizador.id = 'temporizador';
    temporizador.style.textAlign = 'center';
    temporizador.style.marginTop = '20px';
    form.prepend(temporizador);

    // Função para atualizar o temporizador
    function atualizarTemporizador() {
        const minutos = Math.floor(tempoRestante / 60);
        const segundos = tempoRestante % 60;
        temporizador.textContent = `Tempo restante: ${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;
        
        if (tempoRestante <= 0) {
            clearInterval(intervalo);
            mensagem.textContent = "O tempo para responder acabou. Agradecemos sua tentativa!";
            desabilitarBotoes();
        }
        
        tempoRestante--;
    }

    // Desabilitar os botões ao final do tempo
    function desabilitarBotoes() {
        const botoes = document.querySelectorAll('.scale-btn');
        botoes.forEach(botao => {
            botao.disabled = true;
            botao.style.backgroundColor = '#ccc';
        });
    }

    // Atribuir evento de clique para cada botão de escala
    const botoes = document.querySelectorAll('.scale-btn');
    botoes.forEach(botao => {
        botao.addEventListener('click', function() {
            mensagem.textContent = "Obrigado por sua resposta! A equipe da instituição agradece seu feedback.";
            clearInterval(intervalo); // Para o temporizador após uma resposta
            desabilitarBotoes();
        });
    });

    // Iniciar o temporizador
    atualizarTemporizador();
    const intervalo = setInterval(atualizarTemporizador, 1000);
});