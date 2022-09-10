var btn = document.querySelectorAll('.btn');
btn.forEach(b => {
    b.addEventListener("click", () => {
        if (b.value === "login") {
            window.location = "./user/account/login.php";
        }
        if (b.value === "signup") {
            window.location = "./user/account/signup.php";
        }
    });
})

// form validation for account creation
function invalid() {
    var pass = document.querySelector('#pass');
    var cpass = document.querySelector('#cpass');

    if (pass.value != cpass.value) {
        confirm("Your Password and Confirm Password is not same");
    }
    if (pass.value == "") {
        confirm("Please Enter Username & Password");
    }
}

// logout user

function logout() {
    let ok = confirm('Your Notes Will Miss You ? Still Logout ?');
    if (ok == true) {
        window.location.assign('../account/logout.php');
    }

}

{/* <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> */}
