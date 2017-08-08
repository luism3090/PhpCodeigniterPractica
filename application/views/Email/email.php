<?php 

$host= gethostname();
$ip = gethostbyname($host);

?>
	
	<h3>Hola <?php echo $nombre.' '.$apellidos;?> este es un mensaje de prueba </h3><hr><br> prueba el siguiente
    enlace de descarga aqui: <br>
	<a href="<?php echo $ip; ?>/PhpCodeigniterPractica/public/uploads/<?php echo $foto;?> >" download>
		archivo
	</a>
