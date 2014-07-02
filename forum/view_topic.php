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
$tbl_name="forum_question";  

// Connect 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// getID 
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>

<table class="viewtable">
  <tr>
    <td>
      <table class="view-ta-table">
        <tr>
          <td class="bgc topic"><strong><? echo $rows['topic']; ?></strong></td>
        </tr>
        <tr>
          <td class="bgc post"><? echo $rows['detail']; ?></td>
        </tr>
        <tr>
          <td class="bgc topic"><strong>By :</strong> <? echo $rows['name']; ?> <strong>Email : </strong><? echo $rows['email'];?></td>
        </tr>
    
        <tr>
          <td class="bgc topic"><strong>Date/time : </strong><? echo $rows['datetime']; ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<BR />

<?php

$tbl_name2="forum_answer"; //table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysql_query($sql2);
while($rows=mysql_fetch_array($result2)){
?>

<table class="viewtable">
 <tr>
    <td><table class="view-ta-table">
  <tr>
    <td class="bgc"><strong>ID</strong></td>
    <td class="bgc">:</td>
    <td class="bgc"><? echo $rows['a_id']; ?></td>
  </tr>
  <tr>
    <td width="10%" class="bgc"><strong>Name</strong></td>
    <td width="3%" class="bgc">:</td>
    <td width="77%" class="bgc"><? echo $rows['a_name']; ?></td>
  </tr>
  <tr>
    <td class="bgc"><strong>Email</strong></td>
    <td class="bgc">:</td>
    <td class="bgc"><? echo $rows['a_email']; ?></td>
  </tr>
  <tr>
    <td class="bgc"><strong>Answer</strong></td>
    <td class="bgc">:</td>
    <td class="bgc"><? echo $rows['a_answer']; ?></td>
  </tr>
  <tr>
    <td class="bgc"><strong>Date/Time</strong></td>
    <td class="bgc">:</td>
    <td class="bgc"><? echo $rows['a_datetime']; ?></td>
  </tr>
</table></td>
</tr>
</table>
<br>
 
<?php
}

$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysql_query($sql3);
$rows=mysql_fetch_array($result3);
$view=$rows['view'];
 
// if no => counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysql_query($sql4);
}
 
// count 
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysql_query($sql5);
mysql_close();
?>

<BR />
<table >
  <tr>
    <form name="form1" method="post" action="add_answer.php">
    <td>
      <table class="viewtable-a">
        <tr>
        <td width="18%"><strong>Name</strong></td>
          <td width="5%">:</td>
          <td width="70%"><input name="a_name" type="text" id="a_name" size="45"></td>
          </tr>
        <tr>
          <td><strong>Email</strong></td>
          <td>:</td>
          <td><input name="a_email" type="text" id="a_email" size="45"></td>
        </tr>
        <tr>
          <td valign="top"><strong>Answer</strong></td>
          <td valign="top">:</td>
          <td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="id" type="hidden" value="<? echo $id; ?>"></td>
          <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
        </tr>
      </table>
    </td>
    </form>
  </tr>
</table>

		
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
