cmb_especie();
cmb_lugares();
listado();

function cmb_especie() {
    $.ajax({
        type: 'GET',
        url: baseurl+'comun/get_all_from/especie',
        data: {},//data: {txtFiltro:txtFiltro},
        success(data) {
            var datos = JSON.parse(data);
            $.each(datos, function(i, item) {
                $('#cmbEspecie').append('<option value="'+item.ID+'">'+item.nombre_comun +' - '+item.nombre_cientifico+'</option>')
                $('#cmbFEspecie').append('<option value="'+item.ID+'">'+item.nombre_comun +' - '+item.nombre_cientifico+'</option>')
            }); 
        }
    });	
}

function cmb_lugares() {
    $.ajax({
        type: 'GET',
        url: baseurl+'comun/get_all_from/lugar',
        data: {},//data: {txtFiltro:txtFiltro},
        success(data) {
            var datos = JSON.parse(data);
            $.each(datos, function(i, item) {
                $('#cmbLugar').append('<option value="'+item.ID+'">'+item.pais +' - '+item.departamento+' - '+item.nombre+'</option>')
                $('#cmbFLugar').append('<option value="'+item.ID+'">'+item.pais +' - '+item.departamento+' - '+item.nombre+'</option>')
            }); 
        }
    });	
}

function guardar() {
	var form = $("#form1");
	$.ajax({
		type : 'POST',
		url : baseurl+'avistamiento/guardar',
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
                alert(datos.MENSAJE);
            }
		}
	});
}

function listado() {
    var cmbFEspecie = document.getElementById("cmbFEspecie").value;
    var cmbFLugar = document.getElementById("cmbFLugar").value;
    var txtFiltro = document.getElementById("txt_filtro").value;    
    
    $.ajax({
        type: 'POST',
        url: baseurl+'avistamiento/listado_avistamientos',
        data: {cmbFEspecie:cmbFEspecie, cmbFLugar:cmbFLugar, txtFiltro:txtFiltro},//data: {txtFiltro:txtFiltro},
        success(data) {
            var datos = JSON.parse(data);
            //
            var tabla = '<table id="tbl" class="table table-sm table-striped">\
            <thead>\
                <tr>\
                <th scope="col">#</th> <th scope="col">Lugar</th>\
                <th scope="col">Especie</th> <th scope="col">autor</th>\
                <th scope="col">observacion</th> <th scope="col">Opciones</th> </tr>\ </thead> <tbody>';

            $.each(datos, function(i, item) {
                //tabla += '<tr><td><button class="btn btn-light btn-sm" onclick="buscarArticuloById('+item.IDARTICULO+')">'+item.IDARTICULO+'</button></td><td>'
                tabla += '  <tr>\ <th scope="row">'+item.ID+'</th> <td>'+item.pais+'/'+item.alias+'</td>\
                                <td>'+item.nombre_comun+'/'+item.nombre_cientifico+'</td> <td>'+item.autor+'</td> <td>'+item.observacion+'</td>\
                                <td><button type="button" class="btn btn-success btn-sm" onclick="seleccionar('+item.ID+')"><i class="fa fa-pencil"> </i></button>\
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEliminar" onclick="popupEliminar('+item.ID+')">  <i class="fa fa-eye"> </i>  </button></td>\
                            </tr>';
            });

            tabla += '</tbody></table>';

            $('#tbl').html(tabla);  
        }
    });	
}