<?php

//
//	GraphAPI アクセス用トークンを取得
//
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


//
//	自身のプロフィールを取得
//
function	getProfile($access_token)
{
	$curl = curl_init("https://api.mixi-platform.com/2/people/@me/@self?access_token=".$access_token);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	$json_self = curl_exec($curl);
	curl_close($curl);
	$self = json_decode($json_self, TRUE);

	return	$self;
}


//
//	フレンド情報を取得
//
function	getFriends($access_token)
{
	$curl = curl_init("https://api.mixi-platform.com/2/people/@me/@friends?fileds=@all&access_token=".$access_token);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	$json_friends = curl_exec($curl);
	curl_close($curl);
	$friends = json_decode($json_friends, TRUE);

	return	$friends;
}

?>