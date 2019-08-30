listado();

function guardar() {
	var form = $("#form1");
	$.ajax({
		type : 'POST',
		url : baseurl+'lugar/guardar',
		data: form.serialize(),

		success: function(data) {
        
        var datos = JSON.parse(data);	        
            //listarArticulo();
            if (datos.TIPO == 1) {
                alert(datos.MENSAJE);
                $('[name=id]').val('');
                $('#form1')[0].reset();
                listado();
            } else {
                alert('NO SE REALIZO NINGUN CAMBIO');
            }
		}
	});
}

function listado() {
    var txtFiltro = document.getElementById("txt_filtro").value;
    var cmbFiltro = document.getElementById("cmbFiltro").value;
    
    $.ajax({
        type: 'POST',
        url: baseurl+'lugar/listado_lugares',
        data: {txtFiltro:txtFiltro, cmbFiltro:cmbFiltro},//data: {txtFiltro:txtFiltro},
        success(data) {
            var datos = JSON.parse(data);
            //
            var tabla = '<table id="tbl" class="table table-sm table-striped">\
            <thead>\
                <tr>\
                <th scope="col">#</th> <th scope="col">Pais</th>\
                <th scope="col">Departamento</th> <th scope="col">Nombre</th>\
                <th scope="col">Alias</th> <th scope="col">Opciones</th> </tr>\ </thead> <tbody>';

            $.each(datos, function(i, item) {
                //tabla += '<tr><td><button class="btn btn-light btn-sm" onclick="buscarArticuloById('+item.IDARTICULO+')">'+item.IDARTICULO+'</button></td><td>'
                tabla += '  <tr>\ <th scope="row">'+item.ID+'</th> <td>'+item.pais+'</td>\
                                <td>'+item.departamento+'</td> <td>'+item.nombre+'</td> <td>'+item.alias+'</td>\
                                <td><button type="button" class="btn btn-success btn-sm" onclick="seleccionar('+item.ID+')"><i class="fa fa-pencil"> </i></button>\
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar" onclick="popupEliminar('+item.ID+')">  <i class="fa fa-trash"> </i>  </button></td>\
                            </tr>';
            });

            tabla += '</tbody></table>';

            $('#tbl').html(tabla);  
        }
    });	
}

function seleccionar(ID) {
    $.ajax({
        type: 'POST',
        url: baseurl+'comun/get_row_from_by_id/lugar/'+ID,
        data: {},//data: {txtFiltro:txtFiltro},
        success(data) {
            //alert(data);
            var datos = JSON.parse(data);

            $('[name=id]').val(datos.ID);
            $('#txt_pais').val(datos.pais);
            $('#txt_departamento').val(datos.departamento);
            $('#txt_nombre').val(datos.nombre);
            $('#txt_alias').val(datos.alias);
        }
    });	
} 

function popupEliminar(ID) {    
    //alert('PorEliminar'+idCliente);
    $.ajax({
        type : 'GET',
        url:baseurl+'comun/get_row_from_by_id/lugar/'+ID,
        data: {},
        success(data) {             
            //alert(data);
            var datos = JSON.parse(data); 
            var strHtml =   '<div id="panelEliminarLinea"> '+
                                '<div id="txtEliminar"> '+
                                    '<div class="row"> <div class="col-md-12">'+
                                    '<p>Desea eliminar el lugar \"'+datos.nombre+'\" del pais '+datos.pais+'?</p>'+     
                                    '</div> </div>'+
                                    '<div class="row" align="right"> <div class="col-md-12"> <input class="btn btn-danger" type="button" value = "Eliminar" data-dismiss="modal" onclick="eliminar('+datos.ID+')"> </input> </div> </div>'+
                                '</div> '+
                            '</div>';
                        
            $('#panelEliminarLinea').html(strHtml);
        }
    });
}

function eliminar(ID) {    
    var form = $("#form1");
    $.ajax({
        type : 'POST',
        url: baseurl+'lugar/eliminar/'+ID,
        data: {},
        success(data) {  
            console.log(data);
            alert('Linea eliminada');
            listado();
        }
    });
}