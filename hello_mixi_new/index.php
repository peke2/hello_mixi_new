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


	require_once('oauth_test.php');
	$oauth = new OAuthTest();
	$is_signature_valid = $oauth->certifiesSginature( array_merge($_GET, $_POST) );

	if( $is_signature_valid == true )
	{
		session_start();
		$_SESSION['test_session'] = $_POST;
	}
	else
	{
		session_start();
		$_SESSION = array();

		if( ini_get("session.use_cookies") )
		{
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}

		session_destroy();
		echo "[署名の確認に失敗]<br>";
	}

?>

<script type="text/javascript" charset="UTF-8" src="http://static.mixi.jp/js/application/connect.js"></script>
<script type='text/javascript' src='http://sub0000498489.hmk-temp.com/test/hello_mixi_new/init.js'></script>"

</body>
</html>
