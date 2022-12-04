window.onload = function () {
    var submitBtn = document.querySelector("#submit-btn");
    var errorMessage = document.querySelector("#message");
    var form = document.querySelector("#form");
    console.log(errorMessage);
    submitBtn.addEventListener('click', function (element) {
      var validationFailed = false;
  
      var firstname = document.querySelector('#fname');
      var lastname = document.querySelector('#lname');
      var email = document.querySelector('#email');
      var website = document.querySelector('#password');
  
      // clear any previous error messages
      clearErrors();
  
      if (isEmpty(firstname.value.trim())) {
        validationFailed = false;
        displayErrorMessage(firstname, "You must fill in your First Name");
      }
  
      else if (isEmpty(lastname.value.trim())) {
        validationFailed = true;
        displayErrorMessage(lastname, "You must fill in your Last Name");
      }
      
      else if (!isValidEmail(email.value.trim())) {
        validationFailed = true;
        displayErrorMessage(email, "Incorrect format for email address.");
      }
  
      else if (!isValidPassword(password.value.trim())) {
        validationFailed = true;
        displayErrorMessage(password, "Password must have at least 8 characters, one number and one capital letter..\n");
      };
  
  
      if (validationFailed) {
        console.log('Please fix issues in Form submission and try again.');
        element.preventDefault();
      }
      else{
        //sendDetails("http://localhost/info2180-project2/newUser.php");
      }
    });
  
  
  function isEmpty(elementValue) {
    if (elementValue.length == 0) {
      return true;
    }
  
    return false;
  }
  
  /**
   * Check if a valid telephone number was entered.
   */
  function isValidPassword(password) {
    return /[A-Z]/.test(password) && /[A-Z]/.test(password) && password.length > 7;
  }
  
  /**
   * Check if a valid email address was entered.
   */
  function isValidEmail(emailAddress) {
    return /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/.test(emailAddress);
  }
  

  function clearErrors() {
    errorMessage.innerHTML = "";
    }
  
  
  /**
   * Display error message next to field.
   */
  function displayErrorMessage(formField, message) {
    errorMessage.innerHTML = message;
  }

  function sendDetails(url){
    let request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if (request.readyState === XMLHttpRequest.DONE){
            if (request.status === 200){
               // errorMessage.innerHTML  = request.responseText; //form refreshes so this isnt displayed
            }
        }
    }
    request.open("POST", url);
    request.send();   
}
};