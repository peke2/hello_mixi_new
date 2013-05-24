<?php

require_once('oauth/OAuth.php');

class	OAuthTest extends OAuthSignatureMethod_RSA_SHA1
{

	function	__construct()
	{
		
	}

	function	certifiesSginature($request_param)
	{
		unset($request_param['url']);

		$request_obj = OAuthRequest::from_request(null/*$http_method*/, null/*$http_url*/, $request_param);

		$is_signature_valid = $this->check_signature($request_obj, null/*$consumer*/, null/*$token*/, $request_param["oauth_signature"]);

		return	$is_signature_valid;
	}


	protected function fetch_public_cert(&$request) {
return <<<EOD
-----BEGIN CERTIFICATE-----
MIIDfDCCAmSgAwIBAgIJAI2n8UOEH7KvMA0GCSqGSIb3DQEBBQUAMDIxCzAJBgNV
BAYTAkpQMREwDwYDVQQKEwhtaXhpIEluYzEQMA4GA1UEAxMHbWl4aS5qcDAeFw0x
MjAxMjAwMzI4MDVaFw0xNDAxMTkwMzI4MDVaMDIxCzAJBgNVBAYTAkpQMREwDwYD
VQQKEwhtaXhpIEluYzEQMA4GA1UEAxMHbWl4aS5qcDCCASIwDQYJKoZIhvcNAQEB
BQADggEPADCCAQoCggEBAMZLyyXIS+3ReOuBrh5Vztt0aJwDPSgKw/Pi29B/3ODQ
3oN+tOYGVGIN1l+V40h3QmII94OpnjoB6CbnoVdE+WIDkPx6MMzPfiWF8pbbkBad
7WBe0T51l+EOFvRlZ0ZfHmldHGZl7GkDmXLu6jk4vcQyHFB/VS5hWpqDNw4i9vSO
7mHspbS2cudoagJvxqwoT+ciqy1S+Nuk2Eqll7C7wL+mnTrjtC25y4zYKfWS6MpM
rt3UlDuK75+dtknYKTNtLMVsshi/A4KMHQip0V6N4EKG+zIRExFoyPvHjTpQjJNk
q7JF7sshPV9MIPYRwy9WJt88P80aznFR6kgp63/C0r0CAwEAAaOBlDCBkTAdBgNV
HQ4EFgQUoiRidW+vFnj49TfzYLSKsDqI5QMwYgYDVR0jBFswWYAUoiRidW+vFnj4
9TfzYLSKsDqI5QOhNqQ0MDIxCzAJBgNVBAYTAkpQMREwDwYDVQQKEwhtaXhpIElu
YzEQMA4GA1UEAxMHbWl4aS5qcIIJAI2n8UOEH7KvMAwGA1UdEwQFMAMBAf8wDQYJ
KoZIhvcNAQEFBQADggEBAJRIEbo8i44KWms5Svj0NmvweumgMbANC1k5Yf93w6wk
Zbw+fJM+uxcxu6Z+k631+AGlahqxM/y4wXfsKfykwW6L3k4BWy/4w4owdj+5VOC7
32G8BkhdVEP3u5cq+ySp0K1EU2AaQ6lgqaQ4T1cHZjhBrBSGiUYbwKqboqbrz7ne
lvycCgLbvSCa4tewEkRIwhWbc+t9FNoJTdkJIN2mdqqq5yxQMIRyKM1025fEwhw8
pX6fDv4N+LlyA2qbk+YovEQGll0fkqughEHw+K5FSdQjJ/GFnuRslOi/qCvVBc3F
VPdLqcLz5IY3iYNonlca4VQzKp3TUjSluZIXvx7Hnhc=
-----END CERTIFICATE-----
EOD;
	}
}

?>
