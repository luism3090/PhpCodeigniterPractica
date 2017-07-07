<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
</head>
<body>

	<?php echo $this->session->userdata('nombre') ." / ".$this->session->userdata('id'); ?> 

	<button type="button" id="btnCerrarSesion" class="btn btn-primary">Cerrar sesion</button>


	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>
	<script src="<?php echo base_url(); ?>public/js/home.js"></script> 

</body>
</html>