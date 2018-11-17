// Get the modal
var modal = document.getElementById('event-overlay');

//Get the modal contents
var cont1 = document.getElementById('more-event1');
var cont2 = document.getElementById('more-event2');


// Get the button that opens the modal
var btn1 = document.getElementById("event1");
var btn2 = document.getElementById("event2");
// Get the <span> element that closes the modal
var span = document.getElementById("close");
var span2 = document.getElementById("close2");

// When the user clicks on the button, open the modal 
btn1.onclick = function() {
    modal.style.display = "block";
    cont1.style.display = "block";
}

btn2.onclick = function() {
    modal.style.display = "block";
    cont2.style.display = "block";

}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    cont1.style.display = "none";
    cont2.style.display = "none";
}
span2.onclick = function() {
    modal.style.display = "none";
    cont1.style.display = "none";
    cont2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        cont1.style.display = "none";
    	cont2.style.display = "none";
    }
}

function openImg(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}
function openImg2(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg2");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}