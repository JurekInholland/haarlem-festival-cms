function displaySummary() {
  var text = "";
  var x = document.forms["reservation"];

  for (var i = 0; i < x.length ;i++) {
    text += x.elements[i].value + " ";
  }
  
  var res = text.split(" ");
  document.getElementById("date").innerHTML = res[0];
  document.getElementById("time").innerHTML = res[1];
  document.getElementById("adults").innerHTML = res[2];
  document.getElementById("children").innerHTML = res[3];
  document.getElementById("allergies").innerHTML =  document.getElementById("allergy_id").value;
  document.getElementById("requests").innerHTML = document.getElementById("request_id").value;
}