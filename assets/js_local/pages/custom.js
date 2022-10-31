let pos;
let map;
let maps;
let bounds;
let infoWindow;
let currentInfoWindow;
let service;
let infoPane;
let close;
let mks = [];
var dm = location.hostname;
let lokasis = [];
// function reply_click(clicked_id)
//   {
//     if(clicked_id != 0){
//       const localContextMapView = new google.maps.localContext.LocalContextMapView(
//         {
//           element: document.getElementById("map-warp"),
//           placeTypePreferences: [
//             { type: clicked_id },
//           ],
//           maxPlaceCount: 16,
//           placeChooserViewSetup: ({defaultLayoutMode}) => {
//               if (defaultLayoutMode === 'SHEET') {
//               return {position: 'INLINE_START'};
//               }
//           },
//           placeDetailsViewSetup: ({defaultLayoutMode}) => {
//               if (defaultLayoutMode === 'SHEET') {
//               return {position: 'INLINE_START'};
//               }
//           },
//         }
//       );
//       maps = localContextMapView.map;
//       maps.setOptions({
//         center: { lat: -7.559669364640486, lng: 110.81963842699129 },
//         zoom: 14,
//       });
//       maps.addListener('click', () => {
//         localContextMapView.hidePlaceDetailsView();
//       });

//     }else{
//       swal("Opps, Sorry", "Website Under Construction", "info");
//     }

//     // console.log(clicked_id);
// }

function get_api(fc='') {
  return new Promise((resolve, reject) => {
	$.ajax({
	  type: "GET",
	  dataType : 'json',
	  headers: {"token": "5b3dac76aaee24d14185cbc3d010fd20"},
	  url: "http://"+dm+"/sm-bi/Api/" + fc,
	  success: function (r) {
		let data = r.data
		// data.forEach(v => {
		// 	rst = {
		// 		'jalan' : v.jalan,
		// 		'lat' : v.lat,
		// 		'lng' : v.lng,
		// 		'jenis' : v.jenis,
		// 		'status' : v.status,
		// 	}
		// });
		resolve(data)
	  },
	});
  });
}

function reply_click(clicked_id) {
	if (clicked_id != 0) {
		const localContextMapView =
			new google.maps.localContext.LocalContextMapView({
				element: document.getElementById("map-warp"),
				placeTypePreferences: [{ type: clicked_id }],
				maxPlaceCount: 5,
				// placeChooserViewSetup: ({defaultLayoutMode}) => {
				//     if (defaultLayoutMode === 'SHEET') {
				//     return {position: 'INLINE_START'};
				//     }
				// },
				// placeDetailsViewSetup: ({defaultLayoutMode}) => {
				//     if (defaultLayoutMode === 'SHEET') {
				//     return {position: 'INLINE_START'};
				//     }
				// },
			});
		maps = localContextMapView.map;
		maps.setOptions({
			center: { lat: -7.559669364640486, lng: 110.81963842699129 },
			zoom: 20,
		});
		maps.addListener("click", () => {
			localContextMapView.hidePlaceDetailsView();
		});
	} else {
		swal("Opps, Sorry", "Website Under Construction", "info");
	}

	// console.log(clicked_id);
}

function cari(v) {
	getNearbyPlaces(pos, v);
}

