# Cliqued
A simple web app for easily creating Bitly shortened URLs that include parameters tracked in Google Analytics Custom Campaigns. Live demo at: https://jdmdig.it/cliqued

![Cliqued screenshot](https://jdmdigital.co/cliqued/cliqued-screenshot.png)

Cliqued is a simple (looking) web app for easily creating [Bitly](https://bitly.com/) URLs that include parameters tracked in Google Analytics [Custom Campaigns](https://support.google.com/analytics/answer/1033863).  We're looking to add other shortening services too, like goo.gl. 

## Demo
There is a demo avaliable for you to check out.  See: https://jdmdig.it/cliqued. 

**NOTE:** The demo is in "demo mode" so the short URL it generates is always the same and redirects right back to the demo itself.  See the section below for how to disable demo mode.

## Getting Started
Once you've downloaded the ZIP of this repo, navigate to the file in `app/settings.php` to get started.

You'll want to descide on which URL shortening service you want to use.  As of version 0.2, you can only choose "demo" or "bitly."  Others will be coming, but you'll want to use Bitly.  In "demo mode" the app always returns the same shortened URL which directs you back to the web app demo.

### Get the Keys
First off, you'll need to get your Bitly API Login and Key to use Bitly as your URL shortening service.

1. Create a Bitly account (if you haven't already)
2. Login to Bitly
3. Click the Hamburger **Menu**
4. Click **Settings**, then **Advanced Settings**, then **API Support**
5. There, you can create or get your API **Login** and API **Key**

### Edit the Settings
Next up, we'll want to make changes and updates to the web app settings file.  You guessed it, these are made in the file, `app/settings.php`.

1. Open `settings.php` in your favorite editor.
2. Change `define("DEMO", **true**);` to `define("DEMO", **false**);`
3. Change `define("BITLY", **false**);` to `define("BITLY", **true**);`
4. Paste your Bitly API login into `define("API_USER", "**your bitly user name**");` (the bold part)
5. Paste your Bitly API key into `define("API_KEY", "**your bitly api key**");` (the bold part)
6. Leave the thing about `API_URL` alone.

Navigate to the web app and give it a go.

### Other Settings
You can also change the name of the app, the version, and the GitHub repo/branch in `settings.php`, if you're into that sort of thing.
