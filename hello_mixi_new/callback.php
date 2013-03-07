<html>
<head>
</head>

<body>

<script type="text/javascript" charset="UTF-8" src="http://static.mixi.jp/js/application/connect.js"></script>
<script type="text/javascript">gadgets.window.adjustHeight(1024);</script>
<script type="text/javascript" src="http://sub0000498489.hmk-temp.com/test/hello_mixi_new/api_test.js"></script>

	<script type="text/javascript">
		gadgets.util.registerOnLoadHandler(test_init);
	</script>

	<div id="replace_target">デフォルト文字列</div>


<?php

require_once('api_test.php');

//	mixiからのコールバック受付
echo "<pre>";
echo "---- GETパラメータ ----\n";
print_r($_GET);
echo "---- PUTパラメータ ----\n";
print_r($_POST);
echo "</pre>";



//curl_init("https://api.mixi-platform.com/2/people/@me/@self");
/*
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://sub0000498489.hmk-temp.com/test/hello_mixi_new/curl_test.php");
$result = curl_exec($curl);
curl_close($curl);
print_r($result);
*/


	//	コンシューマーキーとシークレットは「Graph API」用のものを使う
//	$consumer_key       = '45846b9b6a5240bf5db4';
//	$consumer_secret    = '2d8da20998d988b266fdfca930a9b847cca168b7';
	$consumer_key       = 'mixiapp-web_39447';
	$consumer_secret    = '44c89864e55cdc512c3ac197f04efe842233e69b';
	$authorization_code = $_GET['code'];
	//	URLエンコードは不要
//	$redirect_uri       = urlencode('http://sub0000498489.hmk-temp.com/test/hello_mixi_new/callback.php');
	$redirect_uri       = 'http://sub0000498489.hmk-temp.com/test/hello_mixi_new/callback.php';

	$json_token = getToken(
		"https://secure.mixi-platform.com/2/token",
		$consumer_key,
		$consumer_secret,
		$authorization_code,
		$redirect_uri
	);


	$token = json_decode($json_token, /*連想配列で返す*/TRUE);

	echo "---- token ----<br>";
	var_dump($token);
	echo "<br>";

	$access_token = $token['access_token'];

	echo "<br>";
	echo "---- 自分の情報 ----<br>";

	$self = getProfile($access_token);

	var_dump($self);


	echo "<br>";
	echo "---- フレンド情報 ----<br>";
	$friends = getFriends($access_token);

	ob_start();
	var_dump($friends);
	$dump = ob_get_contents();
	ob_end_clean();
	$fp = fopen("logs/log.txt", "w");
	fwrite($fp, $dump);
	fclose($fp);

	foreach($friends['entry'] as $index => $friend)
	{
		
		echo "[".$index."]=";
		if( isset($friend['displayName']) )	echo "'".$friend['displayName']."'";
		else								echo "noname";
		//echo "<br>";
	}

	var_dump($friends);

	echo "<br>";

/*
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://sub0000498489.hmk-temp.com/test/hello_mixi_new/curl_test.php");
$result = curl_exec($curl);
curl_close($curl);
print_r($result);
*/

?>

</body>

</html>