var stylers = [
	{
	  "elementType": "geometry",
	  "stylers": [
		{
		  "color": "#1d2c4d"
		}
	  ]
	},
	{
	  "elementType": "labels.text.fill",
	  "stylers": [
		{
		  "color": "#8ec3b9"
		}
	  ]
	},
	{
	  "elementType": "labels.text.stroke",
	  "stylers": [
		{
		  "color": "#1a3646"
		}
	  ]
	},
	{
	  "featureType": "administrative.country",
	  "elementType": "geometry.stroke",
	  "stylers": [
		{
		  "color": "#4b6878"
		}
	  ]
	},
	{
	  "featureType": "administrative.land_parcel",
	  "elementType": "labels.text.fill",
	  "stylers": [
		{
		  "color": "#64779e"
		}
	  ]
	},
	{
	  "featureType": "administrative.province",
	  "elementType": "geometry.stroke",
	  "stylers": [
		{
		  "color": "#4b6878"
		}
	  ]
	},
	{
	  "featureType": "landscape.man_made",
	  "elementType": "geometry.stroke",
	  "stylers": [
		{
		  "color": "#334e87"
		}
	  ]
	},
	{
	  "featureType": "landscape.natural",
	  "elementType": "geometry",
	  "stylers": [
		{
		  "color": "#023e58"
		}
	  ]
	},
	{
	  "featureType": "poi",
	  "elementType": "geometry",
	  "stylers": [
		{
		  "color": "#283d6a"
		}
	  ]
	},
	{
	  "featureType": "poi",
	  "elementType": "labels.text.fill",
	  "stylers": [
		{
		  "color": "#6f9ba5"
		}
	  ]
	},
	{
	  "featureType": "poi",
	  "elementType": "labels.text.stroke",
	  "stylers": [
		{
		  "color": "#1d2c4d"
		}
	  ]
	},
	{
	  "featureType": "poi.park",
	  "elementType": "geometry.fill",
	  "stylers": [
		{
		  "color": "#023e58"
		}
	  ]
	},
	{
	  "featureType": "poi.park",
	  "elementType": "labels.text.fill",
	  "stylers": [
		{
		  "color": "#3C7680"
		}
	  ]
	},
	{
	  "featureType": "road",
	  "elementType": "geometry",
	  "stylers": [
		{
		  "color": "#304a7d"
		}
	  ]
	},
	{
	  "featureType": "road",
	  "elementType": "labels.text.fill",
	  "stylers": [
		{
		  "color": "#98a5be"
		}
	  ]
	},
	{
	  "featureType": "road",
	  "elementType": "labels.text.stroke",
	  "stylers": [
		{
		  "color": "#1d2c4d"
		}
	  ]
	},
	{
	  "featureType": "road.highway",
	  "elementType": "geometry",
	  "stylers": [
		{
		  "color": "#2c6675"
		}
	  ]
	},
	{
	  "featureType": "road.highway",
	  "elementType": "geometry.stroke",
	  "stylers": [
		{
		  "color": "#255763"
		}
	  ]
	},
	{
	  "featureType": "road.highway",
	  "elementType": "labels.text.fill",
	  "stylers": [
		{
		  "color": "#b0d5ce"
		}
	  ]
	},
	{
	  "featureType": "road.highway",
	  "elementType": "labels.text.stroke",
	  "stylers": [
		{
		  "color": "#023e58"
		}
	  ]
	},
	{
	  "featureType": "transit",
	  "elementType": "labels.text.fill",
	  "stylers": [
		{
		  "color": "#98a5be"
		}
	  ]
	},
	{
	  "featureType": "transit",
	  "elementType": "labels.text.stroke",
	  "stylers": [
		{
		  "color": "#1d2c4d"
		}
	  ]
	},
	{
	  "featureType": "transit.line",
	  "elementType": "geometry.fill",
	  "stylers": [
		{
		  "color": "#283d6a"
		}
	  ]
	},
	{
	  "featureType": "transit.station",
	  "elementType": "geometry",
	  "stylers": [
		{
		  "color": "#3a4762"
		}
	  ]
	},
	{
	  "featureType": "water",
	  "elementType": "geometry",
	  "stylers": [
		{
		  "color": "#0e1626"
		}
	  ]
	},
	{
	  "featureType": "water",
	  "elementType": "labels.text.fill",
	  "stylers": [
		{
		  "color": "#4e6d70"
		}
	  ]
	}
  ];

