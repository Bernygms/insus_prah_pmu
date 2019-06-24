$(document).ready(function(){
	init();
 });

function init(){
	$("#files").hide();
	$("#propuesta").hide();
	$("#id_regresar").hide();


}

function abrirFiles(){
	$("#propuesta").show();
	$("#files").show();
	$("#tabla_estados").hide();
	$("#id_regresar").show();
}

$(function() {
  $(".close").on("click", function() {
    $("#warining-mesage").hide();
  });
});
