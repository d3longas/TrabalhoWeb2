const $html = document.querySelector('html')
var dark = document.getElementById("dark");
function myFunction(){
    $html.classList.toggle('dark-mode');
    if(document.getElementById("dark").innerHTML == "☀️"){
        document.getElementById("dark").innerHTML = "🌙";
    }else{
        document.getElementById("dark").innerHTML = "☀️";
    }
}
