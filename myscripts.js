var global = 0; /* variavel global para contar número de tarefas criadas*/

function recebe_teste() { /* recebe tarefa pelo campo de texto e manda para o campo 'a fazer' */  
    var tarefa = document.getElementById("entrada_tarefa").value;
    document.getElementById("a_fazer").innerHTML = tarefa;
}

function testa_entrada(){ /* testa se a tarefa inserida é valida */

}

function criar(){ /* cria uma linha/célula de tabela com um checkbox e retorna 'o elemento (?)' célula */
    var contador = global++; /* incrementa o contador a cada nova tarefa inserida */

    var seletor = document.createElement("input"); /* cria um elemento input */
    seletor.setAttribute("type", "checkbox"); /* define o elemento input como checkbox */
    seletor.setAttribute("id", "pfaz" + String(contador)); /* atribui o id em função do contador global */
    
    var celula = document.createElement("td"); /* cria elemento td, célula da tabela */
    celula.setAttribute("id", "tarefa" + String(contador)); /* atribui o id em função do contador global */
    celula.appendChild(seletor); /* coloca o elemento input (checkbox) dentro do elemento td (celula) */
    
    var linha = document.createElement("tr"); /* cria elemento tr, linha da tabela */
    linha.appendChild(celula); /* coloca o elemento td dentro de tr */

    var ref_inserir = document.getElementsByTagName("tbody")[0]; /* pega a a primeira ocorrencia da tag tbody como referencia (?) */
    ref_inserir.appendChild(linha); /* coloca o elemento tr dentro (no fim) de tbody */
    
    return celula; /* retorna o elemento td */
}

function recebe(){ /* recebe tarefa pelo campo de texto, chama funcao que cria uma linha na tabela com um campo de saida, e coloca a tarefa nesse campo */
    var tarefa_recebida = document.getElementById("entrada_tarefa").value; /* recebe a tarefa pelo campo de input" */
    if(tarefa_recebida != ""){ /* garante que strings vazias não entrem como tarefas */
        var no_tarefa = document.createTextNode(" " + tarefa_recebida); /* cria elemento nó de texto contendo a tarefa recebida */
        criar().appendChild(no_tarefa); /* coloca o nó de texto no elemento td criado */
    }
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