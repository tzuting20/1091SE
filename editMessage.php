<?php  // 改變待辦事項的狀態
require("dbconnect.php");

$importance=mysqli_real_escape_string($conn,$_POST['importance']);
$title=mysqli_real_escape_string($conn,$_POST['title']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$personInCharge=mysqli_real_escape_string($conn,$_POST['personInCharge']);
$id=(int)$_POST['id'];

// $newID = (isset($_POST['id']) ? $_POST['id'] : '');
// $newtitle = &$title;
// $newcontent = &$content;

if ($id) {
	$sql = "update todo set importance='$importance', title='$title', content='$content', personInCharge='$personInCharge' where id=$id;";
	mysqli_query($conn,$sql) or die("Update failed, SQL query error"); //執行SQL
	$msg="Message updated";
} else {
	$msg="Message title cannot be empty";
}
header("Location: todoList_Boss.php?m=$msg"); // 直接把網頁轉到你想讓他轉去的地方
?>
