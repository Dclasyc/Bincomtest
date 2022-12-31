<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="Inec Realtime Result Viewer" />
	<meta name="Keywords" content=" Nigeria Election; INEC; Election Result; " />
	<meta name="author" content=" Oladipo Samuel Akarigbo" />

	<link rel="stylesheet" type="text/css" href="..\bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="..\bootstrap/css/all.min.css">
	<script src="..\bootstrap/js/all.min.js"></script>

	<style>
  		<?php include "..\stylingsheet.css" ?>
	</style>

	<script type="text/javascript" src="..\bootstrap/js/bootstrap.js"></script>

	<title>BINCOM ELECTION RESULT CHECKER</title>
</head>
<body>


			<!-- Navigation panel -->

		<nav class="navbar navbar-expand-md navbar-light bg-light">
		<a class="navbar-brand" href="index.php" id="logowrapper"><img src="..\images/bincomlogo.png" alt="logo Image" id="logo" style="width:100px; height:75px"/></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #8FC74A;">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pollingunitresult.php">Polling Unit Results</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="lgaresult.php">LGA Results</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="newpuresult.php">Insert New PU Result</a>
			</li>
			</ul>
		</div>
		</nav>