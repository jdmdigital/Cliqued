<?php 
/* App Settings */

// == DEMO MODE == 
define("DEMO", true); // change to false 

// == BIT.LY SHORTENING SERVICE ==
define("BITLY", false); // change to TRUE once you've added your bitly username and api key
define("BT_API_USER", "your bitly user name");
define("BT_API_KEY", "your bitly api key");
define("BT_API_URL", "http://api.bitly.com/v3/shorten");

// == GOOG.GL SERVICE == 
define("GOOGL", false); // change to true once you've added your goog.gl api key
define("GO_API_KEY", "your goo.gl api key ");
define("GO_API_URL", "https://www.googleapis.com/urlshortener/v1/url");

// == APP NAME/VERSION ==
define("APPNAME", "Cliqued", true);
define("APPVER", "0.2.1", true);
define("APPREPO", "https://github.com/jdmdigital/Cliqued");

?>
