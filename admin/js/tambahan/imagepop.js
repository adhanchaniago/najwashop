function modal(element) {
  	document.getElementById("img01").src = element.src;  	
  	document.getElementById("myModal").style.display = "block";

  	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("closemodal")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
	    document.getElementById("myModal").style.display = "none";
	}
}