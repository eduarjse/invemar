listado();

function guardar() {
	var form = $("#form1");
	$.ajax({
		type : 'POST',
		url : baseurl+'especie/guardar',
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
        url: baseurl+'especie/listado_especies',
        data: {txtFiltro:txtFiltro, cmbFiltro:cmbFiltro},//data: {txtFiltro:txtFiltro},
        success(data) {
            var datos = JSON.parse(data);
            //
            var tabla = '<table id="tbl" class="table table-sm table-striped">\
            <thead>\
                <tr>\
                <th scope="col">#</th> <th scope="col">Nombre</th>\
                <th scope="col">Nombre Cientifico</th> <th scope="col">Familia</th>\
                <th scope="col">Opciones</th> </tr>\ </thead> <tbody>';

            $.each(datos, function(i, item) {
                //tabla += '<tr><td><button class="btn btn-light btn-sm" onclick="buscarArticuloById('+item.IDARTICULO+')">'+item.IDARTICULO+'</button></td><td>'
                tabla += '  <tr>\ <th scope="row">'+item.ID+'</th> <td>'+item.nombre_comun+'</td>\
                                <td>'+item.nombre_cientifico+'</td> <td>'+item.familia+'</td>\
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
        url: baseurl+'comun/get_row_from_by_id/especie/'+ID,
        data: {},//data: {txtFiltro:txtFiltro},
        success(data) {
            //alert(data);
            var datos = JSON.parse(data);

            $('[name=id]').val(datos.ID);
            $('#txt_nombre').val(datos.nombre_comun);
            $('#txt_nCientifico').val(datos.nombre_cientifico);
            $('#txt_familia').val(datos.familia);
        }
    });	
} 

function popupEliminar(ID) {    
    //alert('PorEliminar'+idCliente);
    $.ajax({
        type : 'GET',
        url:baseurl+'comun/get_row_from_by_id/especie/'+ID,
        data: {},
        success(data) {             
            //alert(data);
            var datos = JSON.parse(data); 
            var strHtml =   '<div id="panelEliminarLinea"> '+
                                '<div id="txtEliminar"> '+
                                    '<div class="row"> <div class="col-md-12">'+
                                    '<p>Desea eliminar la especie \"'+datos.nombre_comun+'\"?</p>'+     
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
        url: baseurl+'Especie/eliminar/'+ID,
        data: {},
        success(data) {  
            console.log(data);
            alert('Linea eliminada');
            listado();
        }
    });
}