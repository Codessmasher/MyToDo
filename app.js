var btn=document.querySelectorAll('.btn');
    btn.forEach(b=> {
        b.addEventListener("click",()=>{
         if(b.value==="login"){
            window.location= "login.php";
         }
         if(b.value==="signup"){
            window.location= "signup.php";
         }
    });
})

// form validation for account creation
function invalid(){
    var pass=document.querySelector('#pass');
    var cpass=document.querySelector('#cpass');

    if(pass.value!=cpass.value){
        confirm("Your Password and Confirm Password is not same");
    }
    if(pass.value==""){
        var IsOk=confirm("Please Enter Username & Password");
        if(IsOk==true){
            window.location.replace="";
        }
    }
}

// logout user

function logout(){
    var logout=document.querySelector("logout");
    window.location.href="logout.php";
}