function initMap() {
	// Initialize variables
	bounds = new google.maps.LatLngBounds();
	infoWindow = new google.maps.InfoWindow();
	currentInfoWindow = infoWindow;
	/* TODO: Step 4A3: Add a generic sidebar */
	infoPane = document.getElementById("panel");

	// Try HTML5 geolocation
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			(position) => {
				pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude,
				};
				map = new google.maps.Map(document.getElementById("map-warp"), {
					center: pos,
					zoom: 15,
					disableDefaultUI: true,
					styles: stylers
				});
				bounds.extend(pos);

				infoWindow.setPosition(pos);
				infoWindow.setContent("Your Location found.");
				infoWindow.open(map);
				map.setCenter(pos);

				// Call Places Nearby Search on user's location
				getNearbyPlaces(pos);
				if (urlParameter["lokasi"] != undefined && urlParameter["lokasi"] != "") {
					let spt = lks.split(",")
					getlokasi(Number(spt[0]),Number(spt[1]));
				}
			},
			() => {
				if (urlParameter["lokasi"] != undefined && urlParameter["lokasi"] != "") {
					let spt = lks.split(",")
					getlokasi(Number(spt[0]),Number(spt[1]));
				}
				// Browser supports geolocation, but user has denied permission
				handleLocationError(true, infoWindow);
			}
		);
	} else {
		// Browser doesn't support geolocation
		if (urlParameter["lokasi"] != undefined && urlParameter["lokasi"] != "") {
			let spt = lks.split(",")
			getlokasi(Number(spt[0]),Number(spt[1]));
		}
		handleLocationError(false, infoWindow);
	}
}

// Handle a geolocation error
function handleLocationError(browserHasGeolocation, infoWindow) {
	// Set default location to surakarta, Indonesia
	pos = { lat: -7.559669364640486, lng: 110.81963842699129 };
	// center: { lat: -7.559669364640486, lng: 110.81963842699129 },
	map = new google.maps.Map(document.getElementById("map-warp"), {
		center: pos,
		zoom: 15,
		disableDefaultUI: true,
	});

	// Display an InfoWindow at the map center
	infoWindow.setPosition(pos);
	infoWindow.setContent(
		browserHasGeolocation
			? "Geolocation permissions denied. Using default location."
			: "Error: Your browser doesn't support geolocation."
	);
	infoWindow.open(map);
	currentInfoWindow = infoWindow;

	// Call Places Nearby Search on the default location
	getNearbyPlaces(pos);
}

// Perform a Places Nearby Search Request
function getNearbyPlaces(position, inp) {
	if (inp == "black_spot" || inp == 'trouble_spot' || inp == 'ambang_gangguan') {
		var img = ''
		if (inp == 'black_spot') {
			inp = 'get_black_spot'
			img = 'blackspot.png'
		} else if (inp == "trouble_spot") {
			inp = 'get_trouble_spot'
			img = 'troublespot.png'
		}else if (inp == "ambang_gangguan") {
			inp = 'get_ambang_gangguan'
			img = 'ambanggangguan.png'
		}
		get_api(inp).then((r) => {
			var markers =  r
			// [
			// 	{ 'jalan' : 'Taman Nasional Gunung Gede Pangrango','lat' : -6.777797700000000000 ,'lng': 106.948689100000020000},
			// 	{'jalan':'Depok','lat':-6.3769218420922975, 'lng' :106.80749508285054}
			// ];
			for (var i = 0; i < markers.length; i++) {
	
				let contentString = 
				`
					<div class="font-weight-bold">
						${markers[i].jalan}
					</div>
					<div class="font-weight-light">
						${markers[i].status}
					</div>
				`
				var pos = new google.maps.LatLng(markers[i].lat, markers[i].lng);
				var icon = {
					url: "../assets/portal/img/"+img, // url
					scaledSize: new google.maps.Size(30, 30), // scaled size
				};
	
				markers[i] = new google.maps.Marker({
					position: pos,
					map: map,
					icon: icon,
					description: markers[i].jalan,
					id: i
				});
	
	
				var infowindow = new google.maps.InfoWindow();
				google.maps.event.addListener(markers[i], 'click', function () {
					map.setZoom(15);
					map.setCenter(pos);
					infowindow.setContent(contentString);
					infowindow.open(map, markers[this.id]);
				})
				
			}
		})
	}
	let request = {
		location: position,
		rankBy: google.maps.places.RankBy.DISTANCE,
		keyword: inp,
		disableDefaultUI: true,
	};
	service = new google.maps.places.PlacesService(map);
	service.nearbySearch(request, nearbyCallback);
}

