// LEAVE PERIOD

var select = document.getElementById('select');
var dys = document.getElementById('dys');
var hrs = document.getElementById('hrs');
select.onchange = function(){
    if(select.value == "Full Day")
    {
  	    dys.style.display = "block";
    } 
    else 
    {
  	    dys.style.display = "none";
    }

    if(select.value == "Half Day")
    {
        hrs.style.display = "block";
    } 
    else 
    {
        hrs.style.display = "none";
    }
}

