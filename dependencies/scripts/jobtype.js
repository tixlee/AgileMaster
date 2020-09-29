//JOB TYPE
var select = document.getElementById('select');
var cont = document.getElementById('cont');
select.onchange = function(){
	if(select.value == "Contract"){
  	cont.style.display = "block";
  } else {
  	cont.style.display = "none";
  }
}