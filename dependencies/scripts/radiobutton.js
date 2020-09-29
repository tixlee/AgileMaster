function bgRbToggle(section, val) {
    var inputID = "bg-input-" + section;
    var input = document.getElementById(inputID);
    if(val == "yes") {
        input.style.display = "inline-block";
        input.required = true;
    } else if (val == "no") {
        input.style.display = "none";
        input.required = false;
    }
}