<?php 
/* App.php */
require_once('settings.php');

function appName() {
	echo APPNAME;
}
function appVersion() {
	echo APPVER;
}
function appRepo() {
	echo APPREPO;
}

// echo get_api(key, user, url); 
function get_api($value) {
	if(strpos(' ', API_KEY) && strpos(' ', API_USER)) {
		return 'Error in settings.php';
	} else {
		// Constants don't have spaces, let's do this
		if($value == 'key') {
			return API_KEY;
		} elseif($value == 'user') {
			return API_USER;
		} else {
			return API_URL;
		}
	}
}

function get_shortening_service() {
	if(DEMO) {
		return 'demo';
	} elseif (BITLY) {
		return 'bitly';
	} else {
		return 'demo';
	}
}

function is_demo() {
	if (get_shortening_service() == 'demo') {
		return true;
	} else {
		return false;
	}
}

?>
