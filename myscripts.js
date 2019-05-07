function recebe_teste() { /* recebe tarefa pelo campo de texto e manda para o campo 'a fazer' */  
    var tarefa = document.getElementById("entrada_tarefa").value;
    
    document.getElementById("a_fazer").innerHTML = tarefa;
}

function criar(){ /* cria uma linha de tabela com um campo de output de texto*/
    var campo_saida = document.createElement("output");  /* cria um novo elemento output */
    campo_saida.setAttribute("id", "tarefa");
    
    var linha = document.createElement("tr"); /* cria um novo elemento tr */
    var celula = document.createElement("td"); /* cria um novo elemento tr */
    


    var referencia = document.getElementById("inserir_linha") /* ponto de marcação para inserir as linhas de tabelas no html */
    
    return lalala; /* retorna a id do campo de saida em que a tarefa será colocada */
}

function recebe(){ /* recebe tarefa pelo campo de texto, cria uma linha de tabela e coloca um campo de saida com a  tarefa  */
    //var contador = 0; /* contador de tarefas inseridas */
    var tarefa = document.getElementById("entrada_tarefa").value; /* recebe a tarefa pelo campo de input de texto e coloca na varialve tabela*/

    document.getElementById(criar()).innerHTML = tarefa;
}

function muda(){

}

function apaga(){
    
}

/*
REFERÊNCIAS:
Como criar div com javascript - https://pt.stackoverflow.com/questions/187803/como-criar-div-com-javascript
Adentrando uma tabela HTML com Java​Script e interfaces DOM - https://developer.mozilla.org/pt-BR/docs/Traversing_an_HTML_table_with_JavaScript_and_DOM_Interfaces
*/