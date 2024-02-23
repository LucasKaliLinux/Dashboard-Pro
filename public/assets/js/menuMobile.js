
window.addEventListener("load", function(){
    
    const botao = document.getElementById("btn_menu");
    const menu_icon = botao.querySelector(".mobile i");
    const menu = document.getElementById("menu");

    botao.addEventListener("click", function(){
        if(!menu.classList.contains("active")){
            menu.classList.add("active");

            let altura = menu.clientHeight + "px";
            menu.style.height = 0;
            menu_icon.classList.remove("fa-bars");
            menu_icon.classList.add("fa-xmark");

            setTimeout(function(){
                menu.style.height = altura;
            }, 0);
        }else{
            menu.style.height = 0;
            menu_icon.classList.remove("fa-xmark");
            menu_icon.classList.add("fa-bars");  
            menu.addEventListener("transitionend", function encolher(){
                menu.classList.remove("active");
                menu.style.height = "auto";

                menu.removeEventListener("transitionend", encolher);
            });
        }
    });
});