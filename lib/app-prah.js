var url = '../controller/controller_prah.php';
//CONSULTA DE ESTADOS  START
function getEstados(id_estado){
		console.log('Inicia el proceso consulta (estados)------------------------');
		var datos = {
			op:"consultar_estados",
			id_estado:id_estado
		}
		$.ajax({
			url : url,
			data : datos,
			type : 'POST',
			dataType : 'json',
			success : function(response) {
				if (response.success) {
					console.log('Response.success');
					var html = '';
					html += '<table class="table  table-hover "><thead><tr><th>#</th><th>Nombre</th></tr></thead>';
					html += '</thead><tbody>';
					//No. Propuesta	Oficio de Propuesta	Anexo 6	Anexo 7	Listado de Beneficiarios	Oficio de Autorización	Oficio de Acuerdo	Acuerdo de Liberación	Cierre de ejercicio y control del ejercicio	Vobo de la Documentación
					$.each(response.data.estados, function(key,value){
						html += '<tr>';
						html +='<td>'+value['id_estado']+'</td>';
						html +='<td>'+value['nombre_estado']+'</td>';
						html +='<td>';
						html +='<button onclick="consutarFiles('+value['id_estado']+')" class=" btn btn-success  btn-xs" ><i class="mdi mdi-book-open-page-variant"></i>Abrir</button>';
						html +='</td>';
						html += '</tr>';
					});
					html += '</tbody></table>';
					//$("#tb").html(html);
					document.getElementById("#tb").innerHTML = html;					
				}
			},
			error : function(xhr, status) {
				console.log('Disculpe, existió un problema');
				console.log(xhr);
				console.log(status);
			},
			complete : function(xhr, status) {
				console.log('Petición realizada, estados JS');
				console.log('Termino el proceso consulta (estados)------------------------');
			}
		});
}

//CONSULTA DE ESTADOS  END

//CONSULTA DE FILES  START

