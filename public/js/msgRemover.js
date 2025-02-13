// Função para esconder a mensagem após 5 segundos
function hideMessage() {
    const message = document.querySelector('.message');
    if (message) {
        setTimeout(() => {
            message.classList.add('hide');
        }, 5000); // Tempo de 5 segundos
    }
}

// Usando MutationObserver para observar quando a classe '.message' for adicionada ao DOM
const observer = new MutationObserver(() => {
    // Verifica se há uma mensagem com a classe .message no DOM
    if (document.querySelector('.message')) {
        hideMessage(); // Se houver, chama a função para esconder após 5 segundos
    }
});

// Inicia o observador para observar mudanças no DOM
observer.observe(document.body, { childList: true, subtree: true });
