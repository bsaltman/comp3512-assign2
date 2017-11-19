// Get bcoverlay element
var bcOverlay = document.getElementById('coverOverlay');
// Get open bcoverlay button
var bcOverlayBtn = document.getElementById('bookCover');
// Get close button
var closeBtn = document.getElementsByClassName('floatingCover')[0];

// Listen for open click
bcOverlayBtn.addEventListener('click', openOverlay);
// Listen for close click
closeBtn.addEventListener('click', closeOverlay);


// Function to open bcoverlay
function openOverlay(){
  bcOverlay.style.display = 'block';
}

// Function to close bcoverlay
function closeOverlay(){
  bcOverlay.style.display = 'none';
}