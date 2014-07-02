<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabaluga University</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/Courses.css">
	<link rel="stylesheet" type="text/css" href="../css/forum.css">
	<style>
	    
	 </style>
</head>
<body>

<!-- Site Header and Navigation -->
<nav class="navbar navbar-inverse navbar-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<div class="row">
				<a class="navbar-brand" href="#">  <img style="max-width:100px; margin-top: -13px;max-height:100px;" src="../images/tabaluga-1.png"  alt="logo">Tabaluga University</a>
			</div>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="row">
					<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Търсене">
					</div>
					<button class="btn btn-searchBtn">Търси</button>
					</form>
				</div>
				<div class="row">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html">Начало</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">За университета <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="Teachers.html">Преподаватели</a></li>
								<li><a href="LifeInSoftUni.html">Живота в SoftUni</a></li>
								<li><a href="Scholarship.html">Стипенидия</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Професии <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="ninja.html">Програмист-нинджа</a></li>
								<li><a href="god.html">Programming God</a></li>
								<li><a href="strong.html">Силен програмист</a></li>
								<li><a href="bad.html">Некадърен програмист</a></li>
							</ul>
						</li>
						<li class="active"><a href="Courses.html">Курсове</a></li>
						<li><a href="http://iliailiev.net/forum/main_forum.php">Форум</a></li>
						<li><a href="contacts.html">Контакти</a></li>
					</ul>
				</div>
			</div><!-- /.navbar-collapse -->
		</div>
	</div>
</nav>

<div class="jumbotrona">
	<div class="container">
		<?php
	
		$host="localhost"; 
		$username="tabaluga";
		$password="tabaluga1";
		$db_name="tabaluga-forum";
		$tbl_name="forum_question"; // Table name 

		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");
		$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
		// OREDER BY id DESC is order result by descending

		$result=mysql_query($sql);
		?>

		<table class="table-hover">
		  <tr>
			<td id="number"><strong>#</strong></td>
			<td id="topic"><strong>Topic</strong></td>
			<td id="views"><strong>Views</strong></td>
			<td id="replies"><strong>Replies</strong></td>
			<td id="date"><strong>Date/Time</strong></td>
		  </tr>

		<?php
		 
		// Start looping table row
		while($rows=mysql_fetch_array($result)){
		?>
		  <tr>
			<td ><? echo $rows['id']; ?></td>
			<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<? echo $rows['id']; ?>"><? echo $rows['topic']; ?></a><BR></td>
			<td class="tdtext"><? echo $rows['view']; ?></td>
			<td class="tdtext"><? echo $rows['reply']; ?></td>
			<td class="tdtext"><? echo $rows['datetime']; ?></td>
		  </tr>

		<?php
		// Exit looping and close connection 
		}
		mysql_close();
		?>
		</table>
		<br />
			<a href="create_topic.php" id="create"><strong>Create New Topic</strong> </a>
	</div>
</div>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container">
		<div class="navbar navbar-right">
			<button class="btn btn-default">Petar Genov</button> 
			<button class="btn btn-default">Engin Dzhemil</button> 
			<button class="btn btn-default">Iliya Iliev</button> 
			<button class="btn btn-default">Desislav Delchev</button> 
		</div>
	</div>
</nav>

<script src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
