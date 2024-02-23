
window.addEventListener("load", function(){

    const boxAlert = document.querySelector(".box-alert");

    if(boxAlert){
        setTimeout(function(){
            boxAlert.style.opacity = 0;
            boxAlert.addEventListener("transitionend", function(){
                boxAlert.style.display = "none";
            });
        }, 5000);
    }
});