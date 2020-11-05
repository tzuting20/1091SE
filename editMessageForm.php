<?php
session_start();
require("dbconnect.php");
$id = (int)$_GET['id'];
$sql = "select * from todo where id = $id;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
if (! $rs) {
	echo "no data found";
	exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>編輯</title>
<style>
<!-- A{text-decoration:none} -->
input[type=text], select, textarea {
  width: 40%;
  padding: 12px;
  border: none;
  border-bottom: 2px solid #095256;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4D5382;
  color: white;
  padding: 12px 18px;
  border: none;
  border-radius: 40px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #BBC2E2;
}

input[name=back] {
  background-color: white;
  color: #4D5382;
  padding: 12px 18px;
  border: none;
  border-radius: 40px;
  cursor: pointer;
  float: right;
}

.container {
  border-radius: 5px;
  background-color: #BBC2E2;
  padding: 20px;
}
</style>
</head>
<body>
<h1>編輯待辦事項</h1>
<form method="post" action="editMessage.php">

      <input type='hidden' name='id' value='<?php echo $id ?>'>

      重要性： <select name="importance">
      <option value= "緊急">緊急</option>
      <option value= "重要">重要</option>
      <option value= "一般">一般</option>
      </select> <br>

      標題: <input name="title" type="text" id="title" value="<?php echo htmlspecialchars($rs['title']);?>" /> <br>

      內容: <input name="content" type="text" id="content" value="<?php echo htmlspecialchars($rs['content']);?>" /> <br>

      交辦人: <input name="personInCharge" type="text" id="personInCharge" value="<?php echo htmlspecialchars($rs['personInCharge']);?>" /> <br>
	  
      <input type="submit" name="Submit" value="送出" />
      <input type="submit" name="back" href="todoList_Boss.php" value="返回" />
</form>
  </tr>
</table>
</body>
</html>