function consutarFiles(id_estado){
	var anno =  document.getElementById("anno").value;
	var app =  document.getElementById("app").value;
	var id_app_fk =  document.getElementById("id_app_fk").value;
	var id_estado_fk_usuario =  document.getElementById("id_estado_fk_usuario").value;
	console.log('Inicia el proceso consulta (files)------------------------');
	console.log("Consulta de archivos (Estado[" + id_estado + " " + anno + " " + id_app_fk +"]) ...");
		var datos = {
			op:"consultar_files",
			id_estado:id_estado,
			anno: anno,
			id_app_fk:id_app_fk
		}
		$.ajax({
			url : url,
			data : datos,
			type : 'POST',
			dataType : 'json',
			success : function(response) {
				if (response.success) {
					var html = "";
					console.log('Response.success.');
					if ($.isEmptyObject(response.data.files) == true) {
						html += '<button id="propuesta" class="btn btn-success btn-block" data-toggle="modal" data-target=".bd-prah-modal-lg">Nueva Propuesta<i class="mdi mdi-plus"></i></button>';
					}else{
						html += '<table class="table  table-hover table-bordered"><thead><tr><th>No. Propuesta</th><th>Oficio de Propuesta</th><th>Anexo 6</th><th>Anexo 7</th><th>Listado de Beneficiarios</th><th>Oficio de Autorización</th><th>Oficio de Acuerdo</th><th>Acuerdo de Liberación</th><th>Cierre de ejercicio y control del ejercicio</th><th>Vobo de la Documentación</th><th>Fecha I/F</th></tr></thead>';
						html += '</thead><tbody>';
						$.each(response.data.files, function(key,value){
							html += '<tr>';
							html +='<td class="font-weight-medium">'+value['num_prop']+'</td>';
							html +='<td><div class="card-body"><div class="clearfix"><div class="text-center"><a href="../files/'+app+'/'+anno+'/'+id_estado+'/'+value['ofic_porp']+'"  target="_blank"><i class="mdi mdi-file-pdf-box text-danger icon-lg"></i><br>Oficio de Propuesta</a></div></div>';
							if (value['ofi_de_auto'] == "" || id_estado_fk_usuario == 0) {
								html += '<br><div class="text-center "><span class="badge badge-pill badge-dark mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para editar propuesta." onclick="getEditarPropuesta('+value['id_file']+')">Editar PDFs</span></div>';
							}
							html += '</td>';
							html +='<td><div class="card-body"><div class="clearfix"><div class="text-center"><a href="../files/'+app+'/'+anno+'/'+id_estado+'/'+value['anexo6']+'"  target="_blank"><i class="mdi mdi-file-pdf-box text-danger icon-lg"></i><br>Anexo 6</a></div></div>';
							if (value['ofi_de_auto'] == "" || id_estado_fk_usuario == 0) {
								html += '<br><div class="text-center "><span class="badge badge-pill badge-dark mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para editar propuesta." onclick="getEditarPropuesta('+value['id_file']+')">Editar PDFs</span></div>';
							}
							html += '</td>';
							html +='<td><div class="card-body"><div class="clearfix"><div class="text-center"><a href="../files/'+app+'/'+anno+'/'+id_estado+'/'+value['anexo7']+'"  target="_blank"><i class="mdi mdi-file-pdf-box text-danger icon-lg"></i><br>Anexo 7</a></div></div>';
							if (value['ofi_de_auto'] == "" || id_estado_fk_usuario == 0) {
								html += '<br><div class="text-center "><span class="badge badge-pill badge-dark mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para editar propuesta." onclick="getEditarPropuesta('+value['id_file']+')">Editar PDFs</span></div>';
							}
							html += '</td>';
							html +='<td><div class="card-body"><div class="clearfix"><div class="text-center"><a href="../files/'+app+'/'+anno+'/'+id_estado+'/'+value['lis_de_bene']+'"  target="_blank"><i class="mdi mdi-file-pdf-box text-danger icon-lg"></i><br>Listado de Beneficiarios</a></div></div>'; 
							if (value['ofi_de_auto'] == "" || id_estado_fk_usuario == 0) {
								html += '<br><div class="text-center "><span class="badge badge-pill badge-dark mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para editar propuesta." onclick="getEditarPropuesta('+value['id_file']+')">Editar PDFs</span></div>';
							}
							html += '</td>';
							if (value['ofi_de_auto'] == "" ) { //inicio if oficio de autorizacion 
								if (id_estado_fk_usuario == 0) {
									html +='<td class="border-right-0"><div class="text-center "><span class="badge badge-pill badge-success mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para subir tus archivos" onclick="getEditarPropuestaAutorizacion('+value['id_file']+')">Subir PDF, Oficio de Autorización</span></div></td>';
								}else{
									html +='<td class="border-right-0"><div class="text-center "><span class="badge badge-pill badge-success">En proceso ...</span></div></td>';
								}
								
							}else{
								html +='<td><div class="card-body border border-success"><div class="clearfix"><div class="text-center"><a href="../files/'+app+'/'+anno+'/'+id_estado+'/'+value['ofi_de_auto']+'"  target="_blank"><i class="mdi mdi-file-pdf-box text-success icon-lg"></i><br>Oficio de Autorización</a></div> </div> ';
								if (id_estado_fk_usuario == 0) {
									html += '<br><div class="text-center "><span class="badge badge-pill badge-dark mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para editar el, Oficio de Autorización" onclick="getEditarPropuestaAutorizacion('+value['id_file']+')">Editar PDF</span></div>';
								}
								html +='</div></td>';
							}//fin if oficio de autorizacion 
							if (value['ofi_de_auto'] == "") {
								html +='<td><div class="text-center"><span class="badge badge-pill badge-primary">Pendiente </span></div></td>';
								html +='<td><div class="text-center"><span class="badge badge-pill badge-primary">Pendiente </span></div></td>';
								html +='<td><div class="text-center"><span class="badge badge-pill badge-primary">Pendiente </span></div></td>';
							}else{
								if (value['ofi_de_acue'] == "" && value['acue_de_libe'] == "" && value['cier_ejer_y_cont'] == "") {
									html +='<td><div class="text-center"><span class="badge badge-pill badge-success" mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para subir archivos PDF." onclick="getIdFileForOAC('+value['id_file']+')">Subir PDFs ... </span></div></td>';
									html +='<td><div class="text-center"><span class="badge badge-pill badge-success" mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para subir archivos PDF." onclick="getIdFileForOAC('+value['id_file']+')">Subir PDFs ... </span></div></td>';
									html +='<td><div class="text-center"><span class="badge badge-pill badge-success" mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para subir archivos PDF." onclick="getIdFileForOAC('+value['id_file']+')">Subir PDFs ... </span></div></td>';
								}else{
									html +='<td><div class="card-body"><div class="clearfix"><div class="text-center"><a href="../files/'+app+'/'+anno+'/'+id_estado+'/'+value['ofi_de_acue']+'"  target="_blank"><i class="mdi mdi-file-pdf-box text-danger icon-lg"></i><br>Oficio de Acuerdo</a></div></div>';
									if (value['vobo'] == "" || id_estado_fk_usuario == 0) {
									html +='<br><div class="text-center"><span class="badge badge-pill badge-dark mdi mdi-pencil large" mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para editar" onclick="getIdFileForOAC('+value['id_file']+')">Editar PDFs ... </span></div>';
									}
									html += '</td>';
									html +='<td><div class="card-body"><div class="clearfix"><div class="text-center"><a href="../files/'+app+'/'+anno+'/'+id_estado+'/'+value['acue_de_libe']+'"  target="_blank"><i class="mdi mdi-file-pdf-box text-danger icon-lg"></i><br>Acuerdo de Liberación</a></div></div>';
									if (value['vobo'] == "" || id_estado_fk_usuario == 0) {
									html +='<br><div class="text-center"><span class="badge badge-pill badge-dark mdi mdi-pencil large" mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para editar" onclick="getIdFileForOAC('+value['id_file']+')">Editar PDFs ... </span></div>';
									}
									html += '</td>';
									html +='<td><div class="card-body"><div class="clearfix"><div class="text-center"><a href="../files/'+app+'/'+anno+'/'+id_estado+'/'+value['cier_ejer_y_cont']+'"  target="_blank"><i class="mdi mdi-file-pdf-box text-danger icon-lg"></i><br>Cierre de ejercicio y control del ejercicio</a></div></div>';
									if (value['vobo'] == "" || id_estado_fk_usuario == 0) {
									html +='<br><div class="text-center"><span class="badge badge-pill badge-dark mdi mdi-pencil large" mdi mdi-pencil large" data-toggle="tooltip" data-placement="top" title="Click aqui para editar" onclick="getIdFileForOAC('+value['id_file']+')">Editar PDFs ... </span></div>';
									}
									html += '</td>';
								}
							}
							if (value['vobo'] == "" ) { //inicio if oficio de autorizacion 
								if (value['ofi_de_acue'] == "" && value['acue_de_libe'] == "" && value['cier_ejer_y_cont'] == "") {
									html +='<td><div class="text-center"><span class="badge badge-pill badge-danger">No Aprobado </span></div></td>';
								}else{
									if (id_estado_fk_usuario == 0) {
										html +='<td><div class="text-center" onclick="getAprobar('+value['id_file']+')"><span class="badge badge-pill badge-danger">No Aprobado </span></div></td>';
									}else{
										html +='<td><div class="text-center"><span class="badge badge-pill badge-danger">No Aprobado </span></div></td>';
									}
								}
								
							}else{
								if (id_estado_fk_usuario == 0) {
									html +='<td><div class="text-center" onclick="getAprobar('+value['id_file']+')"><span class="badge badge-pill badge-success">Aprobado </span></div></td>';
								}else{
									html +='<td><div class="text-center" ><span class="badge badge-pill badge-success">Aprobado </span></div></td>';
								}
															
							}													
							
							html +='<td><br>';
							html +='<div>Fecha de inicio: '+value['fech_ini']+'<br>Fecha de cierre : '+value['fech_end']+'</div><br>';
							if (value['ofi_de_auto'] == "") {
								html +='<div class="progress"><div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>';
							}else{
								if (value['cier_ejer_y_cont'] == "") {
									html +='<div class="progress"><div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>';
								}else{
									if (value['vobo']) {
										html +='<div class="progress"><div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>';
									}else{
										html +='<div class="progress"><div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></div>';
									}
								}
						    }
							html +='</td>';
						    html += '</tr>';
						});

					html += '</tbody></table>';
				}
					document.getElementById("#tb_files").innerHTML = html;	
					abrirFiles();				
				}
			},
			error : function(xhr, status) {
				console.log('Disculpe, existió un problema');
				console.log(xhr);
				console.log(status);
			},
			complete : function(xhr, status) {
				console.log('Petición realizada, estados JS');
				console.log('Termino el proceso consulta (files)------------------------');
			}
	});
}
//CONSULTA DE FILES  END

