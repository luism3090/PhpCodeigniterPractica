<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>

	<?php echo $this->session->userdata('nombre') ." / ".$this->session->userdata('id'); ?> 

</body>
</html>