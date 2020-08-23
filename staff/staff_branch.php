<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>practice</title>
</head> 
<body>
<?php
if(isset($_POST['edit']) == true) {
  echo '修正ボタンが押された';
}
if(isset($_POST['delete']) == true) {
  echo '削除ボタンが押された';
}
?>
</body>