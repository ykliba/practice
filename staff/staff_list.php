<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>practice</title>
</head> 
<body>

<?php
try {
  $dsn='mysql:dbname=practice;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';
  $dbh = new PDO($dsn,$user,$password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT code,name FROM staff WHERE 1';
  $stmt = $dbh -> prepare($sql);
  $stmt -> execute($data);

  $dbh = null;

  echo 'スタッフ一覧<br><br>';

  echo '<form method = "post" action = "staff_edit.php">';
  while(true) {
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($rec == false) {
      break;
    }
    echo '<input type = "radio" name = "staffcode" value = "'.$rec['code'].'">';
    echo $rec['name'];
    echo '<br>';
  }
  echo '<input type = "submit" value = "修正">';
  echo '</form>';

} catch (Exception $e) {
  echo 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}
?>
</body>