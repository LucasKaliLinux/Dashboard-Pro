window.addEventListener("load", function(){
    var menu = document.getElementById("main_menu");
    var sidebar = document.getElementById("sidebar");
    var closeMenu = document.getElementById("menuClose");
    var open = true;
    var windowSize = window.innerWidth;
    
    if(windowSize <= 768){
        open = false;
    }
    
    closeMenu.addEventListener("click", function(){
        if(open){
            closeAnimationMenu();
        }
    });
    
    menu.addEventListener("click", function(){
        // sidebar.children[0].style.display = "none";
        if(open){
            closeAnimationMenu();
        }else{
            openAnimationMenu();
        }
    });
    
    var closeAnimationMenu = () => {
        sidebar.children[0].style.display = "none";
        sidebar.children[1].style.display = "none";
        sidebar.style.width = 0+"px";
        sidebar.addEventListener("transitionend", function outSidebar(){
            sidebar.style.display = "none";
            open = false;
            sidebar.removeEventListener("transitionend", outSidebar);
        });
    }
    
    var openAnimationMenu = () => {
        sidebar.style.display = "block";
        setTimeout(function(){
            sidebar.style.width = 250+"px";
            open = true;
        }, 1);
        setTimeout(function(){
            sidebar.children[0].style.display = "block";
            sidebar.children[1].style.display = "block";
        }, 350);
    }
});