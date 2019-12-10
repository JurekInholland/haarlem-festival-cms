console.log("index.js");

import {getLocations, makeRequest} from "./haarlem-festival.js";

// console.log(haarlem());

async function locationTable() {
    let url = "/api/locations";
    let result = await makeRequest("GET", url);
    
    let table = document.getElementById("loc_table");
    let body = document.getElementById("table_body");

    for (var i in result) {

        console.log(result[i]);
        let row = document.createElement("tr");
        body.appendChild(row);

        var cols = ["id", "name", "address", "category"]

        for (var col in cols) {
            
            let td = document.createElement("td");
            row.appendChild(td);
            if (col == 0) {
                // let inpt = document.createElement("p");
                td.appendChild(document.createTextNode(result[i][cols[col]]))
            }
            else {
                let inpt = document.createElement("input");
                inpt.setAttribute("type", "text");
                inpt.setAttribute("value", result[i][cols[col]]);
                td.appendChild(inpt);
            }
            
            
            // td.appendChild(document.createTextNode(result[i][cols[col]]))
        }
        let td = document.createElement("td");
        let btn = document.createElement("button");
        btn.setAttribute("value", "asd");
        btn.innerHTML = "Delete";
        td.appendChild(btn);
        row.appendChild(td);
        // for (var j in result[i]) {
        //     console.log("J: " + result[i][j]);
        // }
    }
    
}


locationTable();
// loc.forEach(process);

function process(item) {
    console.log("item: " + item);
}