// Handle the results (up to 20) of the Nearby Search
function nearbyCallback(results, status) {
	if (status == google.maps.places.PlacesServiceStatus.OK) {
		createMarkers(results);
	}
}

function clear(map) {
	for (let i = 0; i < mks.length; i++) {
		mks[i].setMap(map);
	}
}

// Set markers at the location of each place result
// var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
// var icons = {
//   parking: {
//     icon: iconBase + 'parking_lot_maps.png'
//   },
//   library: {
//     icon: iconBase + 'library_maps.png'
//   },
//   info: {
//     icon: iconBase + 'info-i_maps.png'
//   }
// };

function createMarkers(places) {
	clear(null);
	places.forEach((place) => {
		let marker = new google.maps.Marker({
			position: place.geometry.location,
			map: map,
			title: place.name,
			icon: (iconBase =
				"http://maps.google.com/mapfiles/kml/paddle/" +
				place.name.substring(0, 1) +
				"_maps.png"),
			// icon: iconBase = 'img/marker/'+place.types[0]+'.png',
			// icon: iconBase = 'https://developers.google.com/maps/documentation/places/web-service/icons/v1/bank-71.png?hl=fi',
			// position: new google.maps.LatLng(lat, lng),
			disableDefaultUI: true,
			// icon: iconBase = {
			//   url: 'https://developers.google.com/maps/documentation/places/web-service/icons/v1/'+place.types[0]+'-71.png?hl=fi',
			//   size: new google.maps.Size(50, 50),
			//   // origin: new google.maps.Point(0, 0),
			//   // anchor: new google.maps.Point(100, 100),
			//   }
		});
		// console.log(place.types);
		mks.push(marker);

		/* TODO: Step 4B: Add click listeners to the markers */
		// Add click listener to each marker
		google.maps.event.addListener(marker, "click", () => {
			let request = {
				placeId: place.place_id,
				disableDefaultUI: true,
				fields: [
					"name",
					"formatted_address",
					"geometry",
					"rating",
					"website",
					"photos",
					"types",
				],
			};

			/* Only fetch the details of a place when the user clicks on a marker.
			 * If we fetch the details for all place results as soon as we get
			 * the search response, we will hit API rate limits. */
			service.getDetails(request, (placeResult, status) => {
				showDetails(placeResult, marker, status);
			});
		});

		// Adjust the map bounds to include the location of this marker
		bounds.extend(place.geometry.location);
	});
	/* Once all the markers have been placed, adjust the bounds of the map to
	 * show all the markers within the visible area. */
	map.fitBounds(bounds);
}
/* TODO: Step 4C: Show place details in an info window */
// Builds an InfoWindow to display details above the marker
function showDetails(placeResult, marker, status) {
	if (status == google.maps.places.PlacesServiceStatus.OK) {
		let placeInfowindow = new google.maps.InfoWindow();
		let rating = "None";
		let contentString = placeResult.name;
		if (placeResult.rating) rating = placeResult.rating;
		placeInfowindow.setContent(contentString);
		placeInfowindow.open(marker.map, marker);
		currentInfoWindow.close();
		currentInfoWindow = placeInfowindow;
		showPanel(placeResult);
		$("#panel").css({
			height: "100%",
			width: "20%",
			// 'display': 'unset',
			visibility: "visible",
		});
	} else {
		console.log("showDetails failed: " + status);
	}
}

