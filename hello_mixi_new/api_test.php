<?php

function	getToken($url, $consumer_key, $consumer_secret, $authorization_code, $redirect_uri)
{
	$fields = array(
		'grant_type'    => 'authorization_code',
		'client_id'     => $consumer_key,
		'client_secret' => $consumer_secret,
		'code'          => $authorization_code,
		'redirect_uri'  => $redirect_uri,
	);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, TRUE);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
	$result = curl_exec($curl);
	curl_close($curl);

	return	$result;
}

?>