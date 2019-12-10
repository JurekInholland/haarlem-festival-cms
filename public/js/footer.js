import {getCurrentColor} from "./haarlem-festival.js";

async function setFooterColor() {
    let color = await getCurrentColor();
    let footer = document.getElementById("footer");

    footer.style.backgroundColor = color;
}

setFooterColor();