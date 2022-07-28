// Hide and Show
$(document).ready(function() {
    // hide table
    $("table").hide();
    // set button to hide table
    $("#hide").click(function() {
        $("table").hide();
    });
    // set button to show table
    $("#show").click(function() {
        $("table").show();
    });
    $(".checkbox").change(function() {
        if (this.checked) {
            //How to save it into todolist db
            console.log("it is save now");
        }
    });
});