// Get modal element
var modal = document.getElementById('coverOverlay');
// Get open modal button
var modalBtn = document.getElementById('bookCover');
// Get close button
var closeBtn = document.getElementsByClassName('floatingCover')[0];

// Listen for open click
modalBtn.addEventListener('click', openOverlay);
// Listen for close click
closeBtn.addEventListener('click', closeOverlay);


// Function to open modal
function openOverlay(){
  modal.style.display = 'block';
}

// Function to close modal
function closeOverlay(){
  modal.style.display = 'none';
}
