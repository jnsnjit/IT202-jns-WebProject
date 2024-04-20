let domain = "/jns/git/IT202-jns-WebProject/";
let params = new URLSearchParams(location.search);
//console.log(params.get('toy_code'));

var toyCode = params.get('toy_code');
// Create an XMLHttpRequest object
var xhr = new XMLHttpRequest();
// Open the request and set the method to GET
xhr.open("GET", "toyProducts_details.php", true);
// Send the request and pass the variable as data
xhr.send();