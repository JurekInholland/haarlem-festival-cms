import {makeRequest, getCategories} from "./haarlem-festival.js";



async function navLinks() {
    let url = "/api/categories"
    let categories = await makeRequest("GET", url);
    return categories;
}

async function loadNav() {


    let path = window.location.pathname

    let categories = await getCategories();
    let nav = document.getElementById("navigation");
    for (var i in  categories) {
        // console.log( categories[i]);
        let link = document.createElement("a");
        link.href = "/" + categories[i]["slug"];
        link.appendChild(document.createTextNode(categories[i]["name"]));

        if (path == "/" + categories[i]["slug"]) {
            link.style.backgroundColor = categories[i]["color"];
            link.style.color = "white";

        }
        nav.appendChild(link);
    }
}


loadNav();