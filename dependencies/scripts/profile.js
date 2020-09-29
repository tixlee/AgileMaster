//username
$(".dropdown-username").hide();

function dropdown(bar) {

	if(document.getElementById(bar).className != "active") {
	document.getElementById(bar).className = "active";
	}else{
	document.getElementById(bar).className = "";
	}
    
	switch(bar) {

	case 'username':
		$(".dropdown-username").slideToggle();
	break;
	}
}