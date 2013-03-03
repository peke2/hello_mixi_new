

function	getFriendList()
{
	var request = new XMLHttpRequest();
	request.open('GET', 'https://api.mixi-platform.com/2/people/@me/@friends', false);
	request.send();		// because of "false" above, will block until the request is done
						// and status is available. Not recommended, however it works for simple cases.
	if( request.status === 200 )
	{
		console.log(request.responseText);
	}
}

//getFriendList();

