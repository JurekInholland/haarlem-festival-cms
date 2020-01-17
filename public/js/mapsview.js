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
}

function generateInfo(restaurant) {
    var info = '<div id="infocontent">'+
    `<h1 id="firstHeading" class="firstHeading">${restaurant["name"]}</h1>`+
    `<div id="bodyContent">`+
    `<p>${restaurant["address"]}</p>`+
    `<a href="#">edit</a> | <a href="#">delete</a>`+
    `</div>`+
    `</div>`
    return info;
}


(async () => {
    init();
  })();