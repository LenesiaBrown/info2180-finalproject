document.addEventListener('DOMContentLoaded',function(){
    var btn = document.getElementById("save");
    btn.addEventListener('click',function(e){
        e.preventDefault();
        if (document.getElementById("text_area").value == ""){
            swal({icon: "warning", title: "Fail!", text: "The comment section is empty!"});
            document.getElementById("text_area").focus();
        }
        else{
            $.ajax({type: "POST", url= "addnote.php", data: {view: $("#assign").val(), comment:$("#area").val()}})
            
            var contact =document.getElementById("assign").value;
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET","note.php?updated="+contact,false);
            response = xhttp.responseText;
            document.getElementsById("result").innerHTML =response;
        }
    })
});