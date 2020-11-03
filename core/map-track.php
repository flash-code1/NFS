<?php
include("header.php");
?>
 <!-- Page Sidebar Ends-->
 <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-6">
                  <h3>Parties</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Map Tracking</li>
                  </ol>
                </div>
                <div class="col-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark pull-right">
                    <ul>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                      <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                        <form class="form-inline search-form" action="#" method="get">
                          <div class="form-group form-control-search">
                            <div class="Typeahead Typeahead--twitterUsers">
                              <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search.." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
                              </div>
                              <div class="Typeahead-menu"></div>
                              <script id="result-template" type="text/x-handlebars-template">
                                <div class="ProfileCard u-cf">                        
                                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                                <div class="ProfileCard-details">
                                <div class="ProfileCard-realName">{{name}}</div>
                                </div>
                                </div>
                              </script>
                              <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
                            </div>
                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12">
              <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- MAP -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPrkS4dgB9aLB0rRB-V3StNCwrY9k-p3g&callback=initMap&libraries=&v=beta&map_ids=cba27fc1cc5d6739"
      defer
    ></script>
                <div class="card">
                  <div class="card-header">
                    <h5>Track Party Location</h5><span>Below Search Parties by Id</span> <br>
                    <form class="form theme-form">
                    <div class="form-group">
                            <input class="form-control input-air-primary" id="exampleFormControlInput15" type="text" placeholder="Eg. XYWL245">
                          </div>
                    </form>
                  </div>
                  <div class="card-body">
                  <div class="map-js-height" id="map"></div>
                  </div>
                  <script>
                      let map;
let lat;
let lng;
                      if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    console.log("Geolocation is not supported by this browser.");
  }
 function showPosition(position) {
  lat = " "+position.coords.latitude;
  lng = " "+position.coords.longitude;
  initMap();
}
// contry restriction
const NEW_NIGERIA_BOUNDS = {
        north: 2.213965683043,
        south: 10.124121933043,
        west: 2.131202795549269,
        east: 15.982786876781637,
      };
function initMap() {
    
  map = new google.maps.Map(document.getElementById("map"), {
    mapId: 'cba27fc1cc5d6739',
    center: new google.maps.LatLng(lat, lng),
    restriction: {
       latLngBounds: NEW_NIGERIA_BOUNDS,
       strictBounds: false,
    },
    zoom: 14,
    streetViewControl: false,
    mapTypeControl: false,
  });
  const iconBase =
    "https://firebasestorage.googleapis.com/v0/b/crush-culture.appspot.com/o/Location%2F";
  const icons = {
    parking: {
      icon: iconBase + "active_new.png?alt=media&token=b5e4f57e-b76c-4ba7-8ffd-b8dd4338d81f",
    },
    library: {
      icon: iconBase + "upcoming_new.png?alt=media&token=41d3771e-65af-47c6-ad0d-53cee51c47b9",
    },
    info: {
      icon: iconBase + "verified_new.png?alt=media&token=4addea67-5557-45d4-b41f-f94c9b571983",
    },
  };
  const features = [
    {
      position: new google.maps.LatLng(9.032361311412938, 7.482608095007208),
      type: "info",
    },
    {
      position: new google.maps.LatLng(9.053224484472619, 7.475054994421271),
      type: "info",
    },
    {
      position: new google.maps.LatLng(8.889258671469772, 7.578609720068243),
      type: "info",
    },
    {
      position: new google.maps.LatLng(6.425727188677011, 3.4265319583599876),
      type: "info",
    },
    {
      position: new google.maps.LatLng(6.440397111575778, 3.352717566270144),
      type: "info",
    },
    {
      position: new google.maps.LatLng(6.422095373297768, 3.4864425659179688),
      type: "info",
    },
    {
      position: new google.maps.LatLng(6.492932420227855, 3.378981756943972),
      type: "info",
    },
    {
      position: new google.maps.LatLng(-33.91682, 151.23149),
      type: "info",
    },
    {
      position: new google.maps.LatLng(-33.9179, 151.23463),
      type: "info",
    },
    {
      position: new google.maps.LatLng(-33.91666, 151.23468),
      type: "info",
    },
    {
      position: new google.maps.LatLng(-33.916988, 151.23364),
      type: "info",
    },
    {
      position: new google.maps.LatLng(-33.91662347903106, 151.22879464019775),
      type: "parking",
    },
    {
      position: new google.maps.LatLng(-33.916365282092855, 151.22937399734496),
      type: "parking",
    },
    {
      position: new google.maps.LatLng(-33.91665018901448, 151.2282474695587),
      type: "parking",
    },
    {
      position: new google.maps.LatLng(-33.919543720969806, 151.23112279762267),
      type: "parking",
    },
    {
      position: new google.maps.LatLng(-33.91608037421864, 151.23288232673644),
      type: "parking",
    },
    {
      position: new google.maps.LatLng(-33.91851096391805, 151.2344058214569),
      type: "parking",
    },
    {
      position: new google.maps.LatLng(6.4850865849191965, 3.332461523789675),
      type: "parking",
    },
    {
      position: new google.maps.LatLng(6.430375553099593, 3.428570437211306),
      type: "library",
    },
  ];

  // Create markers.
  for (let i = 0; i < features.length; i++) {
    const marker = new google.maps.Marker({
      position: features[i].position,
      icon: icons[features[i].type].icon,
      map: map,
    });
  }
}

                  </script>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
<?php
include("footer.php")
?>