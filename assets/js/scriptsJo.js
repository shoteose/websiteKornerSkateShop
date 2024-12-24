//-------------------------------------------------------------------------------------------------

// metodo de pesquisa, esconde os que não tem as letras/palavras no nome

document.getElementById('searchBar').addEventListener('input', function () {
    const searchValue = this.value.toLowerCase();
    const jogos = document.querySelectorAll('.jogo-item');

    jogos.forEach(jogo => {
        const nome = jogo.querySelector('.jogo-nome').textContent.toLowerCase();
        if (nome.includes(searchValue)) {
            jogo.style.display = 'block';
        } else {
            jogo.style.display = 'none';
        }
    });
});

//-------------------------------------------------------------------------------------------------

let jogoId; // variavel do id do jogo

// quando abre a modal vai buscar o id que está relacionado e guarda no jogoId
//(pego do projeto Ligas Futebol de TW)
const modalEliminar = document.getElementById('modalEliminar');
if (modalEliminar) {
    modalEliminar.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        jogoId = button.getAttribute('data-id');
    });
}

function deleteGame() {
    // Existe algum id? Se sim elimina
    if (jogoId) {

        // esconder a modal, para melhor estetica
        const modalInstance = bootstrap.Modal.getInstance(modalEliminar);
        modalInstance.hide();

        //toast a dizer que eliminou
        Toastify({
            text: "Jogo eliminado com sucesso",
            duration: 2000,
            close: true,
            gravity: "top",
            backgroundColor: "linear-gradient(200deg, rgba(255,0,0,1) 0%, rgba(255,33,0,1) 50%, rgba(221,255,0,1) 86%)"
        }).showToast();

        // Redireciona para a URL de eliminar após 1 segundos
        setTimeout(function () {
            window.location.href = './jogo/delete/' + jogoId;
        }, 1000);
    }
}

//-------------------------------------------------------------------------------------------------

