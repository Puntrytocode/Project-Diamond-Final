//JS

document.querySelector('.hamburger').addEventListener('click', function() {
    document.querySelector('.menu').classList.toggle('show');
});

let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");


eyeicon.onclick = function(){
    if(password.type == "password"){
        password.type = "text";
        eyeicon.src = "eye-open.png"
    }else{
        password.type = "password";
        eyeicon.src = "eye-close.png";
    }
}

let eyeicons = document.getElementById("eyeicons");
let passwords = document.getElementById("passwords");

eyeicons.onclick = function(){
    if(passwords.type == "password"){
        passwords.type = "text";
        eyeicons.src = "eye-open.png"
    }else{
        passwords.type = "password";
        eyeicons.src = "eye-close.png";
    }
}


// let expand = document.getElementsByClassName("menu")[0];
// let open = false;

// function openExpand() {
//     open = !open;
//     if(open){
//         expand.setAttribute('class','menu expand');
//     }else{
//         expand.setAttribute('class','menu collapse');
//     }
// }