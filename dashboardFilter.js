let all_filter = document.getElementById('all-filter-button');
let sales_filter = document.getElementById('sales-leads-button');
let support_filter = document.getElementById('support-button');
let my_assigned_filter = document.getElementById('assigned-to-me-button');

let resultDiv = document.getElementById('results');

let body = document.getElementsByTagName('body');


let home = document.getElementById('home-icon');

all_filter.addEventListener('click', () => {
    fetch("dashboardFilter.php?filter=all")
    .then((response)=>{
        if(response.ok){
            return response.text();
        }else{
            return Promise.reject("An error has occured");
        }
    })
    .then((data)=>{
        resultDiv.innerHTML = data;
    })
    .catch((error)=>{
        console.log("Sorry an error has occured: " + error);
    })
});

sales_filter.addEventListener('click', () => {
    fetch("dashboardFilter.php?filter=salesperson")
    .then((response)=>{
        if(response.ok){
            return response.text();
        }else{
            return Promise.reject("An error has occured");
        }
    })
    .then((data)=>{
        resultDiv.innerHTML = data;
    })
    .catch((error)=>{
        console.log("Sorry an error has occured: " + error);
    })
});

support_filter.addEventListener('click', () => {
    fetch("dashboardFilter.php?filter=support")
    .then((response)=>{
        if(response.ok){
            return response.text();
        }else{
            return Promise.reject("An error has occured");
        }
    })
    .then((data)=>{
        resultDiv.innerHTML = data;
    })
    .catch((error)=>{
        console.log("Sorry an error has occured: " + error);
    })
});

my_assigned_filter.addEventListener('click', () => {
    fetch("dashboardFilter.php?filter=my_assigned")
    .then((response)=>{
        if(response.ok){
            return response.text();
        }else{
            return Promise.reject("An error has occured");
        }
    })
    .then((data)=>{
        resultDiv.innerHTML = data;
    })
    .catch((error)=>{
        console.log("Sorry an error has occured: " + error);
    })
});

home.addEventListener('click', () => {
    fetch("dashboardFilter.php")
    .then((response)=>{
        if(response.ok){
            return response.text();
        }else{
            return Promise.reject("An error has occured");
        }
    })
    .then((data)=>{
        resultDiv.innerHTML = data;
    })
    .catch((error)=>{
        console.log("Sorry an error has occured: " + error);
    })
});
