document.addEventListener('DOMContentLoaded',function(){
    var btn = document.getElementById("save");
    btn.addEventListener('onclick',function(e){
        e.preventDefault();
        if (document.getElementById("area").value == ""){
            swal({icon: "warning", title: "Fail!", text: "The comment section is empty!"});
            document.getElementById("area").focus();
        }
        else{
            $.ajax({type: "POST", url: "addnote.php", data: {view: $("#assign").val(), comment:$("#area").val()}})
            
            var contact =document.getElementById('assign').value;
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET","note.php?updated="+contact,false);
            response = xhttp.responseText;
            document.getElementById("result2").innerHTML =response;
        }
    })
});