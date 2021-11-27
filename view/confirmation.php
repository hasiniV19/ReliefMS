<?php

/**@var $id*/
/**@var $name*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link rel="stylesheet" type="text/css" href="views/css/confirmation.css">
    <script src="https://kit.fontawesome.com/9806c8546d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
		<h1>Your Application was successfully submitted</h1>
        <!-- <i class="far fa-handshake fa-8x"></i> -->
        <i class="fa fa-check-circle fa-8x" aria-hidden="true"></i>
        <p>We will contact you soon</p>
	</div>
	<h1><?php echo $id;?></h1>
    <h1><?php echo $name;?></h1>
</body>
</html>