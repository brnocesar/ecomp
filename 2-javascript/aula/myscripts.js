function recebe_texto() {
    var texto = document.getElementById("entrada_texto").value;
    var result;

    // estilo do texto
    var negrito = document.getElementById("negrito_check").checked;
    var italico = document.getElementById("italico_check").checked;
    var sublinhado = document.getElementById("sublinhado_check").checked;
    if(negrito){
        result = texto.bold();
        texto = result;
    }
    else {
        result = texto;
    }
    if(italico){
        result = texto.italics();
        texto = result;
    }
    else {
        result = texto;
    }
    if(sublinhado){
        result = "<u>"+texto+"</u>";
        texto = result;
    }
    else {
        result = texto;
    }
    
    // cor do texto
    var vermelho = document.getElementById("vermelho_check").checked;
    var azul = document.getElementById("azul_check").checked;
    var amarelo = document.getElementById("amarelo_check").checked;
    if(vermelho){
        result = texto.fontcolor("red")
    }
    else if(azul){
        result = texto.fontcolor("blue")
    }
    else if(amarelo){
        result = texto.fontcolor("yellow")
    }
    else {
        result = texto;
    }

    // cor de fundo
    var vermelho_fundo = document.getElementById("vermelho_fundo_check").checked;
    var azul_fundo = document.getElementById("azul_fundo_check").checked;
    var amarelo_fundo = document.getElementById("amarelo_fundo_check").checked;
    if(vermelho_fundo){
        document.getElementById("saida_texto").style.backgroundColor="red"
    }
    else if(azul_fundo){
        document.getElementById("saida_texto").style.backgroundColor="blue"
    }
    else if(amarelo_fundo){
        document.getElementById("saida_texto").style.backgroundColor="yellow"
    }
    else {
        result = texto;
    }
    
    document.getElementById("saida_texto").innerHTML = result;
    
}



