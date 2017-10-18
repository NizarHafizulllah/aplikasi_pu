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
    </style>
  </head>
  <body>
  
    <div id="map"></div>

    
    
    <script>
      var map;
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
          zoomControlOptions: {
            position : google.maps.ControlPosition.RIGHT_TOP
          },
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);

     

  function findLokasi() {

    $.ajax({
          type: "GET",
          url: "<?php echo site_url('admin/get_data') ?>",
          dataType: "json",
          success: function(data){

    var d = new google.maps.InfoWindow();
    var e;

    $.each(data, function(i, b) {
        // membuat maker dari lat, lng
        e = new google.maps.Marker({
            position: new google.maps.LatLng(b.lat, b.lng),
            icon: icons[b.jenis].icon,
            map: map
        });

        lokasi.push(e);

        // membuat info window alamat

        google.maps.event.addListener(e, 'click', (function(a, i) {
            return function() {
                 // alert(a.position.lat());
                d.setContent('<div><img src="' + base_urlimg + '/' + b.image + '" alt="Smiley face" height="300" width="300"></div><div class="row"><table width="100%"><tr><td width="30%"><b>Nama </b></td><td width="70%"><b>' + b.nama + '</b></td></tr><tr><td width="30%"><b>Jenis</b> </td><td width="70%"><b>' + b.jenis + '</b></td></tr><tr><td width="30%"><b>Lat</b> </td><td width="70%"><b>' + b.lat + '</b></td></tr><tr><td width="30%"><b>Lng</b> </td><td width="70%"><b>' + b.lng + '</b></td></tr></table>');
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