/* TODO: Step 4D: Load place details in a sidebar */
// Displays place details in a sidebar
function showPanel(placeResult) {
	// If infoPane is already open, close it
	if (infoPane.classList.contains("open")) {
		infoPane.classList.remove("open");
	}

	// Clear the previous details
	while (infoPane.lastChild) {
		infoPane.removeChild(infoPane.lastChild);
	}

	/* TODO: Step 4E: Display a Place Photo with the Place Details */
	// Add the primary photo, if there is one
	if (placeResult.photos) {
		let firstPhoto = placeResult.photos[0];
		let photo = document.createElement("img");
		photo.setAttribute("id", "image_maps");
		photo.classList.add("hero");
		photo.src = firstPhoto.getUrl();
		infoPane.appendChild(photo);
	}

	// Add place details with text formatting
	let name = document.createElement("h5");
	name.classList.add("place");
	name.textContent = placeResult.name;
	infoPane.appendChild(name);
	if (placeResult.rating) {
		let rating = document.createElement("p");
		rating.classList.add("details");
		rating.textContent = `Rating: ${placeResult.rating} \u272e`;
		infoPane.appendChild(rating);
	}
	let address = document.createElement("p");
	address.classList.add("details");
	address.textContent = placeResult.formatted_address;
	infoPane.appendChild(address);
	if (placeResult.website) {
		let websitePara = document.createElement("p");
		let websiteLink = document.createElement("a");
		let websiteUrl = document.createTextNode(placeResult.website);
		websiteLink.appendChild(websiteUrl);
		websiteLink.title = placeResult.website;
		websiteLink.href = placeResult.website;

		websitePara.appendChild(websiteLink);
		infoPane.appendChild(websitePara);
	}

	var back = "jancok";
	if (back == "jancok") {
		let link = document.createElement("a");
		link.setAttribute("id", "kembali");
		link.classList.add("kembali");
		link.appendChild(document.createTextNode("Kembali"));
		link.href = "javascript:void(0);";
		link.onclick = clearMarkers;
		infoPane.appendChild(link);
	}
	// Open the infoPane
	infoPane.classList.add("open");
}

function clearMarkers() {
	$("#panel").css({
		height: "100%",

		// 'display': 'none',
		// // 'width': '20%',
		display: "unset",
		visibility: "hidden",
		// 'width': '20%',
	});
	showPanel(null);
}

function getlokasi(lat,lng) {
	var ls = [
		{lat :lat, lng:lng}
	]
	clearLokasi();
  
	for (let i = 0; i < ls.length; i++) {
	  addMarkerWithTimeout(ls[i], i * 100);
	}
  }

  function prom_get_evnt(id) {
		return new Promise(function (resolve, reject) {
			$.ajax({
				type: "POST",
				url: baseUrl+'Portal/getEvnt/'+id,
				dataType: "json",
				data: {},
				success: function (r) {
					const contentString =
					`<div id="content">
						<h5 id="firstHeading" class="firstHeading">${r.judul_event}</h5>
						<div id="bodyContent">
							<p>${r.deskripsi_event}</p>
							<a href="${baseUrl}Portal/eventSingle/${id}" class="btn btn-primary">Detail</a>
						</div>
					</div>`;
					resolve(contentString);
				},
			});
		});
	}

  function addMarkerWithTimeout(position, timeout) {
	prom_get_evnt(evnt).then( function(data){
		const infowindow = new google.maps.InfoWindow({
			content: data,
		});
		window.setTimeout(() => {
			var lokasiss = new google.maps.Marker({
				position: position,
				map,
				animation: google.maps.Animation.DROP,
			  })
		  lokasis.push(
			lokasiss
		  );
		  lokasiss.addListener("click", () => {
			infowindow.open({
			  anchor: lokasiss,
			  map,
			  shouldFocus: false,
			});
		  });
		}, timeout);
	})

	
  }
  
  function clearLokasi() {
	for (let i = 0; i < lokasis.length; i++) {
	  lokasis[i].setMap(null);
	}
  
	lokasis = [];
  }

// get url paramater
function GetURLParameter(sParam) {
	var sPageURL = window.location.search.substring(1);
	var sURLVariables = sPageURL.split("&");
	for (var i = 0; i < sURLVariables.length; i++) {
		var sParameterName = sURLVariables[i].split("=");
		if (sParameterName[0] == sParam) {
			return sParameterName[1];
		}
	}
}
let lks = GetURLParameter("lokasi");
let evnt = GetURLParameter("id");
var urlParameter = {
	lokasi: lks,
	event:evnt
};