//FUNCION PARA AGREGAR UNA PROPUESTA EN LA TABLA FILES START 
function addPropuesta(){
	console.log('Inicia el proceso  (add new file)------------------------');
		var html = '';
			html +='<div class="alert  alert-warning" id="warining-mesage">';
			html +='<a  class="close">&times;</a>';
			var num_prop = document.getElementById("num_prop").value;
			var id_estado = document.getElementById("id_estado").value;
			var ofic_porp = document.getElementById("ofic_porp").value;
			var anexo6 = document.getElementById("anexo6").value;
			var anexo7 = document.getElementById("anexo7").value;
			var lis_de_bene = document.getElementById("lis_de_bene").value;
			var parametros = new FormData($("#form-add-propuesta")[0]);
			if (num_prop == "") {
				html +='<strong>Advertencia!</strong> El campo No. Propuesta  es obligatorio.</div>';
				$("#mesage").html(html);

			}else if (id_estado == "") {
				html +='<strong>Advertencia!</strong> El campo  Estado  obligatorio.</div>';
				$("#mesage").html(html);

			}else if (ofic_porp == "") {
				html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en Oficio de Propuesta </div>';
				$("#mesage").html(html);

			}else if (anexo6 == "") {
				html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en  Anexo 6 </div>';
				$("#mesage").html(html);

			}else if (anexo7 == "") {
				html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en  Anexo 7 </div>';
				$("#mesage").html(html);

			}else if (lis_de_bene == "") {
				html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en  Listado de Beneficiarios </div>';
				$("#mesage").html(html);

			} else{
			$.ajax({//inicia la linea del  proceso ajax
				url : url,
				data : parametros,
				type : 'POST',
				contentType: false,
				processData: false,
				beforesend: function(){
					$("#ajaxloader").show();
				},
				success : function(response) {	
					if (response.success == true) {
						$("#addFiles").modal('hide');
						console.log(response);
						for (var i in response.data.file) {
							var r = response.data.file.id_estado;
						}
						consutarFiles(r);
						$("#form-add-propuesta")[0].reset();
					}else{
						alert(response);
					}		

				},
				error : function(xhr, status) {
					console.log('Disculpe, existió un problema');
					console.log(xhr);
					console.log(status);
				},
				complete : function(xhr, status) {
					console.log('Petición realizada, estados JS');
					console.log('Termino el proceso add new  (file)------------------------');
				}
			});//Termina la linea  del proceso ajax
			}

}

