require('./bootstrap');


const targetDiv = document.getElementById("editFormDiv");
const clickBtn = document.getElementById("toggle");

// loadEventListeners();

// function loadEventListeners() {
//     targetDiv.style.display = "none";
// }

clickBtn.onclick = function () {
  if (targetDiv.style.display !== "none") {
    targetDiv.style.display = "none";
  } else {
    targetDiv.style.display = "block";
  }
};
