const home = document.querySelector(".home"),
      menulateral = home.querySelector(".menulateral"),
      toggle = home.querySelector(".toggle");

      toggle.addEventListener("click", () =>{
      menulateral.classList.toggle("close");
    })

$('.cadastrar').click(function(){
    $('.home .menulateral .listamenu .itemlista .cadastrar .setabaixo').toggleClass("rotate");
});
function previewImagem(){
    var imagem = document.querySelector('input[name=imagem]').files[0];
    var preview = document.querySelector('img');
    
    var reader = new FileReader();
    
    reader.onloadend = function () {
        preview.src = reader.result;
    }
    
    if(imagem){
        reader.readAsDataURL(imagem);
    }else{
        preview.src = "";
    }
}
//cadastro produto
class Produto
{
    constructor()
    {
        this.id=1;
        this.arrayProduto=[];
    }
    validarCampos(produto)
    {
        let msg = '';
        if(produto.nomeProduto =='')
        {
            msg = 'Preenche essa bosta direito';
            alert(msg);
        }
        if(produto.preco =='')
        {
            msg = 'VOCÊ TÁ LOUCO?! Preenche direito !!';
            alert(msg);
        }
        if(msg != '')
        {
            return false
        }
        return true
    }
    cancelar(){
        document.getElementById('nome').value = ''; 
        document.getElementById('descricao').value = ''; 
        document.getElementById('custo').value = ''; 
        document.getElementById('valor').value = '';
        document.getElementById('foto').value = ''; 
    }
    adicionar(produto)
    {
        this.arrayProdutos.push(produto);
        this.id++;
    }
    lerDados()
    {
        let produto = {};
        produto.id=this.id;
        produto.nomeProduto = document.getElementById('produto').value;
        produto.preco = document.getElementById('preco').value;
        return produto;
    }
    listarTabela()
    {
        let tbody = document.getElementById('tbody');
        tbody.innerText = '';

        for(let i=0;i<this.arrayProdutos.length;i++)
        {
            let tr = tbody.insertRow();

            let td_id = tr.insertCell();
            let td_produto = tr.insertCell();
            let td_valor = tr.insertCell();

            td_id.innerText = this.arrayProdutos[i].id;
            td_produto.innerText = this.arrayProdutos[i].nomeProduto;
            td_valor.innerText = this.arrayProdutos[i].preco;
        }
    }    
    salvar()
    {
        let produto = this.lerDados();
        if(this.validarCampos(produto))
        {
            this.adicionar(produto);
        }
        this.listarTabela();

    }
} 
var produto = new Produto()

// fazer função clear a cada nova inserção