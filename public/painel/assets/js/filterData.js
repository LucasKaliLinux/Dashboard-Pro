window.addEventListener("load", function(){
    const input = document.getElementById("data");

    if(input){
        input.addEventListener('input', function() {
            let valor = this.value;

            valor = valor.replace(/\D/g, '');
            valor = valor.replace(/^(\d{2})(\d)/, '$1/$2');
            valor = valor.replace(/^(\d{2})\/(\d{2})(\d)/, '$1/$2/$3');
            
            if (valor.length > 10) {
                this.classList.add('input_error');
                valor = valor.replace(/\d$/, '');
            } else {
                this.classList.remove('input_error');
            }

            this.value = valor;
        });
    }
});