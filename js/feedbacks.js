/*GUILHERME*/
firstcontent = document.querySelector(".firstcontent"),
secondcontent = document.querySelector(".secondcontent"),

listahist = document.querySelector(".lista-historico"),
setabaixa = document.querySelector(".setabaixa");
/*GUILHERME*/

/*GUILHERME*/
listahist.addEventListener("click", ()=>{
    setabaixa.classList.toggle("rotate");
})

firstcontent.addEventListener("click", ()=>{
    secondcontent.classList.toggle("closed");
})
/*GUILHERME*/