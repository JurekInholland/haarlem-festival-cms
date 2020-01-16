<style>
#map {
  height: 400px;  /* The height is 400 pixels */
  width: 100%;  /* The width is the width of the web page */
 }
</style>


<h3>Restaurants</h3>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="mapview-tab" data-toggle="tab" href="#mapview" role="tab" aria-controls="mapview" aria-selected="true">Map View</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="listview-tab" data-toggle="tab" href="#listview" role="tab" aria-controls="listview" aria-selected="false">List View</a>
  </li>
</ul>


<div class="tab-content">
  <div class="tab-pane active fade show" id="mapview" role="tabpanel" aria-labelledby="mapview-tab">

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWGSiRJWqEGeFYMuqAeItEvVkAdNbRO9I"></script>

    <!--The div element for the map -->
    <div id="map"></div>
    <!-- Replace the value of the key parameter with your own API key. -->

    <script src="/js/mapsview.js" type="module"></script>
  </div>
  <div class="tab-pane fade" id="listview" role="tabpanel" aria-labelledby="listview-tab">...</div>
</div>

<h2>Add Restaurant</h2>
<form class="form" action="">
    <input type="text">
</form>

<!-- <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWGSiRJWqEGeFYMuqAeItEvVkAdNbRO9I&callback=initMap">
</script> -->
