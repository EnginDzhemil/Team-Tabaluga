<!DOCTYPE html>

<html>
<head>
  <title>PHP Demo</title>
  <link href="forum.css" rel="stylesheet">
</head>
<body>

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

<table>
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
    <td bgcolor="#FFFFFF"><? echo $rows['id']; ?></td>
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

  <tr>
    <td id="create"><a href="create_topic.php"><strong>Create New Topic</strong> </a></td>
  </tr>
</table>
</body>
</html>
