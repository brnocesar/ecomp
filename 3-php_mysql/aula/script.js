var tarefa;
var Pmudar;
var pai;

$(document).ready(function(){
	$("#Criar").click(function(){
		tarefa= $('#nomeTarefa').val();
		if(tarefa=="")
			alert("tarefa invalida")
	});
});
