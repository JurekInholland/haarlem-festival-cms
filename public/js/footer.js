import {getCurrentColor, getPages} from "./haarlem-festival.js";

function setupFooter() {
    setFooterLinks();
    setFooterColor();
}

async function setFooterColor() {
    let color = await getCurrentColor();
    let footer = document.getElementById("footer");

    footer.style.backgroundColor = color;
}

async function setFooterLinks() {
    let links = await getPages();
    let parentNode = document.getElementById("footerlinks");
    // console.log(links);
    for (const link of links) {
        if (link["menu"] == 1) {
            let li = document.createElement("li");
            let a = document.createElement('a');
            let text = document.createTextNode(link["headline"]);
            a.appendChild(text);
            a.title = link["headline"];
            a.href = "/" + link["slug"];
    
            li.appendChild(a);
            parentNode.appendChild(li);
        }
    }
}

setupFooter();