<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>はじめてのmixiアプリ</title>

</head>
<body bgcolor="#20e080">
はじめてのmixiアプリ<br>
<?php
	echo "今は[".date("Y年m月d日 H時i分s秒")."]です<br>";

	var_dump($_GET);
	var_dump($_POST);

	echo $_POST['opensocial_owner_id'];
	echo "<br>";
	echo $_POST['opensocial_viewer_id'];
	echo "<br>";

	session_start();
	$_SESSION['test_session'] = $_POST;

?>

<script type="text/javascript" charset="UTF-8" src="http://static.mixi.jp/js/application/connect.js"></script>
<script type='text/javascript' src='http://sub0000498489.hmk-temp.com/test/hello_mixi_new/init.js'></script>"

</body>
</html>
