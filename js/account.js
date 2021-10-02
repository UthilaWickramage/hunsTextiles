var md;

function editProfileModal() {
    var modal = document.getElementById("editAccount");
    md = new bootstrap.Modal(modal);
    md.show()
}

var md2;


function editAddressModal() {
    var modal = document.getElementById("editaddress");
    md2 = new bootstrap.Modal(modal);
    md2.show()
}

var md3;

function manageOrderModal() {
    var modal = document.getElementById("manageOrderModal");
    md3 = new bootstrap.Modal(modal);
    md3.show()
}

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");

    var form = new FormData();

    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("mobile", mobile.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {


                swal({
                    title: "Successful!",
                    text: "Your Profile Updated",
                    icon: "success",
                    button: "Aww yiss!",
                });
            } else {
                document.getElementById("modalErr").innerHTML = text;
            }

        }
    }
    r.open("POST", "updateAccount.php", true);
    r.send(form);
}