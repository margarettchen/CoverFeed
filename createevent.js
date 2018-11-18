// Get the modal
var modal = document.getElementById('event-overlay');

//Get the modal contents
var cont1 = document.getElementById('create-cont');



// Get the button that opens the modal
var btn1 = document.getElementById("create-event");

// Get the <span> element that closes the modal
var span = document.getElementById("close3");

// When the user clicks on the button, open the modal 
btn1.onclick = function() {
    modal.style.display = "block";
    cont1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    cont1.style.display = "none";
    cont2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        cont1.style.display = "none";
    }
}