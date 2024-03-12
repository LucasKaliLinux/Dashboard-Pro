
window.addEventListener("load", function(){

    const categoria = document.getElementById("categoria");

    if(categoria){
        categoria.addEventListener("change", function(){
            let opcao = this.value;
            let urlAtual = window.location.href;
            let urlNova;

            if (urlAtual.includes('categoria=')) {
                // Se a categoria já estiver na URL, substitua-a pela nova categoria
                urlNova = urlAtual.replace(/categoria=[^&]*/, 'categoria=' + opcao);
            } else {
                // Caso contrário, adicione a nova categoria à URL
                urlNova = urlAtual + "&categoria=" + opcao;
            }

            window.location.href = urlNova;
        });
    }
});