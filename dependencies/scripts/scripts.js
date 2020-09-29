<script>
//ORGANIZATION CHART
function openForm() {
  document.getElementById("oc-form").style.display = "block";
}
function closeForm() {
  document.getElementById("oc-form").style.display = "none";
}


//CLAIM APPROVAL 
function formDialog($claim_id){
	$("#send-to").val($claim_id);
    $("#approvalForm")
	var dlgbg = document.getElementById("dialog-background");
            var dlg = document.getElementById("dialog-box");
            dlgbg.style.display = "block";
            dlg.style.display = "block";

            var winWidth = window.innerWidth;
            var winHeight = window.innerHeight;

            dlg.style.left = (winWidth/2) - 350 + "px";
            dlg.style.top = "150px";
}

//LEAVE APPROVAL
function formDialog($leave_id){
    $("#send-to").val($leave_id);
    $("#approvalForm")
    var dlgbg = document.getElementById("dialog-background");
            var dlg = document.getElementById("dialog-box");
            dlgbg.style.display = "block";
            dlg.style.display = "block";

            var winWidth = window.innerWidth;
            var winHeight = window.innerHeight;

            dlg.style.left = (winWidth/2) - 350 + "px";
            dlg.style.top = "150px";
}

//SEARCH
function searchTable(){
    var input, filter, table, tr, th, td, tds, i, j, txtValue;
    input = document.getElementById("search-input");
    filter = input.value.toUpperCase();
    table = document.getElementById("data-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        tds = tr[i].querySelectorAll("td");
        if (tds.length) {
            txtValue = tr[i].innerText.trim();

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}



//AMOUNT 
function setTwoNumberDecimal(event) {
    this.value = parseFloat(this.value).toFixed(2);
}


//CLAIM TYPE
var select = document.getElementById('select');
var txt = document.getElementById('txt');
var tmt = document.getElementById('tmt');
select.onchange = function() {
  var selected = select.options[select.selectedIndex].text;
  if (selected == "Others") {
    txt.style.display = "block";
  } else {
    txt.style.display = "none";
  }
  
  if (selected == "Mileage") {
    tmt.style.display = "block";
  } else {
    tmt.style.display = "none";
  }
}

</script>