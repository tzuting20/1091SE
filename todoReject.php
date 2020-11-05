<?php  // 改變代辦事項的狀態
require("dbconnect.php");

@$contentID=(int)$_GET['id'];
if ($contentID) {
	$sql = "update todo set status=0 where id=$contentID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
echo "Message:$contentID completed.";
?>
<a href="todoList.php">&nbsp&nbsp&nbsp返回</a>