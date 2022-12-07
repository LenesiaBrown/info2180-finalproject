document.addEventListener('DOMContentLoaded',function(){
    var btn = document.getElementById("save");
    btn.addEventListener('click',function(e){
        e.preventDefault();
        var contact =document.getElementById('assign').value;
        var xmhttp = new XMLHttpRequest();
        xmhttp.open("GET", "note.php?to-me="+contact, false);
        xmhttp.send();
        response = xmhttp.responseText;
        document.getElementById("result").innerHTML =response;

        var xmhttp = new XMLHttpRequest();
        xmhttp.open("GET", "note.php?to-me="+contact, false);
        xmhttp.send();
        response = xmhttp.responseText;
        document.getElementById("result1").innerHTML =response;
    });
    var btn = document.getElementById("sales");
    btn.addEventListener('click',function(e){
        e.preventDefault();
        var type =document.getElementById('sales').value;
        var xmhttp = new XMLHttpRequest();
        xmhttp.open("GET", "note.php?type="+type, false);
        xmhttp.send();
        response = xmhttp.responseText;
        document.getElementById("result1").innerHTML =response;
        
        var xmhttp = new XMLHttpRequest();
        xmhttp.open("GET", "note.php?type="+type, false);
        xmhttp.send();
        response = xmhttp.responseText;
        document.getElementById("result1").innerHTML =response;
    });
})