//FUNCION PARA AGREGAR UNA PROPUESTA EN LA TABLA FILES END 

//EDITAR PROPUESTA , LOS PRIMEROS 4 PDFS START
function getEditarPropuesta(id_file){
	console.log('Inicia el proceso  (consulta file por id)------------------------');
		var datos = {
		op:"busqueda_file",
		id_file:id_file
	}
	$.ajax({
			url : url,
			data : datos,
			type : 'POST',
			dataType : 'json',
			success : function(response) {
				console.log(response);
				if (response.success) {
					console.log('Consulta exitosa');
					if ($.isEmptyObject(response.data.file) == true) {
						alert("No se puede modificar,solicite apoyo con el administrador del sistema.")
					}else{
						console.log(response.data.file.id_file);
						console.log(response.data.file.num_prop);
						$('#editFiles').modal('show');
						document.form_update_propuesta.id_file.value = response.data.file.id_file;
						document.form_update_propuesta.num_prop.value = response.data.file.num_prop;
						document.form_update_propuesta.anno.value = response.data.file.anno;
						document.form_update_propuesta.id_estado.value = response.data.file.id_estado;
						document.form_update_propuesta.ofic_porp_nombre.value = response.data.file.ofic_porp;
						document.form_update_propuesta.anexo6_nombre.value = response.data.file.anexo6;
						document.form_update_propuesta.anexo7_nombre.value = response.data.file.anexo7;
						document.form_update_propuesta.lis_de_bene_nombre.value = response.data.file.lis_de_bene;
					}
				}
			},
			error : function(xhr, status) {
				console.log('Disculpe, existió un problema');
				//console.log(xhr);
				//console.log(status);
			},
			complete : function(xhr, status) {
				console.log('Petición realizada, profesores JS');
				console.log('Termino el proceso (consulta file por id)------------------------');
			}
		});	
}
/*
	Editamos los siguientes campos
	No. Propuesta	Oficio de Propuesta	Anexo 6	Anexo 7	Listado de Beneficiarios
*/
function editOAAL(){
	console.log('Inicia el proceso  (editar  file )------------------------');
	var html = '';
		html +='<div class="alert  alert-warning" id="warining-mesage">';
		html +='<a  class="close">&times;</a>';
		var id_file = document.form_update_propuesta.id_file.value;
		var num_prop = document.form_update_propuesta.num_prop.value;
		var ofic_porp = document.form_update_propuesta.ofic_porp.value;
		var anexo6 = document.form_update_propuesta.anexo6.value;
		var anexo7 = document.form_update_propuesta.anexo7.value;
		var lis_de_bene = document.form_update_propuesta.lis_de_bene.value;
		var id_estado = document.form_update_propuesta.id_estado.value;
		//alert(num_prop + id_file + ofic_porp + anexo6 + anexo7 + lis_de_bene);
			if (id_file == "") {
				html +='<strong>Advertencia!</strong> Error del sistema, identificador del archivo no encontrada </div>';
				$("#mesage_edit").html(html);

			}else if (num_prop == "") {
				html +='<strong>Advertencia!</strong> Error del sistema, No. Propuesta no encontrada </div>';
				$("#mesage_edit").html(html);

			}else if (ofic_porp == "") {
				html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en el campo  Oficio de Propuesta </div>';
				$("#mesage_edit").html(html);

			}else if (anexo6 == "") {
				html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en el campo  Anexo 6 </div>';
				$("#mesage_edit").html(html);
			}else if (anexo7 == "") {
				html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en el campo  Anexo 7 </div>';
				$("#mesage_edit").html(html);

			}else if (lis_de_bene == "") {
				html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en el campo   Listado de Beneficiarios </div>';
				$("#mesage_edit").html(html);

			} else{
				var parametros = new FormData($("#form_update_propuesta")[0]);
				$.ajax({//inicia la linea del  proceso ajax
					url : url,
					data : parametros,
					type : 'POST',
					contentType: false,
					processData: false,
					beforesend: function(){
						$("#ajaxloader").show();
					},
					success : function(response) {	
						$("#form_update_propuesta")[0].reset();
						$("#editFiles").modal('hide');
						consutarFiles(id_estado);
					},
					error : function(xhr, status) {
						console.log('Disculpe, existió un problema');
						console.log(xhr);
						console.log(status);
					},
					complete : function(xhr, status) {
						console.log('Petición realizada, estados JS');
						console.log('Termino el proceso   (adit files)------------------------');
					}
				});//Termina la linea  del proceso ajax

			}

}
//EDITAR PROPUESTA , LOS PRIMEROS 4 PDFS END

