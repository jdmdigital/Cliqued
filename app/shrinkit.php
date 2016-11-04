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
	
	default: 
		// Use fake shortening
		echo '{ "status_code": 200, "status_txt": "OK", "data": { "long_url": "http:\/\/jdmdigital.co\/cliqued\/app\/?utm_source=demo", "url": "https:\/\/jdmdig.it\/2fj2hUG", "hash": "2fj2hUG", "global_hash": "2fj7USM", "new_hash": 0 } } ';
	break;
} // end switch $service
?>