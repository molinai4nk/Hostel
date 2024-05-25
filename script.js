function toggleDropdown() {
    var dropdown = document.getElementById("myDropdown");
    dropdown.classList.toggle("show");
  }
  
  window.onclick = function (event) {
    if (!event.target.matches('.dropdown button')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  };
// para o mapa no index.html
function initMap() {
  var center = { lat: -21.287879943847656, lng: -50.34693145751953 };
  var mapOptions = {
    zoom: 12,
    center: center
  };
  var map = new google.maps.Map(document.getElementById('map'), mapOptions);
  var hotelMarker = new google.maps.Marker({
    position: { lat: -21.287879943847656, lng: -50.34693145751953 },
    map: map,
    title: 'Hostel'
  });
}

google.maps.event.addDomListener(window, 'load', initMap);