//FUNCION GLOBAL PARA LA CONSULTA DE ARCHIVOS POR ID START 
function __Ajax(data){
	var ajax = $.ajax({
		url : url,
		data : data,
		type : 'POST',
		dataType : 'json'
	})
	return ajax;
}
//FUNCION GLOBAL PARA LA CONSULTA DE ARCHIVOS POR ID END 

//EDITAR PROPUESTA , PDF OFICIO DE AUTORIZACION START
function getEditarPropuestaAutorizacion(id_file){
	console.log('Inicia el proceso  (consulta file por id)------------------------');
	//$("#oficio_de_autorizacion").modal('show');
	console.log(id_file);
	var datos = {
		op:"busqueda_file",
		id_file:id_file
	}
	__Ajax(datos)
	.done(function(response){
		if (response.success) {
			console.log('Consulta exitosa');
			if ($.isEmptyObject(response.data.file) == true) {
				alert("No se puede modificar,solicite apoyo con el administrador del sistema.")
			}else{
				console.log(response.data.file.id_file);
				console.log(response.data.file.num_prop);
				$('#oficio_de_autorizacion').modal('show');
				document.form_update_propuesta_autorizacion.id_file.value = response.data.file.id_file;
				document.form_update_propuesta_autorizacion.num_prop.value = response.data.file.num_prop;
				document.form_update_propuesta_autorizacion.anno.value = response.data.file.anno;
				document.form_update_propuesta_autorizacion.id_estado.value = response.data.file.id_estado;
				document.form_update_propuesta_autorizacion.ofi_de_auto_nombre.value = response.data.file.ofi_de_auto;
			}
		}
	})
	.fail(function() {
	    alert( "error" );
	})
	.always(function() {
	    console.log('Termino el proceso (consulta file por id)------------------------');
	});
}

