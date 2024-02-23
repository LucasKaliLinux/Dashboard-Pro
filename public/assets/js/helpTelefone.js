
window.addEventListener("load", function(){

    const inputTel = document.getElementById("helpTel");

    if(inputTel){
        inputTel.addEventListener("input", function(){
            let valor = this.value;

            valor = valor.replace(/\D/g, ""); // Apagando todas as letras e caracteres
            valor = valor.replace(/^(\d{2})(\d)/, "$1 $2"); // Caso tenha dois numero no inicio(Primeiro Grupo $1), caso tenha numeros depois (Segundo Grupo $2)
            valor = valor.replace(/^(\d{2}) (\d{5})(\d)/, "$1 $2-$3"); // Mesma logica do segundo, porem avaliando se tem 5 digidos depois!
            
            if (valor.length > 13) {
                this.classList.add('input_error');
                valor = valor.substr(0, 13);
            } else {
                this.classList.remove('input_error');
            }
        
            this.value = valor;
        })
    }
});