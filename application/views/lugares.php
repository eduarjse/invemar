<div class="container">
    <form id="form1" method="POST" autocomplete="off" style="font-size: smaller">
        <br/>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Registrar Lugares</div>
                    <div class="card-body">
                        
                        <div class="row">
                            <input id="id" type="hidden" name="id">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_pais">Pais</label>
                            <div class="col-md-9"> <input id="txt_pais" name="txt_pais" class="form-control form-control-sm" placeholder="Pais" /> </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_departamento">Departamento</label>
                            <div class="col-md-9"> <input id="txt_departamento" name="txt_departamento" class="form-control form-control-sm" placeholder="Departamento" /> </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_nombre">Nombre</label>
                            <div class="col-md-9"> <input id="txt_nombre" name="txt_nombre" class="form-control form-control-sm" placeholder="Nombre" /> </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label form-control-sm" for="txt_alias">Alias</label>
                            <div class="col-md-9"> <input id="txt_alias" name="txt_alias" class="form-control form-control-sm" placeholder="Alias" /> </div>
                        </div>
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
                                <div class="col-md-3"> 
                                    <select id="cmbFiltro" name="cmbFiltro" class="form-control form-control-sm">
                                        <option value="pais">PAIS</option>
                                        <option value="departamento">DEPARTAMENTO</option>
                                        <option value="nombre">NOMBRE</option>
                                        <option value="alias">ALIAS</option>
                                    </select>  
                                </div>        
                                <div class="col-md-7"> <input id="txt_filtro" name="txt_filtro" class="form-control form-control-sm" placeholder="Filtro" /> </div>
                                <div class="col-md-2"> <input class="btn btn-sm btn-success" type="button" value="Filtrar" onclick="listado()"/> </div>
                        </div>
                        <table id="tbl" class="table table-sm table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pais</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Alias</th>
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

<script src="<?php echo base_url()?>asset/js/code/lugar.js"></script>