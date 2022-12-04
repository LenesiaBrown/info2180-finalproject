var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

window.onload = function(){
    logging();
}

function logging(){
    
    let logoutBtn = document.querySelectorAll(".navButton:last-child");
    console.log(logoutBtn);

    logoutBtn[0].addEventListener('click', function(){
       
        window.location.href = "logout.php";
        });
 
}