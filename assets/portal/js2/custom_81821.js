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

function reply_click(clicked_id) {
	if (clicked_id != 0) {
		const localContextMapView =
			new google.maps.localContext.LocalContextMapView({
				element: document.getElementById("map-warp"),
				placeTypePreferences: [{ type: clicked_id }],
				maxPlaceCount: 16,
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
			zoom: 14,
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
				});
				bounds.extend(pos);

				infoWindow.setPosition(pos);
				infoWindow.setContent("Your Location found.");
				infoWindow.open(map);
				map.setCenter(pos);

				// Call Places Nearby Search on user's location
				getNearbyPlaces(pos);
			},
			() => {
				// Browser supports geolocation, but user has denied permission
				handleLocationError(true, infoWindow);
			}
		);
	} else {
		// Browser doesn't support geolocation
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
function createMarkers(places) {
	clear(null);
	places.forEach((place) => {
		let marker = new google.maps.Marker({
			position: place.geometry.location,
			map: map,
			title: place.name,
			disableDefaultUI: true,
		});

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
			width: "250px",
			display: "unset",
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

		let websiteUrl = document.createTextNode(placeResult.website);
		websiteLink.appendChild(websiteUrl);
		websiteLink.title = placeResult.website;
		websiteLink.href = placeResult.website;

		websitePara.appendChild(websiteLink);
		infoPane.appendChild(websitePara);
	}

	var link = document.createElement("a");
	link.setAttribute("id", "kembali");
	link.appendChild(document.createTextNode("Kembali"));
	link.href = "javascript:void(0);";
	link.onclick = clearMarkers;
	infoPane.appendChild(link);
	// Open the infoPane
	infoPane.classList.add("open");
}

function clearMarkers() {
	$("#panel").css({
		display: "none",
		width: "250px",
	});
	showPanel(null);
}

const menuBtn = document.querySelector(".menu-btn");
let menuOpen = true;
menuBtn.addEventListener("click", () => {
	if (!menuOpen) {
		menuBtn.classList.add("open");
		menuOpen = true;
	} else {
		menuBtn.classList.remove("open");
		menuOpen = false;
	}
});
