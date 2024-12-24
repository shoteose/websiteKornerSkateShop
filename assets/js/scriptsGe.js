//-------------------------------------------------------------------------------------------------

let generoId; // variavel do id do genero

// quando abre a modal vai buscar o id que está relacionado e guarda no generoID
//(pego do projeto Ligas Futebol de TW)
const modalEliminarGe = document.getElementById('modalEliminarGe');
if (modalEliminarGe) {
    modalEliminarGe.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        generoId = button.getAttribute('data-id');
    });
}

function deleteGenero() {
    // Existe algum id? Se sim elimina
    if (generoId) {

        // esconder a modal, para melhor estetica
        const modalInstance = bootstrap.Modal.getInstance(modalEliminarGe);
        modalInstance.hide();

        //toast a dizer que eliminou
        Toastify({
            text: "Gênero eliminado com sucesso",
            duration: 1000,
            close: true,
            gravity: "top",
            backgroundColor: "linear-gradient(to right, #ff0000, #ff0000)"
        }).showToast();

        // Redireciona para a URL de eliminar após 1 segundos
        setTimeout(function () {
            window.location.href = './genero/delete/' + generoId;
        }, 1000);
    }
}

//-------------------------------------------------------------------------------------------------
