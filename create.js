"use strict";

$(document).ready( () =>{
    console.log("test3");
    //handle submit event on email form
    $("#createForm").submit( (event) =>{
        //retrieve values
        const toyCode = $("#toyCode").val(); //val() is a getter
        const toyName = $("#toyName").val(); 
        const description = $("#description").val(); 
        const price = $("#price").val(); 
        let isValid = true;

        //validate toyCode 
        if(toyCode === ""){
            $("#toyCode").next("This field is required.");
            isValid = false;
        } else if(strlen(toyCode) < 4) {
            $("#toyCode").next("Field must be greater then 4 characters.");
            isValid = false;
        } else if(strlen(toyCode) > 10){
            $("#toyCode").next("Field must be less then 10 characters.");
            isValid = false;
        } else {
            $("#toyCode").next().text("");
        }

        //validate toyName 
        if(toyName === ""){
            $("#toyName").next("This field is required.");
            isValid = false;
        } else if(strlen(toyName) < 10) {
            $("#toyName").next("Field must be greater then 10 characters.");
            isValid = false;
        } else if(strlen(toyName) > 100){
            $("#toyName").next("Field must be less then 100 characters.");
            isValid = false;
        } else {
            $("#toyName").next().text("");
        }

        //validate description 
        if(description === ""){
            $("#description").next("This field is required.");
            isValid = false;
        } else if(strlen(description) < 10) {
            $("#description").next("Field must be greater then 10 characters.");
            isValid = false;
        } else if(strlen(description) > 255){
            $("#description").next("Field must be less then 255 characters.");
            isValid = false;
        } else {
            $("#description").next().text("");
        }

        //validate price 
        if(price === ""){
            $("#price").next("This field is required.");
            isValid = false;
        } else if(price <= 0) {
            $("#price").next("Field must be greater than zero.");
            isValid = false;
        } else if(price > 100000){
            $("#price").next("Field must be less then 100,000$");
            isValid = false;
        } else {
            $("#price").next().text("");
        }
        //submit the form only if all form entries are valid (isValid = true)
        if(isValid){
            $("#createForm").submit();
        } else {
            event.preventDefault();
            console.log("please work");
        }
    });
    
    //handle click on reset button
    $("#reset_button").click( () => {
        //clear text box
        $("#toyCode").val("");
        $("#toyCode").next().text("*");
        $("#toyName").val("");
        $("#toyName").next().text("*");
        $("#description").val("");
        $("#description").next().text("*");
        $("#price").val("");
        $("#price").next().text("*");
    });
});
