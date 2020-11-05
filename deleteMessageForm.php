<style>
<!-- A{text-decoration:none} -->
input[type=text] {
  border: none;
  border-bottom: 2px solid #BBC2E2;
}
</style>
<?php
session_start();
require("dbconnect.php");

@$contentID=(int)$_GET['id'];
if ($contentID) {
	$sql = "delete From todo where id=$contentID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
echo "Message:$contentID completed.";
?>
<a href="todoList_Boss.php">&nbsp&nbsp&nbsp返回</a>
<!-- <h1>取消工作</h1>
<table>
  <tr><form method="post" action="deleteMessage.php">
    <td><label>
      <input type="submit" name="Submit" value="送出" />
    </label></td>
    <td><label>
      Message ID: <input name="id" type="text" id="id" />
    </label></td>
	</form>
  </tr>
</table> -->