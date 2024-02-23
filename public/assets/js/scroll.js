
window.addEventListener("load", function(){

    const LinkMenu = document.querySelectorAll(".desktop a[href='#'], .mobile a[href='#']");
    const homeObj = document.querySelector("#sobre");
    
    var targetId = sessionStorage.getItem("targetID");
    var home = false;

    if(homeObj){
        home = true;
    }

    LinkMenu.forEach(element => {
        element.addEventListener("click", function(event){
            event.defaultPrevented;

            let target = element.getAttribute("targetId");
            sessionStorage.setItem("targetID", target);

            if(!home){
                window.location.href = "/?pag=home";
            }else{

                targetId = sessionStorage.getItem("targetID");

                let targetObj = document.querySelector(targetId);

                animateScrollTo(targetObj, 1250);

                sessionStorage.removeItem("targetID");
            }
        });
    });

    if(targetId){
        let targetObj = document.querySelector(targetId);
        animateScrollTo(targetObj, 1250);
        sessionStorage.removeItem("targetID");
    }

    function animateScrollTo(target, duration) {
        var targetPosition = target.offsetTop;
        // var startPosition = window.pageYOffset;
        var startPosition = window.scrollY;
        var distance = targetPosition - startPosition;
        var startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            var timeElapsed = currentTime - startTime;
            var scrollY = easeInOut(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, scrollY);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function easeInOut(t, b, c, d) {
            // Uso da função easeInOut para suavizar a animação
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    }
});