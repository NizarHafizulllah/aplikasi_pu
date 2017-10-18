<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
       .gm-style-iw {
  overflow-y: auto !important;
  overflow-x: hidden !important;
}
.gm-style-iw > div {
  overflow: visible !important;   
}
.infoWindow {
  overflow: hidden !important;
}
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .map-control {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        font-family: 'Roboto','sans-serif';
        margin: 10px;
        /* Hide the control initially, to prevent it from appearing
           before the map loads. */
        display: none;
      }
      /* Display the control once it is inside the map. */
      #map .map-control { display: block; }

      .selector-control {
        font-size: 14px;
        line-height: 30px;
        padding-left: 5px;
        padding-right: 5px;
      }

    </style>
  </head>
  <body>

   <div id="style-selector-control"  class="map-control">
      <select id="style-selector" class="selector-control">
        <option value="default">Bawaan</option>
        <option value="silver">Putih</option>
        <option value="night">Mode Malam</option>
        <option value="retro" selected="selected">Retro</option>
        <option value="hiding">Bersih</option>
      </select>
    </div>
  
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7AJAk0CxyuKFc2gcXhheHUzu3Cvp8G4M"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
      var map;
      alert('Selamat Datang');
      var lokasi = [];
      var base_urlimg = '<?php echo base_url("assets/img/") ?>'
      var icons = {
        jembatan: {
          icon: '<?php echo base_url('assets/icon/jembatan.png') ?>'
        },
        gedung: {
          icon: '<?php echo base_url('assets/icon/gedung.png') ?>'
        },
      }

      function initialize() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -8.489765, lng: 117.419735},
          zoom: 12,
          mapTypeControl: false,
          zoomControlOptions: {
          	position : google.maps.ControlPosition.RIGHT_TOP
          },
        });
        // Add a style-selector control to the map.
        var styleControl = document.getElementById('style-selector-control');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(styleControl);

        // Set the map's style to the initial value of the selector.
        var styleSelector = document.getElementById('style-selector');
        map.setOptions({styles: styles[styleSelector.value]});

        // Apply new JSON when the user selects a different style.
        styleSelector.addEventListener('change', function() {
          map.setOptions({styles: styles[styleSelector.value]});
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);

     
      var styles = {
        default: null,
        silver: [
          {
            elementType: 'geometry',
            stylers: [{color: '#f5f5f5'}]
          },
          {
            elementType: 'labels.icon',
            stylers: [{visibility: 'off'}]
          },
          {
            elementType: 'labels.text.fill',
            stylers: [{color: '#616161'}]
          },
          {
            elementType: 'labels.text.stroke',
            stylers: [{color: '#f5f5f5'}]
          },
          {
            featureType: 'administrative.land_parcel',
            elementType: 'labels.text.fill',
            stylers: [{color: '#bdbdbd'}]
          },
          {
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [{color: '#eeeeee'}]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#757575'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'geometry',
            stylers: [{color: '#e5e5e5'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9e9e9e'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#ffffff'}]
          },
          {
            featureType: 'road.arterial',
            elementType: 'labels.text.fill',
            stylers: [{color: '#757575'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#dadada'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [{color: '#616161'}]
          },
          {
            featureType: 'road.local',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9e9e9e'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'geometry',
            stylers: [{color: '#e5e5e5'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'geometry',
            stylers: [{color: '#eeeeee'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [{color: '#c9c9c9'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9e9e9e'}]
          }
        ],

        night: [
          {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
          {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
          {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
          {
            featureType: 'administrative.locality',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'geometry',
            stylers: [{color: '#263c3f'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#6b9a76'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#38414e'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry.stroke',
            stylers: [{color: '#212a37'}]
          },
          {
            featureType: 'road',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9ca5b3'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#746855'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#1f2835'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [{color: '#f3d19c'}]
          },
          {
            featureType: 'transit',
            elementType: 'geometry',
            stylers: [{color: '#2f3948'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [{color: '#17263c'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#515c6d'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#17263c'}]
          }
        ],

        retro: [
          {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
          {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
          {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
          {
            featureType: 'administrative',
            elementType: 'geometry.stroke',
            stylers: [{color: '#c9b2a6'}]
          },
          {
            featureType: 'administrative.land_parcel',
            elementType: 'geometry.stroke',
            stylers: [{color: '#dcd2be'}]
          },
          {
            featureType: 'administrative.land_parcel',
            elementType: 'labels.text.fill',
            stylers: [{color: '#ae9e90'}]
          },
          {
            featureType: 'landscape.natural',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#93817c'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'geometry.fill',
            stylers: [{color: '#a5b076'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#447530'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#f5f1e6'}]
          },
          {
            featureType: 'road.arterial',
            elementType: 'geometry',
            stylers: [{color: '#fdfcf8'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#f8c967'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#e9bc62'}]
          },
          {
            featureType: 'road.highway.controlled_access',
            elementType: 'geometry',
            stylers: [{color: '#e98d58'}]
          },
          {
            featureType: 'road.highway.controlled_access',
            elementType: 'geometry.stroke',
            stylers: [{color: '#db8555'}]
          },
          {
            featureType: 'road.local',
            elementType: 'labels.text.fill',
            stylers: [{color: '#806b63'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'labels.text.fill',
            stylers: [{color: '#8f7d77'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#ebe3cd'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry.fill',
            stylers: [{color: '#b9d3c2'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#92998d'}]
          }
        ],

        hiding: [
          {
            featureType: 'poi.business',
            stylers: [{visibility: 'off'}]
          },
          {
            featureType: 'transit',
            elementType: 'labels.icon',
            stylers: [{visibility: 'off'}]
          }
        ]
      };

  function findLokasi() {

    $.ajax({
          type: "GET",
          url: "<?php echo site_url('coba_map/get_data') ?>",
          dataType: "json",
          success: function(data){

    var d = new google.maps.InfoWindow();
    var e;

    $.each(data, function(i, b) {
        // membuat maker dari lat, lng
        e = new google.maps.Marker({
            position: new google.maps.LatLng(b.lat, b.lng),
            icon: b.icon,
            map: map
        });

        lokasi.push(e);

        // membuat info window alamat

        google.maps.event.addListener(e, 'click', (function(a, i) {
            return function() {
                 // alert(a.position.lat());
                d.setContent('<div><img src="' + b.image + '" alt="Smiley face" height="300" width="300"></div><div class="row"><table width="100%"><tr><td width="30%"><b>Nama </b></td><td width="70%"><b>' + b.nama + '</b></td></tr><tr><td width="30%"><b>Jenis</b> </td><td width="70%"><b>' + b.jenis + '</b></td></tr><tr><td width="30%"><b>Lat</b> </td><td width="70%"><b>' + b.lat + '</b></td></tr><tr><td width="30%"><b>Lng</b> </td><td width="70%"><b>' + b.lng + '</b></td></tr></table>');
                google.maps.event.addListener(d, 'domready', fixInfoWindowScrollbars);
                d.open(map, a)
            }
        })(e, i))
    });
}
});
      }

 function fixInfoWindowScrollbars() {
    
    if (this.hasFixApplied) return;
    
    // Find the DOM node for this infoWindow
    var InfoWindowWrapper = $((this.B || this.D).contentNode.parentElement);
    
    // We disable scrollbars temporarily
    // Then increase .infoWindow's natural dimensions by 2px in width and height    
    
    InfoWindowWrapper.children().css('overflow', 'visible');
    
    var InfoWindowElement = InfoWindowWrapper.find('.infoWindow');
    InfoWindowElement            
        .width(function(i, oldWidth) { return oldWidth + 3 })
    
    // Will this content need scrollbars?  If so, add another 20px padding on right
    if (InfoWindowElement.height() > InfoWindowWrapper.height()) {
        InfoWindowElement
            .css({'padding-right': '20px'})
            .width(function(i, oldWidth) { return oldWidth - 20 })
    }
        
    InfoWindowElement
        .height(function(i, oldHeight) { return oldHeight + 3 })            
  
    // Replace infoWindow content with our new DOM nodes
    this.hasFixApplied = true;
    this.setContent(InfoWindowElement.get(0))
   
  }

      $(function(){
        findLokasi();
      });
    </script>
    
  </body>
</html>