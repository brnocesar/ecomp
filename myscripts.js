var global = 0; /* variavel global para contar número de tarefas criadas*/

function recebe_teste() { /* recebe tarefa pelo campo de texto e manda para o campo 'a fazer' */  
    var tarefa = document.getElementById("entrada_tarefa").value;
    document.getElementById("a_fazer").innerHTML = tarefa;
}

function testa_entrada(){ /* testa se a tarefa inserida é valida */

}

function criar(elemento_tbody){ /* cria uma linha/célula de tabela com um checkbox e retorna o elemento (td) célula, recebe o id do elemento tbody onde será adicionado */
    var contador = global++; /* incrementa o contador a cada nova tarefa inserida */

    var seletor = document.createElement("input"); /* cria um elemento input */
    seletor.setAttribute("type", "checkbox"); /* define o elemento input como checkbox */
    seletor.setAttribute("id", "faz_check" + String(contador)); /* atribui o id em função do contador global */
    
    var celula = document.createElement("td"); /* cria elemento td, célula da tabela */
    celula.setAttribute("id", "faz_celula" + String(contador)); /* atribui o id em função do contador global */
    celula.appendChild(seletor); /* coloca o elemento input (checkbox) dentro do elemento td (celula) */
    
    var linha = document.createElement("tr"); /* cria elemento tr, linha da tabela */
    celula.setAttribute("id", "faz_linha" + String(contador)); /* atribui o id em função do contador global */
    linha.appendChild(celula); /* coloca o elemento td dentro de tr */

    var ref_inserir = document.getElementById(elemento_tbody); /* pega o elemento tbody pela id passada como argumento */
    ref_inserir.appendChild(linha); /* coloca o elemento tr dentro (no fim) de tbody */
    
    return celula; /* retorna o elemento td */
}

function recebe(){ /* recebe tarefa pelo campo de texto, chama funcao que cria uma linha na tabela com um campo de saida, e coloca a tarefa nesse campo */
    var tarefa_recebida = document.getElementById("entrada_tarefa").value; /* recebe a tarefa pelo campo de input" */
    if(tarefa_recebida != ""){ /* garante que strings vazias não entrem como tarefas */

        //var conteudo = document.createElement("output");

        var no_tarefa = document.createTextNode(" " + tarefa_recebida); /* cria elemento nó de texto contendo a tarefa recebida */
        criar("fazer").appendChild(no_tarefa); /* coloca o nó de texto no elemento td criado */
    }
}

function apagar(){

}

function mudar(){
    var tarefa_para_fazer = 
    var no_tarefa = document.createTextNode(" " + tarefa_para_fazer); /* cria elemento nó de texto contendo a tarefa recebida */
    criar("fazendo_tabela").appendChild(no_tarefa); /* cria */
}

function verifica_estado(){ /* verifica o estado de todos os checkbox que existem */
    var contador = global;

    for(var i = 0; i < contador; i++){
        var identificador = "faz" + String(i);
        var estado_faz = document.getElementById(identificador).checked; /* estado do checkbox das tarefas para fazer */ //e se nao existe?
        if(estado_faz){ /* se o checkbox está selecionado */
            mudar(i);
        }

        estado_fnd = document.getElementById("fnd" + String(i)).checked; /* estado do checkbox das tarefas fazendo*/
        if(estado_fnd){ /* se o checkbox está selecionado */
            /*  */
        }
    }
}

/*
REFERÊNCIAS:
Como criar div com javascript - https://pt.stackoverflow.com/questions/187803/como-criar-div-com-javascript
Adentrando uma tabela HTML com Java​Script e interfaces DOM - https://developer.mozilla.org/pt-BR/docs/Traversing_an_HTML_table_with_JavaScript_and_DOM_Interfaces
*/