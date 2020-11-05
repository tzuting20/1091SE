<style>
<!-- A{text-decoration:none} -->
input[type=text] {
  border: none;
  border-bottom: 2px solid #BBC2E2;
}
</style>
<?php
require("dbconnect.php");
$importance=mysqli_real_escape_string($conn,$_POST['importance']);
$title=mysqli_real_escape_string($conn,$_POST['title']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$status=mysqli_real_escape_string($conn,$_POST['status']);
$personInCharge=mysqli_real_escape_string($conn,$_POST['personInCharge']);

if ($title) { //if title is not empty
	$sql = "insert into todo (importance, title, content, status, personInCharge) values ('$importance', '$title', '$content','$status','$personInCharge');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	$msg="Message added";
} else {
	$msg="Message title cannot be empty";
}
header("Location: todoList_Boss.php?m=$msg");
?>