# Cliqued
A simple web app for easily creating Bitly shortened URLs that include parameters tracked in Google Analytics Custom Campaigns.

Cliqued is a simple (looking) web app for easily creating <a href="https://bitly.com/" target="_blank">Bitly</a> URLs that include parameters tracked in Google Analytics <a href="https://support.google.com/analytics/answer/1033863" target="_blank">Custom Campaigns</a>.  We're looking to add other shortening services too, like goo.gl.

## Getting Started
Once you've downloaded the ZIP of this repo, navigate to the file in `app/settings.php` to get started.

You'll want to descide on which URL shortening service you want to use.  As of version 0.2, you can only choose "demo" or "bitly."  Others will be coming, but you'll want to use Bitly.  In "demo mode" the app always returns the same shortened URL which directs you back to the web app demo.

### Get the Keys
First off, you'll need to get your Bitly API Login and Key to use Bitly as your URL shortening service.
1. Create a Bitly account (if you haven't already)
2. Login to Bitly
3. Click the Hamburger <b>Menu</b>
4. Click <b>Settings</b>, then <b>Advanced Settings</b>, then <b>API Support</b>
5. There, you can create or get your API <b>Login</b> and API <b>Key</b>

### Edit the Settings
Next up, we'll want to make changes and updates to the web app settings file.  You guessed it, these are made in the file, `app/settings.php`.
<ol>
<li>Open <code>settings.php</code> in your favorite editor.</li>
<li>Change <code>define("DEMO", <b>true</b>);</code> to <code>define("DEMO", <b>false</b>);</code></li>
<li>Change <code>define("BITLY", <b>false</b>);</code> to <code>define("BITLY", <b>true</b>);</code></li>
<li>Paste your Bitly API login into <code>define("API_USER", "<b>your bitly user name</b>");</code> (the bold part)</li>
<li>Paste your Bitly API key into <code>define("API_KEY", "<b>your bitly api key</b>");</code> (the bold part)</li>
<li>Leave the thing about <code>API_URL</code> alone.</li>
</ol>

Navigate to the web app and give it a go.

### Other Settings
You can also change the name of the app, the version, and the GitHub repo/branch in `settings.php`, if you're into that sort of thing.
