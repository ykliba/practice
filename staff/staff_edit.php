<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>practice</title>
</head> 
<body>

<?php

try {
 $staff_code = $_POST['staffcode'];

  $staff_code = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
  
  $dsn='mysql:dbname=practice;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'INSERT INTO staff(name,password) VALUES(?,?)';
  $stmt = $dbh -> prepare($sql);
  $data[] = $staff_code;
  $stmt -> execute($data);

  $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
  $staff_name = $rec['name'];

  $dbh = null;

}
catch(Exception $e) {
  // echo 'ただいま障害により大変ご迷惑をお掛けしております。';
  echo $e->getFile(), '/', $e->getLine(), ':', $e->getMessage();
  exit();
}
?>

スタッフ修正<br>
<br>
スタッフコード<br>
<?php echo $staff_code; ?>
<br>
<br>
<form method = "post" action = "staff_edit_check.php">
<input type = "hidden" name = "code" value = "<?php echo $staff_code; ?>">
スタッフ名 <br>
<input type = "text" name = "name" style = "width:200px" value = "<?php echo $staff_name; ?>"><br>
パスワードを入力してください。<br>
<input type = "password" name = "pass" style = "width:100px"><br>
パスワードをもう一度入力してください。<br>
<input type = "password" name = "pass2" style = "width:100px"><br>
<br>
<input type = "button" onclick = "history.back()" value = "戻る">
<input type = "submit" value = "OK">
</form>
<body>