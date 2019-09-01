
var entrada=document.getElementById("Entrada");
var saida=document.getElementById("Saida");

function Iniciar() {
    document.designMode = "On";
}

function negrito() {
    document.execCommand('bold', false, null);
}

function italico() {
    document.execCommand("italic", false, null);
}

function sublinhado() {
    document.execCommand('underline', false, null);
}
function fonte(fonte) {
    if(fonte != '')
        document.execCommand('fontname', false, fonte);
}
function tamanho(tamanho) {
    if(tamanho != '')
        document.execCommand('fontsize', false, tamanho);
}

function SelText(){
    document.getElementById('Entrada').removeChild()
}

function visualiza(){
    saida.innerText=entrada.value;
}
