<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo where status = 0 order by CASE importance WHEN '緊急' THEN 1 WHEN '重要' THEN 2 ELSE 3 END, personInCharge;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
// $msg=(isset($_GET['m']) ? $_GET['m'] : '');
if (isset($_GET['m'])) {
  $msg=$_GET['m'];
} else {
  $msg="今天好嗎";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>todo</title>
<style>
table {
  border-collapse: collapse;
  width: 80%;
}

tr ,td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color:#D1BEB0;}

<!-- A{text-decoration:none} --> /* 刪除連結的底線 */

</style>
</head>

<body>

<p>我的待辦事項 !! </p>
<hr />
<div><?php echo $msg; ?></div><hr>
<a href="doneList.php">檢視已完成事項</a></br> 
<table>
  <tr>
    <td>重要性</td>
    <td>編號</td>
    <td>標題</td>
    <td>內容</td>
    <td>交辦人</td>
    <td>修改狀態</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
  echo "<tr><td>" . $rs['importance'] . "</td>";
	echo "<td>" , $rs['id'] . "</td>"; # 顯示id
	echo "<td>{$rs['title']}</td>";
	echo "<td>" , htmlspecialchars($rs['content']), "</td>";
  echo "<td>" , $rs['personInCharge'], "</td>";
  echo "<td><a href='todoSet.php?id={$rs['id']}'>OK</a>" . "</td></tr>";
}
?>
</table>
<hr />
<!-- <a href="addMessageForm.php">我要新增事項</a>  -->
</body>
</html>
