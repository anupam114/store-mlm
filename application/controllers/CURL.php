
<?php
function curlCall($url, $method, $data)
{
	if ($method == 'GET') {
		/* API URL */
		// $url = 'http://www.mysite.com/api';

		/* Init cURL resource */
		$ch = curl_init($url);

		/* Array Parameter Data */
		// $data = ['name' => 'Hardik', 'email' => 'itsolutionstuff@gmail.com'];

		/* pass encoded JSON string to the POST fields */
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		/* set the content type json */
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		/* set return type json */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		/* execute request */
		$result = curl_exec($ch);

		/* close cURL resource */
		curl_close($ch);
	}

	if ($method == 'POST') {
		/* API URL */
		// $url = 'http://www.mysite.com/api';

		/* Init cURL resource */
		$ch = curl_init($url);

		/* Array Parameter Data */
		// $data = ['name' => 'Hardik', 'email' => 'itsolutionstuff@gmail.com'];

		/* pass encoded JSON string to the POST fields */
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		/* set the content type json */
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		/* set return type json */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		/* execute request */
		$result = curl_exec($ch);

		/* close cURL resource */
		curl_close($ch);
	}

	return $result;
}
