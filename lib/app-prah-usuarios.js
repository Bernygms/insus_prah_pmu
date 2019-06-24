var url = '../controller/controller_register.php';

$(document).ready(function(){
	init();
	$(".close").click(function(){
		init();

	});
	$("#myAlert_guardar").click(function(){
		init();
	});
	$("#guardar_editado").click(function(){
		init();
	});
	$("#myAlert_eliminar").click(function(){
		init();
	});
});

function init(){
	$("#myAlert_guardar").hide();
	$("#myAlert_eliminar").hide();
	$("#myAlert_editar").hide();
}

//Metodo para agregar un nuevo dato a la tabla profesores , , , , , , 
function addUsuario(){
	console.log('Inicia el proceso agregar datos a la bd.------------------------');
	var html = '';
	html +='<div class="alert alert- alert-warning" id="myAlert_error">';
    html +='<a  class="close">&times;</a>';
	var nombre = document.getElementById("nombre").value;
	var usuario = document.getElementById("usuario").value;
	var correo = document.getElementById("correo").value;
	var password = document.getElementById("password").value;
	var status = document.getElementById("status").value;
	var id_app = document.getElementById("id_app").value;
	var id_estado = document.getElementById("id_estado").value;

	
	if (nombre == "") {
		html +='<strong>Ingrese!</strong> El campo nombre es obligatorio.</div>';
		$("#error").html(html);
	}else if(usuario == ""){
		html +='<strong>Ingrese!</strong> El campo usuario es obligatorio.</div>';
		$("#error").html(html);
	}else if(correo == ""){
		html +='<strong>Ingrese!</strong> El campo correo  es obligatorio.</div>';
		$("#error").html(html);
	}else if(password == ""){
		html +='<strong>Ingrese!</strong> El campo contraseña es obligatorio.</div>';
		$("#error").html(html);
	}else if(status == ""){
		html +='<strong>Seleccione!</strong> El campo status es obligatorio.</div>';
		$("#error").html(html);
	}else if(id_app == ""){
		html +='<strong>Seleccione!</strong> El campo aplicacion es obligatorio.</div>';
		$("#error").html(html);
	}else if(id_estado == ""){
		html +='<strong>Seleccione!</strong> El campo estados es obligatorio.</div>';
		$("#error").html(html);
	}else{
		var datos = {op: "agregar",
				nombre: nombre,
				usuario: usuario,
				correo: correo,
				password: password,
				status: status,
				id_app: id_app,
				id_estado: id_estado
			};
		console.log(datos);
		$.ajax({
				url : url,
				data : datos,
				type : 'POST',
				dataType : 'json',
				success : function(response) {
					console.log('start response ----> nuevo profesor');
					console.log(response);
					if (response.success) {
						$("#myAlert_guardar").show();
					}
				},
				error : function(xhr, status) {
					console.log('Disculpe, se presento un problema');
					//console.log(xhr);
					//console.log(status);
				},
				complete : function(xhr, status) {
					console.log('Petición realizada, profesores JS');
					console.log('Termina el proceso agregar datos a la bd.------------------------');
				}
		});
	}
	
	
}