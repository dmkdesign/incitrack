
	$(document).ready(function()  {
		setAddress();
		initializeMap();
	});
	var lat;
	var lng;
	var totalAddress;
	var map;
	var latlng;
	 
	 var marker;
	function setAddress(){
		lat=document.getElementById("lat").value;
		lng =document.getElementById("lng").value;
		totalAddress = document.getElementById("address").value;
	}
	function initializeMap() {
		 var geocoder;
		 var div;
		 var myOptions;
		 var geocodeOption;
		 geocoder = new google.maps.Geocoder();
		 if(lat == 'error'||lng=='error'||lat=='')
			 {
			 	geocodeOption= {'address': totalAddress};
			 }
		 else{
			 latlng = new google.maps.LatLng(lat,lng);
			 geocodeOption= {'location':latlng};
		 }
		 
		 geocoder.geocode( geocodeOption, function(results, status) {
		    if (status == google.maps.GeocoderStatus.OK) {
		    		if(latlng === undefined)
		    		{
		    			latlng = results[0].geometry.location;
		    			
		    		}
		    		myOptions = {center: latlng,
				    		 	zoom: 20,
//				    		 zoomControl:false,
//				    		 scrollwheel:false,
//		    				doubleclick:false,
//		    				controlbykeyboard:false,
//		    				draggable:false,
//		    				disableDoubleClickZoom:true,
//		    				 mapTypeControl:false,
//		    				 streetViewControl:false,
				    		 scaleControl:true,
		    				 mapTypeId: google.maps.MapTypeId.SATELLITE,
		    				  };
		    				
		        	div = document.getElementById("map_canvas");
			        map = new google.maps.Map(div, myOptions);
			        if (marker === null || marker === undefined) { 
			        	marker = new google.maps.Marker({'title': 'Your Project','position':latlng, 'map':map,draggable:true,});
			        	google.maps.event.addListener(marker, 'dragstart', function() {
			        		$("#map_response").html('Moving project location!');
			        	  });

			            google.maps.event.addListener(marker, 'dragend', function() {
			                updatePos(); //this is defined dynamically because it updates for every project
			            })
			        }
			        else {
			            marker.setPosition(latLng);
			        }     
		      } 
		      else {
		        alert("Geocode was not successful for the following reason: " + status);
		      }
		    });
	        
	      }
	function centerPin()
	{
		marker.setPosition(map.getCenter());
		updatePos();
	}
	function resetLocation()
	{
		 var geocoder = new google.maps.Geocoder();
		geocoder.geocode({'address': totalAddress},function(results, status) {
		    if (status == google.maps.GeocoderStatus.OK) {
	    		latlng = results[0].geometry.location;
	       		marker.setPosition(latlng);
	       		map.setCenter(marker.position);
	       		updatePos();
	      } 
	      else {
	        alert("Geocode was not successful for the following reason: " + status);
	      }
	    });
	}
