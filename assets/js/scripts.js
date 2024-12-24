//-------------------------------------------------------------------------------------------------

// Função para detectar o fim da animação
document.addEventListener("DOMContentLoaded", function () {

    const title = document.getElementById('tituloIndex');
    const titleCriadores = document.getElementById('tituloCriadores');

    if (titleCriadores) {

        titleCriadores.addEventListener("animationend", function () {
            console.log("help bro");
            document.getElementById('textosBotao').classList.add('supriseModaFoca');
        });
    }
    else if (title) {
        title.addEventListener("animationend", function () {
            document.getElementById('botoes').classList.add('supriseModaFoca');
        });
    }

});

//-----------------------------------------------------------------------------------