function editAutorizacion(){
	console.log('Inicia el proceso  (edit autorizacion)------------------------');
	var html = '';
		html +='<div class="alert  alert-warning" id="warining-mesage">';
		html +='<a  class="close">&times;</a>';
	var id_estado = document.form_update_propuesta_autorizacion.id_estado.value;
	var ofi_de_auto =  document.form_update_propuesta_autorizacion.ofi_de_auto.value;
	if (ofi_de_auto == "") {
		html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en el campo  Oficio de Autorización </div>';
		$("#mesage_edit_autorizacion").html(html);
	}else{
		var parametros = new FormData($("#form_update_propuesta_autorizacion")[0]);
		$.ajax({//inicia la linea del  proceso ajax
					url : url,
					data : parametros,
					type : 'POST',
					contentType: false,
					processData: false,
					beforesend: function(){
						$("#ajaxloader").show();
					},
					success : function(response) {	
						alert(response);
						$("#form_update_propuesta_autorizacion")[0].reset();
						$("#oficio_de_autorizacion").modal('hide');
						consutarFiles(id_estado);
					},
					error : function(xhr, status) {
						console.log('Disculpe, existió un problema');
						console.log(xhr);
						console.log(status);
					},
					complete : function(xhr, status) {
						console.log('Termina el proceso  (edit autorizacion)------------------------');
					}
				});//Termina la linea  del proceso ajax
		
	}

}
//EDITAR PROPUESTA , PDF OFICIO DE AUTORIZACION END
//--------------------------------------------------------------------------

//EDITAR PROPUESTA , 3 PDF OAC START
function getIdFileForOAC(id_file){
	console.log('Inicia el proceso  (consulta file por id)------------------------');
	console.log(id_file);
	var datos = {
		op:"busqueda_file",
		id_file:id_file
	}
	__Ajax(datos)
	.done(function(response){
		if (response.success) {
			console.log('Consulta exitosa');
			if ($.isEmptyObject(response.data.file) == true) {
				alert("No se puede modificar,solicite apoyo con el administrador del sistema.")
			}else{
				console.log(response.data.file.anno);
				console.log(response.data.file.id_estado);
				$("#editOAC").modal('show');
				document.form_update_propuesta_OAC.id_file.value = response.data.file.id_file;
				document.form_update_propuesta_OAC.num_prop.value = response.data.file.num_prop;
				document.form_update_propuesta_OAC.anno.value = response.data.file.anno;
				document.form_update_propuesta_OAC.id_estado.value = response.data.file.id_estado;
				document.form_update_propuesta_OAC.ofi_de_acue_nombre.value = response.data.file.ofi_de_acue;
				document.form_update_propuesta_OAC.acue_de_libe_nombre.value = response.data.file.acue_de_libe;
				document.form_update_propuesta_OAC.cier_ejer_y_cont_nombre.value = response.data.file.cier_ejer_y_cont;
			}
		}
	})
	.fail(function() {
	    alert( "error" );
	})
	.always(function() {
	    console.log('Termino el proceso (consulta file por id)------------------------');
	});
}

