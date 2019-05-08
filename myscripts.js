var contador = 0; /* variavel global para contar número de tarefas */

function recebe_teste() { /* recebe tarefa pelo campo de texto e manda para o campo 'a fazer' */  
    var tarefa = document.getElementById("entrada_tarefa").value;
    
    document.getElementById("a_fazer").innerHTML = tarefa;
}

function criar(){ /* cria uma linha de tabela com um campo de output para texto*/
    var campo_tarefa = document.createElement("output"); /* cria elemento output, onde será colocada a tarefa */
    campo_tarefa.setAttribute("type", "text");
    campo_tarefa.setAttribute("name", "saida");
    campo_tarefa.setAttribute("id", "tarefa" + String(contador++))
    //campo_tarefa.setAttribute("class", "form-control"); /* adiciona os atributos no elemento output*/ /* nao consigo atribuir a classe form-control a este elemento */

    var cell = document.createElement("td"); /* cria elemento td, célula da tabela */
    cell.appendChild(campo_tarefa); /* coloca o elemento output dentro do elemento td (celula) */
    
    var row = document.createElement("tr"); /* cria elemento tr, linha da tabela */
    row.appendChild(cell); /* coloca o elemento td dentro de tr */

    var ref_inserir = document.getElementsByTagName("tbody")[0]; /* pega a a primeira ocorrencia da tag tbody como referencia (?) */
    ref_inserir.appendChild(row); /* coloca o elemento tr de tbody, no fim */

    return campo_tarefa.getAttribute("id"); /* retorna o id do elemento criado para conter a tarefa */
}

function recebe(){ /* recebe tarefa pelo campo de texto, chama funcao que cria uma linha na tabela com um campo de saida, e coloca a tarefa nesse campo */
    var tarefa = document.getElementById("entrada_tarefa").value; /* recebe a tarefa pelo campo de input de identificado por id="entrada_tarefa" */
    
    document.getElementById(criar()).innerHTML = tarefa; /* insere a tarefa no elemento criado por criar() */
}

function mudar(){

}

function apagar(){
    
}

/*
REFERÊNCIAS:
Como criar div com javascript - https://pt.stackoverflow.com/questions/187803/como-criar-div-com-javascript
Adentrando uma tabela HTML com Java​Script e interfaces DOM - https://developer.mozilla.org/pt-BR/docs/Traversing_an_HTML_table_with_JavaScript_and_DOM_Interfaces
*/