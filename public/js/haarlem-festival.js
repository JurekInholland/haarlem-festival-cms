export default function haarlem() {
    return "Haarlem";
}


export async function getCurrentColor() {
    let categories = await getCategories();
    let path = window.location.pathname;

    for (var i in  categories) {
        if (path == "/" + categories[i]["slug"]) {
            return categories[i]["color"];
        }
    }
}

export async function getLocations() {
    let url = "/api/locations";
    let result = await makeRequest("GET", url);
    return result;
}

export async function getCategories() {
    let url = "/api/categories";
    let result = await makeRequest("GET", url);
    return result;
}

export function makeRequest(method, url) {
    return new Promise(function (resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.responseType = 'json';

        xhr.open(method, url);
        xhr.onload = function () {
            if (this.status >= 200 && this.status < 300) {
                resolve(xhr.response);
            } else {
                reject({
                    status: this.status,
                    statusText: xhr.statusText
                });
            }
        };
        xhr.onerror = function () {
            reject({
                status: this.status,
                statusText: xhr.statusText
            });
        };
        xhr.send();
    });
}
