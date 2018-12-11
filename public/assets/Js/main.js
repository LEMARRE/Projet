var overlay = document.querySelector('.overlay');
var overlay2 = document.querySelector('.overlay2');
var link = document.querySelector('.link');
var link = document.querySelector('.link');
var goto = link.getAttribute('href');
// var trans = document.querySelector('.btn-play');

//console.log(overlay);
//onsole.log(link)
//console.log(goto);
// console.log(trans);


anime({
    targets : overlay,
    translateX : "-100%",
    easing: "easeInCirc",
    duration :0
});




link.addEventListener('click', function(e){
    e.preventDefault();
    anime({
        targets : overlay,
        translateX : "0%",
        easing: "easeInCirc",
        duration : 500
    });

    

    setTimeout( ()=> {
        // console.log('change de page');
        window.location = goto;
    },500 )
    
});