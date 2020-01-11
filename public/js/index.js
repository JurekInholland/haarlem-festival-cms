console.log("index.js");

import {getLocations, makeRequest} from "./haarlem-festival.js";

let search_input = document.getElementById("search");
let search_term = "";
// console.log(haarlem());
search_input.addEventListener('input', async (e) => {
    search_term = e.target.value;
    console.log("search " + search_term);
    await locationTable(search_term);
	// re-display countries again based on the new search_term
});



// let add_btn = document.getElementById("addBtn");
// add_btn.addEventListener("click", (e) => {
//     console.log("btnn");
// });

function lolFunction() {
    console.log("myfunction");
}

function search() {

}

async function locationTable(searchterm="") {

    let search = document.getElementById("search");
    // let searchterm = search.nodeValue;
    console.log("STTTT" + searchterm);

    let url = "/api/locations";
    let result = await makeRequest("GET", url);
    
    let table = document.getElementById("loc_table");
    let body = document.getElementById("table_body");

    body.innerHTML = "";

    for (var i in result) {

        console.log(result[i]["name"]);
        
        // TODO str_to_lower(searchterm)
        if (result[i]["name"].includes(searchterm)) {
            console.log("IS");
            let row = document.createElement("tr");
            body.appendChild(row);
    
            var cols = ["id", "name", "address", "category"]
    
            for (var col in cols) {
                
                let td = document.createElement("td");
                row.appendChild(td);
                if (col == 0) {
                    td.appendChild(document.createTextNode(result[i][cols[col]]))
                }
                else {
                    let inpt = document.createElement("input");
                    inpt.setAttribute("type", "text");
                    inpt.setAttribute("value", result[i][cols[col]]);
                    td.appendChild(inpt);
                }            
            }
            let td = document.createElement("td");
            let btn = document.createElement("input");
            btn.setAttribute("type", "submit");
            btn.setAttribute("name", result[i][cols[col]]);
            btn.setAttribute("value", "Delete");
            td.appendChild(btn);
            row.appendChild(td);
                   }
        
    }
    
}


locationTable();
// loc.forEach(process);

function process(item) {
    console.log("item: " + item);
}