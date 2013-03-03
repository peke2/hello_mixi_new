<html>

<body>

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

	echo "<pre>";
	echo "---- token ----\n";
	print_r($json_token);
	echo "</pre>";


	$token = json_decode($json_token, /*連想配列で返す*/TRUE);

	$access_token = $token['access_token'];
	$curl = curl_init("https://api.mixi-platform.com/2/people/@me/@friends?access_token=".$access_token);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	$json_friends = curl_exec($curl);
	curl_close($curl);
	echo "<br>";
	echo "---- フレンド情報 ----<br>";

	$friends = json_decode($json_friends, TRUE);

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


<script type="text/javascript" src="http://sub0000498489.hmk-temp.com/test/hello_mixi_new/api_test.js"></script>


</body>

</html>

