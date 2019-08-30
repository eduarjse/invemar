<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
/*
if(empty($this->session->userdata('s_idUsuario'))){
    redirect('clogin/', 'location');
}
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PruebaTecnica</title>

        <!--<script src="<?php echo base_url();?>asset/js/jquery-1.12.4.min.js"></script>-->
        <script src="<?php echo base_url();?>asset/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/popper.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>asset/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/dataTables.bootstrap4.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/signin.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>              
        <script src="<?php echo base_url();?>asset/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/dataTables.bootstrap.min.js"></script>

        <!--<script type="text/javascript" src="<?php echo base_url();?>asset/js/codecategoria.js"></script> -->
        <!--<script type="text/javascript" src="<?php echo base_url();?>asset/js/codecliente.js"></script> -->
        <!--<script src="<?php echo base_url()?>asset/js/say-cheese.js"></script>-->
        <script type="text/javascript">
            var baseurl = "<?php echo base_url();?>";
        </script>
        <script>
        
        </script>
    </head>
    <body>
       
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Administrar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>especie">Especies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>lugar">Lugares</a>
                </li>                
            </div>
        </nav>