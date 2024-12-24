//---------------------------------------------------------------------------------------------

let publicadoraID; // variavel do id do genero

// quando abre a modal vai buscar o id que está relacionado e guarda no generoID
//(pego do projeto Ligas Futebol de TW)
const modalEliminarPu = document.getElementById('modalEliminarPu');
if (modalEliminarPu) {
    modalEliminarPu.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        publicadoraID = button.getAttribute('data-id');
    });
}

function deletePublicadora() {
    // Existe algum id? Se sim elimina
    if (publicadoraID) {

        // esconder a modal, para melhor estetica
        const modalInstance = bootstrap.Modal.getInstance(modalEliminarPu);
        modalInstance.hide();

        //toast a dizer que eliminou
        Toastify({
            text: "Publicadora eliminada com sucesso",
            duration: 1000,
            close: true,
            gravity: "top",
            backgroundColor: "linear-gradient(to right, #ff0000, #ff0000)"
        }).showToast();

        // Redireciona para a URL de eliminar após 1 segundos
        setTimeout(function () {
            window.location.href = './publicadora/delete/' + publicadoraID;
        }, 1000);
    }
}


//---------------------------------------------------------------------------------------------
