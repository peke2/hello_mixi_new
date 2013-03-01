<html>

<body>

<?php
//	mixiからのコールバック受付
echo "<pre>";
echo "---- GETパラメータ ----\n";
print_r($_GET);
echo "---- PUTパラメータ ----\n";
print_r($_POST);
echo "</pre>";


//curl_init("https://api.mixi-platform.com/2/people/@me/@self");
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://sub0000498489.hmk-temp.com/test/hello_mixi_new/curl_test.php");
$result = curl_exec($curl);
curl_close($curl);

var_dump($result);

?>


<script type="text/javascript" src="http://sub0000498489.hmk-temp.com/test/hello_mixi_new/api_test.js"></script>


</body>

</html>

