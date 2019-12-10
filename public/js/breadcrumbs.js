import {getCurrentColor} from "./haarlem-festival.js";

async function setBreadcrumbsColor() {
    let color = await getCurrentColor();
    let breadcrumbs = document.getElementById("breadcrumbs");

    breadcrumbs.style.backgroundColor = color;
}

setBreadcrumbsColor();