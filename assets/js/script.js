let dados;
let partes = [];
let alvo;
let itemID;

const modalEliminar = document.getElementById('modalEliminar');
if (modalEliminar) {
  modalEliminar.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const dataId = button.getAttribute('data-id'); // Obtém o valor do atributo data-id

    if (dataId) {
      partes = dataId.split(":"); // Substitui explode por split
      alvo = partes[0];
      itemID = partes[1];
    } else {
      console.error("O atributo data-id não foi encontrado ou está vazio.");
    }

  });
}

console.log("aqui entrou no script.js" + itemID + " e " + alvo);
function deleteItem() {

  console.log("aqui entrou na funcao, o id captado é : " + itemID);
  // Existe algum id? Se sim elimina
  if (itemID) {

    // esconder a modal, para melhor estetica
    const modalInstance = bootstrap.Modal.getInstance(modalEliminar);
    modalInstance.hide();

    //toast a dizer que eliminou
    Toastify({
      text: alvo + " eliminado com sucesso",
      duration: 2000,
      close: true,
      gravity: "top",
      backgroundColor: "linear-gradient(200deg, rgba(255,0,0,1) 0%, rgba(255,33,0,1) 50%, rgba(221,255,0,1) 86%)"
    }).showToast();

    // Redireciona para a URL de eliminar após 1 segundos
    setTimeout(function () {
      window.location.href = '/websiteKornerSkateShop/admin/' + alvo + '/' + itemID;
    }, 1000);
  }
}