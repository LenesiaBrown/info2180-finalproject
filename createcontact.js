document.addEventListener('DOMContentLoaded', function(){
    var btn = document.getElementById("save");
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    btn.addEventListener('click', function(e){
        e.preventDefault();
        if(document.getElementById("Fname").value == ""){
            swal({icon: "warning", title: "Fail!", text: "First name is required!" });
            document.getElementById("Fname").focus();
        }
        else if (document.getElementById("Lname").value== ""){
            swal({icon: "warning", title: "Fail!", text: "Last name is required!" }); 
            document.getElementById("Lname").focus();
        }
        if(document.getElementById("email").value == ""){
            swal({icon: "warning", title: "Fail!", text: "Email is required!" });
            document.getElementById("email").focus();
        }
        else if((document.getElementById("email").value) != mailformat){
            swal({icon: "warning", title: "Fail!", text: "Enter a vaild email address!" });
            document.getElementById("email").focus();
        }
        else if (document.getElementById("telephone").value == ""){
            swal({icon: "warning", title: "Fail!", text: "Telephone number is required!" });
            document.getElementById("telephone").focus();
        }
        else if ((/^0-9]{3}-[0-9]{3}-[0-9]{4}/.test(document.getElementById("telephone").value == "")) == false){
            swal({icon: "warning", title: "Fail!", text: "Telephone number must be in the format: XXX-XXX-XXXX!" });
            document.getElementById("telephone").focus();
        }
        else if(document.getElementById("company").value == ""){
            swal({icon: "warning", title: "Fail!", text: "Company name is required!" });
            document.getElementById("company").focus();
        }
        else{
            $.ajax({
                type: "POST",
                url: "createcontact.php",
                data: {
                    title: $("#title").val(),
                    Fname: $("#Fname").val(),
                    Lname: $("#Lname").val(),
                    email: $("#email").val(),
                    telephone: $("#telephone").val(),
                    company: $("#company").val(),
                    type: $("#type").val(),
                    assignedto: $("#assignedto").val(),
                },
                success: function(output){
                    if(output=="Saved"){
                        swal({icon: "success", title: "Saved!", text: "Contact Saved!" });
                    }
                    else if (output=="Error"){
                        swal({icon: "warning", title: "Fail!", text: "Email is already registered!" });
                    }
                }
            })
        }
    });
})