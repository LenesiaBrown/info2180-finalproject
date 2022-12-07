window.onload = function(){
    var saveNoteBtn = document.querySelector("#save-note");
    var contactId = saveNoteBtn.getAttribute("itemid");
    var newNote = document.querySelector("#new-note");
    saveNoteBtn.addEventListener('click', ()=>{
        if (newNote.value.trim() != ""){
            var url = "http://localhost/info2180-project2/saveNote.php?id=" + contactId + "&userId=" + "&comment=" + newNote.value.trim();
            sendNote(url);
        }
        else{
            document.querySelector("#error-msg").innerHTML = "Please enter a note";
        }
    });

    function sendNote(url){
    request = new XMLHttpRequest();
        request.onreadystatechange = function(){
            if (request.readyState == XMLHttpRequest.DONE){
                if (request.status == 200){
                    document.querySelector("#error-msg").innerHTML = request.responseText;
                    newNote.value = "";
                }
            }
        }
        request.open("GET", url);
        request.send();
    }
}