import {getRestaurants} from "./haarlem-festival.js";

function findLatLang(address, geocoder, mainMap) {
    return new Promise(function(resolve, reject) {
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                resolve({lat: results[0].geometry.location.lat(), lng:  results[0].geometry.location.lng()});
            } else {
                reject(new Error('Couldnt\'t find the location ' + address));
            }
        })
    })
} 


async function processRestaurants(map) {

    let geocoder = new google.maps.Geocoder();
    let latlangs = [];

    let restaurants = await getRestaurants();
    for (var i in restaurants) {
        let latlang = await findLatLang(restaurants[i]["address"], geocoder, map);
        latlangs[i] = {name: restaurants[i]["name"], address: restaurants[i]["address"], latlang: latlang};
    }
    return latlangs;

    

}

async function init() {
    var haarlem = {lat: 52.3861809, lng: 4.6364396};

    var map = new google.maps.Map(document.getElementById('map'), {
        center: haarlem,
        zoom: 13
      });

    let restaurants = await processRestaurants(map);
    Promise.all(restaurants)     
    .then(function(returnVals){
        var prev_info;

        for (var i in returnVals) {
            console.log(i)
            let marker = new google.maps.Marker({position: {lat: returnVals[i]["latlang"]["lat"], lng: returnVals[i]["latlang"]["lng"]}, 
                                                 map: map,
                                                 animation: google.maps.Animation.DROP,
                                                 

            });
            let infowindow = new google.maps.InfoWindow({
                content: generateInfo(returnVals[i])
            });

            marker.addListener('click', function() {
                if (prev_info) {
                    prev_info.close();
                }
                infowindow.open(map, marker);
                prev_info = infowindow;
              });

        }
          console.log(returnVals);
})
    // console.log(restaurants);
}

function generateInfo(restaurant) {
    var info = '<div id="content">'+
    `<h1 id="firstHeading" class="firstHeading">${restaurant["name"]}</h1>`+
    `<div id="bodyContent">`+
    `<p>${restaurant["address"]}`+
    `</div>`+
    `</div>`
    return info;
}

function initMap() {
    
    // Center map on haarlem
    var haarlem = {lat: 52.3861809, lng: 4.6364396};

    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 13, center: haarlem});

        var marker = new google.maps.Marker({position: haarlem, map: map});
  }

function display(loc, map) {
    var marker = new google.maps.Marker({position: loc, map: map, title: "lel", animation: google.maps.Animation.DROP, label: "asd"});
}

function addressToCoords(address, callback, map) {
    console.log("GEO CODE " + address);
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
        callback(results[0].geometry.location, map);

      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
}

(async () => {
    init();
  })();