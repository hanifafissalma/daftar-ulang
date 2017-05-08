<?php 
	session_start();
	require_once 'functions/koneksi_ukt.php';
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link href="dist/img/LogoUnj.png" rel="shortcut icon"/>
	<link rel="stylesheet" href="dist/css/bootstrap.css" type="text/css"/>
	<link rel="stylesheet" href="dist/css/custom.css" type="text/css"/>
	<title>Daftar Ulang <?=date('Y')?> UNJ</title>
</head>
<body class="bg-unj">
	<div class="row" style="margin-top: 70px;">
		<div class="col-md-offset-4 col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading clearfix">
					<div class="pull-left" style="margin-right: 10px;">
						<img src="dist/img/LogoUnj.png" style="height: 60px;"/>
					</div>
					<div class="pull-left">
						<h3>DAFTAR ULANG <?=date('Y')?> UNJ</h3>
					</div>
				</div>
				<div class="panel-body">
					<form action="" method="post" id="login">
						<div class="form-group input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna">
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi">
						</div>

						<div class="form-group">
							<button type="submit" form="login" class="btn btn-primary btn-block">Masuk</button>
						</div>
					</form>
					<hr style="margin: 10px"/>
					<div class="text-center" style="font-size: 12px;">Copyright &copy; UPT TIK UNJ <?=date('Y')?></div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>