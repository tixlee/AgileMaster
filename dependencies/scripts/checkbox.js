var cbAddress = document.getElementById("diff_address");
if(cbAddress != null){
    var caAddress = document.getElementById("ca-address-section");
        cbAddress.onchange = function(){
            if(cbAddress.checked == true){
                caAddress.style.display  = "block";
            } else {
                caAddress.style.display  = "none";
            }
        }
}