// To toggle the sidebar
let b = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');
b.onclick = function() {
    sidebar.classList.toggle('active');
}

// Get the modal and the button to open it
var modal = document.getElementById("courseModal");
var openModalBtn = document.getElementById("openModal");

// Get the button to close the modal (Cancel button)
var cancelBtn = document.getElementById("cancelBtn");

// When the user clicks the "Insert" button, open the modal
openModalBtn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on the "Cancel" button, close the modal
cancelBtn.onclick = function() {
    modal.style.display = "none";
}

// Close the modal when clicking outside of the modal content
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

