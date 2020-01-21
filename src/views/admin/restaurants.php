<style>
#map {
  height: 400px;  /* The height is 400 pixels */
  width: 100%;  /* The width is the width of the web page */
  margin-bottom: 1rem;
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
  <div class="tab-pane fade" id="listview" role="tabpanel" aria-labelledby="listview-tab">
    <table class="table">

      <thead>
          <tr id="headRow">

              <th scope="col">#</th>
              <th scope="col">Restaurant</th>
              <th scope="col">Address</th>
              <th scope="col">Food type</th>
              <th scope="col">Delete</th>

          </tr>
      </thead>

      <tbody id="table_body">
      <tbody>
        <?php foreach ($events as $idx => $event) :
        ?>

        <tr>
       
        <td><?=$idx?></td>
        <td><?=$event->getName()?></td>
        <td><?=$event->getAddress()?></td>
        <td><?=$event->getDescription()?></td>
        <td><a href="/admin/event/<?= $event->getSlug()?>?delete" class="icon delete-icon"></a></td>

        </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</div>

<form class="form" action="/admin/create" method="POST">
    <input type="hidden" name="category" value="2">
    <input type="submit" name="submit" value="Add Restaurant" class="btn btn-primary">
</form>

<!-- <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWGSiRJWqEGeFYMuqAeItEvVkAdNbRO9I&callback=initMap">
</script> -->
