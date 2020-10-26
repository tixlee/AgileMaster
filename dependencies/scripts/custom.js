$( document ).ready(function() {
    console.log( "ready!" );
    $( ".changeStatus option" ).click(function(e) {
        console.log(this.value);
        console.log($(this).value);
    });
});