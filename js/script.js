function changeView() {
    var signInPage = document.getElementById("signInPage");
    var signUpPage = document.getElementById("signUpPage");


    signInPage.classList.toggle("d-none")
    signUpPage.classList.toggle("d-none")


}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var check = document.getElementById("check");

    if (!check.checked) {
        alert("Please accept eCommerce terms of use & privacy policies");
        var f = document.getElementById('check-label');
        f.classList.add("text-danger");
        setTimeout(function() {
            f.classList.remove("text-danger");
        }, 3000)

    } else {

        var form = new FormData();

        form.append("fname", fname.value);
        form.append("lname", lname.value);
        form.append("email", email.value);
        form.append("password", password.value);
        form.append("mobile", mobile.value);
        form.append("gender", gender.value);
        form.append("check", check.value);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;
                if (text == "ok") {
                    fname.value = "";
                    lname.value = "";
                    email.value = "";
                    mobile.value = "";
                    password.value = "";
                    gender.value = "1";
                    check.checked = false;
                    changeView();
                } else {
                    var errMsg = document.getElementById("errMsg");
                    if (text == 1) {
                        errMsg.innerHTML = "Please enter your first name";
                        fname.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            fname.value = "";
                            fname.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 2) {
                        errMsg.innerHTML = "First name can have maximum 20 characters";
                        fname.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            fname.value = "";
                            fname.classList.remove("red-border")
                        }, 5000);

                    } else if (text == 3) {
                        errMsg.innerHTML = "Please enter your last name";
                        lname.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            lname.value = "";
                            lname.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 4) {
                        errMsg.innerHTML = "Last name can have maximum 20 characters";
                        lname.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            lname.value = "";
                            lname.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 5) {
                        errMsg.innerHTML = "Please enter your email Address";
                        email.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            email.value = "";
                            email.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 6) {
                        errMsg.innerHTML = "Email can have maximum 50 characters";
                        email.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            email.value = "";
                            email.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 7) {
                        errMsg.innerHTML = "Please enter a valid email address";
                        email.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            email.value = "";
                            email.classList.remove("red-border")
                        }, 4000);
                    } else if (text == 8) {
                        errMsg.innerHTML = "Please enter your password";
                        password.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            password.value = "";
                            password.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 9) {
                        errMsg.innerHTML = "Password can have maximum 20 characters";
                        password.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            password.value = "";
                            password.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 10) {
                        errMsg.innerHTML = "Password is not strong enough";
                        password.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            password.value = "";
                            password.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 11) {
                        errMsg.innerHTML = "Please enter your mobile number";
                        mobile.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            mobile.value = "";
                            mobile.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 12) {
                        errMsg.innerHTML = "Mobile number should be 10 characters long";
                        mobile.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            mobile.value = "";
                            mobile.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 13) {
                        errMsg.innerHTML = "Invalid mobile number";
                        mobile.classList.add("red-border")
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                            mobile.value = "";
                            mobile.classList.remove("red-border")
                        }, 5000);
                    } else if (text == 14) {
                        errMsg.innerHTML = "Please accept eCommerce terms of use & privacy policies";
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                        }, 5000);
                    } else {
                        errMsg.innerHTML = text;
                        setTimeout(function() {
                            errMsg.innerHTML = "";
                        }, 5000);
                    }
                }
            }
        }
        r.open("POST", "../hunsTextiles/signUpProcess.php", true);
        r.send(form);
    }
}


function checking() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    if (fname.value == "" || lname.value == "" || email.value == "" || password.value == "" || mobile.value == "") {
        document.getElementById("signupBtn").setAttribute("disabled", "")
    } else {
        document.getElementById("signupBtn").removeAttribute("disabled", "")
    }
}

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var remember = document.getElementById("remember");
    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("remember", remember.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                window.location = "index.php";

            } else {
                var err = document.getElementById("msg2");
                err.innerHTML = text;
                setTimeout(function() {
                    err.innerHTML = "";
                    password.value = "";
                    email.value = "";
                }, 5000);
            }
        }
    }
    r.open("POST", "signInProcess.php", true);
    r.send(form);
}

var md;

function forgotPassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        var spinner = document.getElementById("customSpinner");
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 'success') {
                spinner.style.display = "none";
                swal("Check your Inbox!", "We've sent a verification code to your inbox!", "success");
                setTimeout(function() {
                    var model = document.getElementById("forgotPasswordModel");
                    md = new bootstrap.Modal(model);
                    md.show()
                }, 3000);
            } else {
                alert(text);
            }
        } else {

            spinner.style.display = "flex";
        }
    }
    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

var md2;

function resetPassword() {
    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var cnp = document.getElementById("cnp");
    var vc = document.getElementById("vc");

    var form = new FormData();

    form.append("e", email.value);
    form.append("np", np.value);
    form.append("cnp", cnp.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 'success') {
                md.hide();
                swal("Your password reset successfull!", "Sign In with your new password!", "success");
                setTimeout(function() {
                    var modal = document.getElementById("modelPassword2");
                    md2 = new bootstrap.Modal(modal);
                    md2.show()
                }, 2000);

            } else {
                alert(text);
            }
        }
    }

    r.open("POST", "resetPasswordProcess.php", true);
    r.send(form);

}


function togglePassword1() {
    var np = document.getElementById("np");
    var npbtn = document.getElementById("npbtn");

    if (np.type == "password") {
        np.type = "text";
        npbtn.innerHTML = "Hide";
    } else {
        np.type = "password";
        npbtn.innerHTML = "Show";
    }
}

function togglePassword2() {
    if (cnp.type == "password") {
        cnp.type = "text";
        cnpbtn.innerHTML = "Hide";
    } else {
        cnp.type = "password";
        cnpbtn.innerHTML = "Show";
    }
}

function togglePassword3() {
    if (password3.type == "password") {
        password3.type = "text";
        pbtn3.innerHTML = "Hide";
    } else {
        password3.type = "password";
        pbtn3.innerHTML = "Show";
    }
}

function signInModal() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password3");
    var remember = document.getElementById("remember");
    var form = new FormData();

    form.append("email", email.value);
    form.append("password", password.value);
    form.append("remember", remember.checked);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                md2.hide()
                window.location = "home.php";

            } else {
                var err = document.getElementById("msg2");
                err.innerHTML = text;
                setTimeout(function() {
                    err.innerHTML = "";
                    password.value = "";
                    email.value = "";
                }, 5000);
            }
        }
    }
    r.open("POST", "signInProcess.php", true);
    r.send(form);
}