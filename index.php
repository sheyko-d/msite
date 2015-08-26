<!DOCTYPE html>
<html>

<head>
	<title>Best</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<header role="banner">
		<div>
			<h1 class="logo"><a href="#">LOGO</a></h1>
		</div>
	</header>
	
	<div role="main">
	
		<section class="search-section">
			<form action="/search_lists.php" method="post">
				<fieldset>
					<legend>Search</legend>
					<header>
						<h2 class="search-title">The best</h2>				
					</header>			
					<div>
						<input name="name" id="input-name" class="search-field" type="text" placeholder="chicken wings" />
					</div>

					<header>
						<h2 class="search-title">In</h2>
					</header>
					<div>
						<input name="location" id="input-location" class="search-field" type="text" placeholder="Notting Hill, London" onFocus="geolocate()" />
					</div>
					<div class="submit-form">
						<input id="search-bottom" type="submit" value="Go" />
					</div>
				</fieldset>
			</form>
		<section>
		
		<section id="results-section"/>
		
	</div>
	
	<script>
var frm = $('form');
frm.submit(function (ev) {
	ev.preventDefault();
	$.ajax({
		type: frm.attr('method'),
		url: frm.attr('action'),
		data: frm.serializeArray(),
		dataType: "html",
		success: function (data) {
			$('#search-bottom').hide();
			$('#results-section').html(data);
		},
		error: function (data) {
			// TODO: Replace alert
			alert('Can\'t search for lists');
		}
	});
});
	
var placeSearch, autocomplete;

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
	  (document.getElementById('input-location')),
	  {types: ['geocode']});
}

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position) {
	  var geolocation = {
		lat: position.coords.latitude,
		lng: position.coords.longitude
	  };
	  var circle = new google.maps.Circle({
		center: geolocation,
		radius: position.coords.accuracy
	  });
	  autocomplete.setBounds(circle.getBounds());
	});
  }
}
// [END region_geolocation]
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initAutocomplete"
		async defer></script>
	
</body>

</html>