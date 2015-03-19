var Map = {};
Map.width = 0;
Map.height = 0;
Map.gmap; // Google map object (global variable)

Map.init = function() {
	// Leicester Square tube station address
	Map.station1 = new google.maps.LatLng(51.51139, -0.1284);

	// Charing Cross tube station address
	Map.station2 = new google.maps.LatLng(51.50741,-0.12725);
	
	// Embakment tube station address
	Map.station3 = new google.maps.LatLng(51.5070797,-0.1225829);

	Map.load(); 

	$("#station1").click(function() {
		Map.calcRouteToUnderground(Map.station1);
		Site.scrollTo({position:0});
		return false;
	});
	
	$("#station2").click(function() {
		Map.calcRouteToUnderground(Map.station2);
		Site.scrollTo({position:0});
		return false;
	});
	
	$("#station3").click(function() {
		Map.calcRouteToUnderground(Map.station3);
		Site.scrollTo({position:0});
		return false;
	});
}

Map.resize = function() {
	Map.width = Math.round($(window).width());
	Map.height = Math.round($(window).height());
	var siteHeight = Map.height * 0.7;
	$('#map').height(siteHeight);
	if (Map.gmap && Map.latlng) {
		Map.gmap.setCenter(Map.latlng);
	}
}

Map.createHomeControl = function(controlDiv, map) {
	  // Set CSS styles for the DIV containing the control
	  // Setting padding to 5 px will offset the control
	  // from the edge of the map
	  controlDiv.style.padding = '5px';

	  // Set CSS for the control border
	  var controlUI = document.createElement('div');
	  controlUI.style.backgroundColor = 'white';
	  controlUI.style.borderColor = '#CACED7';
	  controlUI.style.borderStyle = 'solid';
	  controlUI.style.borderWidth = '1px';
	  controlUI.style.cursor = 'pointer';
	  controlUI.style.textAlign = 'center';
	  controlUI.title = 'Click to set the map to ANDigital';
	  controlDiv.appendChild(controlUI);

	  // Set CSS for the control interior
	  var controlText = document.createElement('div');
	  controlText.style.fontFamily = 'Arial,sans-serif';
	  controlText.style.fontSize = '12px';
	  controlText.style.paddingLeft = '2px';
	  controlText.style.paddingRight = '2px';
	  controlText.style.paddingTop = '2px';
	  controlText.style.paddingBottom = '2px';
	  controlText.innerHTML = '<img width="32px" height="32px" src="' + Site.dir + '/img/contact-us/compass.png">';
	  controlUI.appendChild(controlText);

	  google.maps.event.addDomListener(controlUI, 'click', function() {
		  map.setCenter(Map.latlng);
		  Map.directionsDisplay.setMap(null);
		  Map.directionsDisplay = new google.maps.DirectionsRenderer();
		  Map.directionsDisplay.setMap(map);
	  });
}

Map.addOffset = function(map, latlng, offsetX, offsetY) {
    var proj = map.getProjection();
    var aPoint = proj.fromLatLngToPoint(latlng);
    aPoint.x = aPoint.x + offsetX / Math.pow(2, map.getZoom());
    aPoint.y = aPoint.y + offsetY / Math.pow(2, map.getZoom());
    return proj.fromPointToLatLng(aPoint);
}

Map.calcRouteToUnderground = function(dest) {
	  var request = {
		origin : dest,
		destination : Map.latlng,
		travelMode : google.maps.TravelMode.WALKING
	};
	Map.directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			Map.directionsDisplay.setDirections(response);
		}
	});
}

// Show the location (address) on the map.
function showLocation(map, latlng, title, text, addr_type) {
	// Set the zoom level according to the address level of detail
	var zoom = 12;
	switch (addr_type)
	{
	case "administrative_area_level_1"	: zoom = 6; break;		// address is a state
	case "locality"						: zoom = 10; break;		// address is a city/town
	case "street_address"				: zoom = 18; break;		// address is a street address
	}
	map.setZoom(zoom);

	// Offset depends on the zoom factor!!!
	var markerLatLng = Map.addOffset(map, latlng, 0, 0);

	// Center the map at the specified location
	map.setCenter(markerLatLng);
	
	Map.latlng = markerLatLng;
	
	// Place a Google Marker at the same location as the map center 
	// When you hover over the marker, it will display the title
	var marker = new google.maps.Marker({ 
		position: markerLatLng,     
		map: map,      
		title: title,
		icon : Site.dir + '/img/contact-us/marker.png'
		//animation: google.maps.Animation.BOUNCE	// set marker to bounce
	});
	
	// Create an InfoWindow for the marker
	var infowindow = new google.maps.InfoWindow({ content: "" + text + "" });
	
	// Set event to display the InfoWindow anchored to the marker when the marker is clicked.
	google.maps.event.addListener( marker, 'click', function() { infowindow.open( map, marker ); });
}

// Initialize and display a google map
Map.load = function() {
	// Create a Google coordinate object for where to center the map
	var latlng = new google.maps.LatLng( 51.5286416,-0.1015987 );	// Coordinates of London (area centroid)
	
	// Map options for how to display the Google map
	var mapOptions = { 
		zoom: 14, 
		center: latlng,
		scrollwheel: false,
		navigationControl: false,
	    mapTypeControl: false,
	    scaleControl: false,
	    draggable: true,
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    panControl: true,
	    panControlOptions: {
	        position: google.maps.ControlPosition.RIGHT_CENTER
	    },
	    zoomControl: true,
	    zoomControlOptions: {
	        style: google.maps.ZoomControlStyle.LARGE,
	        position: google.maps.ControlPosition.RIGHT_CENTER
	    },
	    streetViewControl: true,
	    streetViewControlOptions: {
	        position: google.maps.ControlPosition.LEFT_CENTER
	    }
	};
	
	Map.directionsDisplay = new google.maps.DirectionsRenderer();
	
	Map.directionsService = new google.maps.DirectionsService();
	
	// Show the Google map in the div with the attribute id 'map-canvas'.
	Map.gmap = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	Map.directionsDisplay.setMap(Map.gmap);
	
	var controlDiv = document.createElement('div');
	var homeControl = Map.createHomeControl(controlDiv, Map.gmap);
	controlDiv.index = 1;
	Map.gmap.controls[google.maps.ControlPosition.TOP_LEFT].push(controlDiv);

	// Instantiate a geocoder object
	var geocoder = new google.maps.Geocoder();    
	
	// ANDigital address
	var address = "8 Duncannon Street, London, WC2N 4JF, United Kingdom";
	
	// Make asynchronous call to Google geocoding API
	geocoder.geocode({ 'address': address }, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK)
			showLocation(Map.gmap, results[0].geometry.location, "ANDigital Ltd", "<b>ANDigital Ltd</b><br/>" + address, results[0].types[0]);
	});
}

//----------------------------------------------------------------------------------------------------
//start
//----------------------------------------------------------------------------------------------------
$ = jQuery;
$(function(){
	Map.init(); 
	//resize
	$(window).resize(function(){
		Map.resize();
	});
	Map.resize();
});
