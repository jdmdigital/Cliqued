<?php
// For getting the bitly URL
require_once('app.php');

$service = get_shortening_service();

switch ($service) { 
	// Use Bit.ly shortening service
	case 'bitly':
		// the long url posted by your webpage
		$url = $_POST["url"];
		
		$api_user = get_api('user');
		$api_key = get_api('key');
		$api_url = get_api('url');
		
		if(strpos($api_key, ' ') === false ) {
		
			//send it to the bitly shorten webservice
			$ch = curl_init ($api_url."?login=".$api_user."&apiKey=".$api_key."&longUrl=".$url."&format=json");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			//the response is a JSON object, send it to your webpage
			echo curl_exec($ch); 
		} else {
			// No API set, return a bit.ly pointing to the demo as fake json
			echo '{ "status_code": 200, "status_txt": "OK", "data": { "long_url": "http:\/\/jdmdigital.co\/cliqued\/app\/?utm_source=demo", "url": "https:\/\/jdmdig.it\/2fj2hUG", "hash": "2fj2hUG", "global_hash": "2fj7USM", "new_hash": 0 } } ';
		}

	break;
	
	// Use Goo.gl shortening service
	case 'googl':
		$url = $_POST["url"];
		//$url = $_GET["url"];
		
		if(strpos($api_key, ' ') === false ) {
		
			$postData = array('longUrl' => $url, 'key' => get_api('key'));
    		$jsonData = json_encode($postData);
			
			//construct and send it to the shortening webservice
			$curlObj = curl_init();
			curl_setopt($curlObj, CURLOPT_URL, get_api('url'));
    		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
    		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0); //As the API is on https, set the value for CURLOPT_SSL_VERIFYPEER to false. This will stop cURL from verifying the SSL certificate.
			curl_setopt($curlObj, CURLOPT_HEADER, 0);
			curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
			curl_setopt($curlObj, CURLOPT_POST, 1);
			curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
			
			//the response is a JSON object, send it to your webpage
			$response = curl_exec($curlObj);
			$json = json_decode($response);
			curl_close($curlObj);
			if($json->status == 'OK') {
				$statusCode = '200';
			} else {
				$statusCode = '500';
			}
		    //echo $json->id;
			//echo $response;
			echo '{ "status_code": '.$statusCode.', "status_txt": "'.$json->status.'", "data": { "long_url": "'.$json->longUrl.'", "url": "'.$json->id.'", "hash": "", "global_hash": "", "new_hash": 0 } } ';
			
		} else {
			// No API set, return a bit.ly pointing to the demo as fake json
			echo '{ "status_code": 200, "status_txt": "OK", "data": { "long_url": "https:\/\/jdmdigital.co\/cliqued\/app\/?utm_source=demo", "url": "https:\/\/goo.gl\/0sKJH9", "hash": "0sKJH9", "global_hash": "0sKJH9", "new_hash": 0 } } ';
		}

	break;
	
	default: 
		// Use fake shortening
		echo '{ "status_code": 200, "status_txt": "OK", "data": { "long_url": "http:\/\/jdmdigital.co\/cliqued\/app\/?utm_source=demo", "url": "https:\/\/jdmdig.it\/2fj2hUG", "hash": "2fj2hUG", "global_hash": "2fj7USM", "new_hash": 0 } } ';
	break;
} // end switch $service
?>