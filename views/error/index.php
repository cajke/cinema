<head>
    <title>404 Not Found</title>
    <link rel="stylesheet" href="<?php echo URL; ?>web/css/style.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL; ?>web/images/titleLogo.ico" />
    <script type="text/javascript" src="<?php echo URL; ?>web/js/custom.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="error-content" style="padding-top: 100px;">
	<img src="<?php echo URL; ?>web/images/logo.png" class="img-responsive">
	<div class="error-text" style="margin-top: 60px;">
		<h1>404 Not Found</h1>
		<h2><?php echo $this->headline; ?></h2>
		<div class="text">
            <p><?php echo $this->errorText;?></p>
		</div>
		<br>
		<a href="<?php echo URL;?>home"><i class="glyphicon glyphicon-arrow-left"></i>NAZAD NA POČETNU</a>
	</div>
</div>