const menuLateral = document.querySelector(".menulateral"),
cadDropdown = document.getElementById("submenuButton"),
cadDropdown2 = document.getElementById("submenuButton2"),
subMenu = document.querySelector(".submenu"),
subMenu2 = document.querySelector(".submenu2"),
setabaixo = document.querySelector(".setabaixo"),
setabaixo2 = document.querySelector(".setabaixo2");

var subMenuAberto = false
var subMenuAberto2 = false
var clickCadastrar = false

//método responsável por abrir o menu lateral
menuLateral.addEventListener("click", ()=>{
   //verifica se o clique foi no botão cadastrar
    if(clickCadastrar == false){//se não foi ele abre ou fecha o menu lateral e o sub menu se estiver aberto
        menuLateral.classList.toggle("closed")
        fecharSubMenu()
        fecharSubMenu2()
    }
    else{// se foi ele apenas n faz nada
        clickCadastrar = false // seta como false para validar o proximo clique
    }
})

//método responsável por abrir o submenu
cadDropdown.addEventListener("click", ()=>{
    //declara que o clique foi no cadastrar
    clickCadastrar = true
    subMenu.classList.toggle("show");
    setabaixo.classList.toggle("rotate");
})
cadDropdown2.addEventListener("click", ()=>{
    //declara que o clique foi no cadastrar
    clickCadastrar = true
    subMenu2.classList.toggle("show");
    setabaixo2.classList.toggle("rotate");
})

//método responsável por fechar o submenu
function fecharSubMenu(){
    subMenu.classList.remove("show");
    setabaixo.classList.remove("rotate");
    subMenuAberto = false
}
function fecharSubMenu2(){
    subMenu2.classList.remove("show");
    setabaixo2.classList.remove("rotate");
    subMenuAberto2 = false
}