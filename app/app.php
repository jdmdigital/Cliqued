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

function get_shortening_service() {
	if(DEMO) {
		return 'demo';
	} elseif (BITLY) {
		return 'bitly';
	} elseif (GOOGL) {
		return 'googl';
	} else {
		return 'demo';
	}
}

// echo get_api(key, user, url); 
function get_api($value) {
	// Get Service-specific info
	$service = get_shortening_service();
	if($service != 'demo') {
		
		if($service == 'bitly') {
			$url  = BT_API_URL;
			$user = BT_API_USER;
			$key  = BT_API_KEY;
		} elseif ($service == 'googl') {
			$url  = GO_API_URL;
			$user = '';
			$key  = GO_API_KEY;
		} else {
			$url  = '';
			$user = '';
			$key  = '';
		}
		
	} else {
		return BT_API_URL;
	}
	
	// Return data
	if($service == 'bitly') {
		if(strpos(' ', $key) || strpos(' ', $user)) {
			return 'Error in settings.php';
		} else {
			// Constants don't have spaces, let's do this
			if($value == 'key') {
				return $key;
			} elseif($value == 'user') {
				return $user;
			} else {
				return $url;
			}
		}
	} elseif ($service == 'googl') {
		if(strpos(' ', $key)) {
			return 'Error in settings.php';
		} else {
			// Constants don't have spaces, let's do this
			if($value == 'key') {
				return $key;
			} elseif($value == 'user') {
				return '';
			} else {
				return $url;
			}
		}
	} else {
		return '';
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
