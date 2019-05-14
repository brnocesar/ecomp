var global = 0; /* variavel global para contar número de tarefas criadas*/

function testa_entrada(){ /* testa se a tarefa inserida é valida */

}

function criar(estado){ /* cria uma nova tarefa
    - recebe uma string que representa o estado ("fazer", "fazendo" ou "feito") da tarefa criada:
    o argumento é: o id do elemento <tbody> onde será criada a tarefa, e parte do id dos novos elementos criados;
    - a tarefa criada tem a seguinte estrutura:
    <tr id=estado+"">
    <td id=estado+"_celula_seletor_n"> <input id=estado+"_check_n" type="checkbox"> </td>
    <td id=estado+""> "tarefa" </td>
    </tr>
    - retorna o elemento <p> criado */
    var contador = global++; /* incrementa o contador a cada nova tarefa inserida */

    var seletor = document.createElement("input"); /* cria um elemento <input> */
    seletor.setAttribute("type", "checkbox"); /* define o elemento input como checkbox */
    seletor.setAttribute("id", estado + "_check_" + String(contador)); /* atribui o id em função do contador global */

    var celula_seletor = document.createElement("td"); /* cria um elemento <td> (célula da tabela) para o checkbox */
    celula_seletor.setAttribute("id", estado + "_celula_seletor_" + String(contador)); /* atribui o id em função do contador global */
    celula_seletor.appendChild(seletor); /* coloca o elemento <input> (checkbox) dentro do elemento <td> */

    var celula_tarefa = document.createElement("td"); /* cria um elemento <td> para o texto da tarefa*/
    celula_tarefa.setAttribute("id", estado + "_celula_tarefa_" + String(contador)); /* atribui o id em função do contador global */

    var linha = document.createElement("tr"); /* cria um elemento <tr> (linha da tabela) */
    linha.setAttribute("id", estado + "_linha_" + String(contador)); /* atribui o id em função do contador global */
    linha.appendChild(celula_seletor); /* coloca o elemento <td> (com checkbox) dentro de <tr> */
    linha.appendChild(celula_tarefa); /* coloca o elemento <td> (que irá conter o texto da tarefa) dentro de <tr> */

    var local_inserir = document.getElementById(estado); /* pega o elemento <tbody> pela id passada como argumento */
    local_inserir.appendChild(linha); /* coloca o elemento <tr> dentro (no fim) de <tbody> */
    
    return celula_tarefa; /* retorna o elemento <p> */
}

function recebe(){ /* recebe tarefa pelo campo de texto
    - recebe a tarefa pelo id do campo de input;
    - chama funcao que cria os elementos que iram conter uma tarefa;
    - coloca a tarefa nesse elemento criado*/

    var tarefa_recebida = document.getElementById("entrada_tarefa").value; /* recebe a tarefa pelo campo de input" */
    
    if(tarefa_recebida != ""){ /* garante que strings vazias não entrem como tarefas */
        var no_tarefa = document.createTextNode(tarefa_recebida); /* cria elemento nó de texto contendo a tarefa recebida */
        criar("fazer").appendChild(no_tarefa); /* coloca a tarefa recebida no elemento <p> criado pela função criar() */
    }
}

function apagar(){

}

function mudar(atual_estado, novo_estado, j){
    
}

function verifica_mudanca(){ /* verifica se os checkbox estão selecionados quando botão 'mudar' é clicado */
    var contador = global;

    for(var i = 0; i < contador; i++){
        var identificador;

        /* verifica tarefas 'para fazer' */
        identificador = "fazer_check_" + i; /* id para ser testado na coluna de tarefas 'para fazer' */
        elemento_check = document.getElementById(identificador); /* elemento <input> (checkbox) que será avaliado */
        if(Boolean(elemento_check)){ /* verifica se o elemento checkbox existe */
            var estado_check = document.getElementById(identificador).checked;
            if(estado_check){ /* verifica se o checkbox está selecionado, para executar a mudança */
                mudar("fazer", "fazendo", i); /* muda do estado 'para fazer' -> 'fazendo' */
            }
            continue; /* elemento de número i existe na coluna 'para fazer', então passa para i+1 */
        }

        /* verifica tarefas 'fazendo' */
        identificador = "fazendo_check_" + i; /* id para ser testado na coluna de tarefas 'fazendo' */
        elemento_check = document.getElementById(identificador); /* elemento <input> (checkbox) que será avaliado */
        if(Boolean(elemento_check)){ /* verifica se o elemento checkbox existe */
            var estado_check = document.getElementById(identificador).checked;
            if(estado_check){ /* verifica se o checkbox está selecionado, para executar a mudança */
                mudar("fazendo", "feito", i); /* muda do estado 'fazendo' -> 'feito' */
            }
        }
    }
}

/*
REFERÊNCIAS:
- Como criar div com javascript
https://pt.stackoverflow.com/questions/187803/como-criar-div-com-javascript
- Adentrando uma tabela HTML com Java​Script e interfaces DOM
https://developer.mozilla.org/pt-BR/docs/Traversing_an_HTML_table_with_JavaScript_and_DOM_Interfaces
*/