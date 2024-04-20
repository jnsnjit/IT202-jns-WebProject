console.log("also testing");

$(document).ready( () => {
    console.log("also testing");
    $("#delete_form").submit( (event) => {
        $t = window.confirm("Are you sure you want to delete?")
        if($t){
            $("#delete_form").submit();
        }else{
            event.preventDefault();
        }
    });
})