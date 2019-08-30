<div class="container">
    <form id="form1" method="POST" autocomplete="off" style="font-size: smaller">
        <br/>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Registrar Avistamiento</div>
                    <div class="card-body">                        
                        <div class="row">
                            <input id="id" type="hidden" name="id">
                            <label class="col-md-3 col-form-label form-control-sm" for="cmbEspecie">Especie</label>
                            <div class="col-md-9"> 
                                <select id="cmbEspecie" name="cmbEspecie" class="form-control form-control-sm">
                                    <option value="0">Seleccionar</option>
                                </select>  
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_nCientifico">Lugar</label>
                            <div class="col-md-9"> 
                                <select id="cmbLugar" name="cmbLugar" class="form-control form-control-sm">
                                    <option value="0">Seleccionar</option>
                                </select>  
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_latitud">* Latitud</label>
                            <div class="col-md-9"> <input id="txt_latitud" name="txt_latitud" class="form-control form-control-sm" placeholder="Latitud" /> </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_longitud">* Longitud</label>
                            <div class="col-md-9"> <input id="txt_longitud" name="txt_longitud" class="form-control form-control-sm" placeholder="Longitud" /> </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_autor">Autor</label>
                            <div class="col-md-9"> <input id="txt_autor" name="txt_autor" class="form-control form-control-sm" placeholder="Autor" /> </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_longitud">Observacion</label>
                            <div class="col-md-9"> <textarea id="txt_observacion" name="txt_observacion" class="form-control form-control-sm" placeholder="Observacion"></textarea> </div>
                        </div>
                        <p>* Latitud y Longitud deben ser digitados en decimales</p>
                        <div class="row">
                            <div class="col-md-12" align="right"> 
                                <input class="btn btn-sm btn-primary" type="button" name="Guardar" value="Guardar" onclick="guardar()"/>
                                <input class="btn btn-sm btn-danger" type="reset" value="Cancelar"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                                <label class="col-md-2 col-form-label form-control-sm" for="cmbFEspecie">Especie</label> 
                                <div class="col-md-10"> 
                                    <select id="cmbFEspecie" name="cmbFEspecie" class="form-control form-control-sm"> 
                                        <option value="0">Seleccionar</option>                                     
                                    </select>  
                                </div>
                                <label class="col-md-2 col-form-label form-control-sm" for="cmbFLugar">Lugar</label>       
                                <div class="col-md-10"> 
                                    <select id="cmbFLugar" name="cmbFLugar" class="form-control form-control-sm"> 
                                        <option value="0">Seleccionar</option>                                       
                                    </select>   
                                </div>
                                <label class="col-md-2 col-form-label form-control-sm" for="txt_autor">Autor</label> 
                                <div class="col-md-8"> 
                                    <input id="txt_filtro" name="txt_filtro" class="form-control form-control-sm" placeholder="Autor" />
                                </div>

                                 
                                <div class="col-md-2"> <input class="btn btn-sm btn-success" type="button" value="Filtrar" onclick="listado()"/> </div>
                        </div>
                        <table id="tbl" class="table table-sm table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Nombre Cientifico</th>
                                <th scope="col">Familia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    

        <!-- Modal Eliminar-->
        <div class="modal fade bs-example-modal-lg" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>							
                    </div>
                    <div class="modal-body">                                
                        <div id="panelEliminarLinea">
                            <div id="txtEliminar"> </div>
                        </div>                                    
                    </div>                                	
                </div>
            </div>
        </div>
    </form>
</div>

<script src="<?php echo base_url()?>asset/js/code/avistamiento.js"></script>