function editOAC(){
	console.log('Inicia el proceso  (edit autorizacion)------------------------');
	var html = '';
		html +='<div class="alert  alert-warning" id="warining-mesage">';
		html +='<a  class="close">&times;</a>';
	var id_estado = document.form_update_propuesta_OAC.id_estado.value;
	var ofi_de_acue =  document.form_update_propuesta_OAC.ofi_de_acue.value;
	var acue_de_libe =  document.form_update_propuesta_OAC.acue_de_libe.value;
	var cier_ejer_y_cont =  document.form_update_propuesta_OAC.cier_ejer_y_cont.value;
	if (ofi_de_acue == "") {
		html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en el campo  Oficio de Acuerdo </div>';
		$("#mesage_edit_oac").html(html);
	}else if (acue_de_libe == "") {
		html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en el campo  Acuerdo de Liberación</div>';
		$("#mesage_edit_oac").html(html);

	}else if (cier_ejer_y_cont == "") {
		html +='<strong>Advertencia!</strong> Selecciona tu archivo pdf en el campo  Cierre de ejercicio y control del ejercicio</div>';
		$("#mesage_edit_oac").html(html);

	} else{
		var parametros = new FormData($("#form_update_propuesta_OAC")[0]);
		$.ajax({//inicia la linea del  proceso ajax
					url : url,
					data : parametros,
					type : 'POST',
					contentType: false,
					processData: false,
					beforesend: function(){
						$("#ajaxloader").show();
					},
					success : function(response) {	
						alert(response);
						$("#form_update_propuesta_OAC")[0].reset();
						$("#editOAC").modal('hide');
						consutarFiles(id_estado);
					},
					error : function(xhr, status) {
						console.log('Disculpe, existió un problema');
						console.log(xhr);
						console.log(status);
					},
					complete : function(xhr, status) {
						console.log('Termina el proceso  (edit autorizacion)------------------------');
					}
				});//Termina la linea  del proceso ajax
		
	}

}
//EDITAR PROPUESTA , 3 PDF OAC  END

function getAprobar(id_file){
	console.log('Inicia el proceso  (consulta file por id)------------------------');
	console.log(id_file);
	var datos = {
		op:"busqueda_file",
		id_file:id_file
	}
	__Ajax(datos)
	.done(function(response){
		if (response.success) {
			console.log('Consulta exitosa');
			if ($.isEmptyObject(response.data.file) == true) {
				alert("No se puede modificar,solicite apoyo con el administrador del sistema.")
			}else{
				console.log(response.data.file.anno);
				console.log(response.data.file.id_estado);
				$("#aprobar").modal('show');
				document.form_update_propuesta_vobo.id_file.value = response.data.file.id_file;
				document.form_update_propuesta_vobo.id_estado.value = response.data.file.id_estado;

			}
		}
	})
	.fail(function() {
	    alert( "error" );
	})
	.always(function() {
	    console.log('Termino el proceso (consulta file por id)------------------------');
	});
}

function aprobar(){
		console.log('Inicia el proceso  (edit autorizacion)------------------------');
	var html = '';
		html +='<div class="alert  alert-warning" id="warining-mesage">';
		html +='<a  class="close">&times;</a>';
	var id_estado = document.form_update_propuesta_vobo.id_estado.value;
	var vobo =  document.form_update_propuesta_vobo.vobo.value;
	var comment_vobo =  document.form_update_propuesta_vobo.comment_vobo.value;
	if (vobo == "") {
		html +='<strong>Advertencia!</strong>El campo Validar es obligatorio. </div>';
		$("#mesage_edit_vobo").html(html);
	}else if (comment_vobo == "") {
		html +='<strong>Advertencia!</strong>El campo Comentario es obligatorio.</div>';
		$("#mesage_edit_vobo").html(html);

	} else{
		var parametros = new FormData($("#form_update_propuesta_vobo")[0]);
		$.ajax({//inicia la linea del  proceso ajax
					url : url,
					data : parametros,
					type : 'POST',
					contentType: false,
					processData: false,
					beforesend: function(){
						$("#ajaxloader").show();
					},
					success : function(response) {	
						alert(response);
						$("#form_update_propuesta_vobo")[0].reset();
						$("#aprobar").modal('hide');
						consutarFiles(id_estado);
					},
					error : function(xhr, status) {
						console.log('Disculpe, existió un problema');
						console.log(xhr);
						console.log(status);
					},
					complete : function(xhr, status) {
						console.log('Termina el proceso  (edit autorizacion)------------------------');
					}
				});//Termina la linea  del proceso ajax
		
	}

}

function open(){

}

function close(){

}

//FUNCTION FOR NAVIGATION START 
function regresar(){
init();
$("#tabla_estados").show();
}
//FUNCTION FOR NAVIGATION END