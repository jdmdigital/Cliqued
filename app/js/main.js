/*
 * Cliqued App
 * v0.2.1
 */
 
// "borrowed" from jquery validation plugin
function isUrlValid(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}

// Replace spaces with underscores
// @since v0.2.1
function strEncode(str) {
	return str.split(' ').join('_');
}

// Takes the data entered and converts it to GA UTC link (long link) 
function buildUTC() {
	var goodBuild = true;
	
	var landingPage 	= $('#website-url').val();
	var campaignSource 	= $('#campaign-source').val();
	var campaignMedium 	= $('#campaign-medium').val();
	var campaignName 	= $('#campaign-name').val();
	var campaignTerm 	= $('#campaign-term').val();
	var campaignContent	= $('#campaign-content').val();
	
	var theurl = '';
	if(landingPage != '') {
		theurl = landingPage + '?';
	} else {
		goodBuild = false;
		$('#website-url').parent().addClass('has-error');
	}
	
	if(campaignSource != '') {
		theurl = theurl + 'utm_source=' + strEncode(campaignSource);
	} else {
		goodBuild = false;
		$('#campaign-source').parent().addClass('has-error');
	}
	
	if(campaignName != '') {
		theurl = theurl + '&utm_campaign=' + strEncode(campaignName);
	}
	
	if(campaignMedium != '') {
		theurl = theurl + '&utm_medium=' + strEncode(campaignMedium);
	}
	
	if(campaignTerm != '') {
		theurl = theurl + '&utm_term=' + strEncode(campaignTerm);
	}
	
	if(campaignContent != '') {
		theurl = theurl + '&utm_content=' + strEncode(campaignContent);
	}
	
	if(goodBuild) {
		$('#campaign-url').val(theurl);
		$('#campaign-url').data('longurl', theurl);
		$('#step3').attr('disabled', false);
		$('#step3 .btn').attr('disabled', false);
	} else {
		// Missed something required...
		$('#step3').attr('disabled', true);
		$('#step3 .btn').attr('disabled', true);
		$('#campaign-url').val('Error - Missing Required Field(s)');
	}
	
}
 
$(function() {
	$('[data-toggle="popover"]').popover({
		placement : 'top'
	});
	
	$('#step1 .next-fieldset').click(function() {
		var sourceURL = $('#website-url').val();
		
		if(sourceURL != '' && isUrlValid(sourceURL)) {
			$('#step1').removeClass('has-error');
			$('#step1').fadeTo(250,0,function() {
				$('#step1').removeClass('current');
				$('#step1 .help-block').text('The full website URL (e.g. http://www.yoursite.com)');
				$('#step2').addClass('current').fadeTo(250,1);
			});
		} else {
			$('#step1').addClass('has-error');
			$('#step1 .help-block').text('Invalid URL. You need to enter the full URL, including http://');
		}
		return false;
	});
	
	$('#step2 .next-fieldset').click(function() {
		if($('#campaign-source').val() != '') {
			$('#step2').removeClass('has-error');
			$('#step2').fadeTo(250,0,function() {
				buildUTC();
				$('#step2').removeClass('current');
				$('#step3').addClass('current').fadeTo(250,1, function() {
					$('p#starter').hide();
					$('p#reload').show();
				});
			});
		} else {
			$('#step2').addClass('has-error');
		}
		return false;
	});
	
	$('#startover').click(function(evt) {
		evt.preventDefault();
		$('#step3').fadeTo(250,0,function() {
			$('#clicked')[0].reset();
			$('.form-group').removeClass('has-error');
			$('#step3').removeClass('current');
			$('#step1').addClass('current').fadeTo(250,1, function() {
				$('p#reload').hide();
				$('p#starter').show();
			});
		});
	});
	
	$('#more-options').click(function() {
		$('#campaign-options').slideToggle(500, function() {
			if($('#campaign-options').is(':visible')) {
				$('#more-options').html('less options <span class="glyphicon glyphicon-chevron-up"></span>');
			} else {
				$('#more-options').html('more options <span class="glyphicon glyphicon-chevron-down"></span>');
			}
		});
		return false;
	});
	
	$('#get-shortlink').click(function() {
		if($(this).hasClass('shortlink-ready') ) {
			// To reverse this to the long url
			$(this).addClass('loading').html('<span class="glyphicon glyphicon-hourglass"></span> Growing...');
			var longurl = $('#campaign-url').data('longurl');
			setTimeout(function() {
				$('#get-shortlink').removeClass('loading').html('<span class="glyphicon glyphicon-link"></span> Get Shortlink');
				$('#get-shortlink').removeClass('shortlink-ready');
				$('#campaign-url').prop('readonly', false).val(longurl).prop('readonly', true);
			}, 1800);
		
		} else {
			// let's shorten this...
			$('#get-shortlink').addClass('loading shortlink-ready').html('<span class="glyphicon glyphicon-hourglass"></span> Shortening...');
			
			var shortUrl = $('#campaign-url').data('shorturl');
			var longUrl = $('#campaign-url').data('longurl');
			
			if(shortUrl == '') {
				// Let's go get the bitly!
				$.ajax({
					url : "shrinkit.php",
					dataType : "json",
					type : "POST",
					data : {
						url : longUrl
					},
					success : function(data) {
						if(data.status_txt === "OK"){
							result = data.data.url;
							$('#campaign-url').data('shorturl', result); // save the bitly in data-shorturl=""
							$('#campaign-url').prop('readonly', true).val(result); // make it the value of the input
							$('#get-shortlink').removeClass('loading').html('<span class="glyphicon glyphicon-refresh"></span> Show Long URL'); // cta for inverse
						}
					},
					error : function(xhr, error, message) {
						//no success, fallback to the long url
						result = longUrl
						$('#campaign-url').data('shorturl', ''); // clear the data-shorturl=""
						$('#campaign-url').parent().addClass('has-error'); // crap
						$('#get-shortlink').removeClass('loading').html('<span class="glyphicon glyphicon-link"></span> Get Shortlink'); // maybe try again?
						console.log(error);
						$('#step3 .form-group').append('<p class="help-block">Error: ' + message + '</p>');
					}
				});
				
			} else {
				// done this already; use the data already saved (with fake load)
				setTimeout(function() {
					$('#campaign-url').prop('readonly', true).val(shortUrl);
					$('#get-shortlink').removeClass('loading').html('<span class="glyphicon glyphicon-refresh"></span> Show Long URL');
				}, 1200);
			}
		
		}
	});
	
	// Clipboard.js
	var clipboard = new Clipboard('.btn');
	
	clipboard.on('success', function(e) {
		$('#copy-url').html('<span class="glyphicon glyphicon-ok"></span> Copied!');
		console.log(e);
		e.clearSelection();
		setTimeout(function() {
			$('#copy-url').html('<span class="glyphicon glyphicon-copy"></span> Copy URL');
		}, 5000);
	});
	
	clipboard.on('error', function(e) {
		$('#copy-url').html('<span class="glyphicon glyphicon-copy"></span> Press Ctrl + C');
		console.log(e);
	});
	
	
});

$(window).resize( function () {
	setTimeout(function() {
		//formWidth();
	}, 1000);
});
	