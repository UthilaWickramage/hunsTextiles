var md;

function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");
    var evc = document.getElementById("evc");

    var form = new FormData();

    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);
    form.append("evc", evc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                password.value = "";
                gender.value = "1";
                changeView();
                md.hide()
            } else {
                var msg = document.getElementById("msg");
                msg.innerHTML = text;
            }
        }
    };
    r.open("POST", "signupProcess.php", true);
    r.send(form);
}

function VerifyEmail() {
    var email = document.getElementById("email").value;
    var spinner = document.getElementById("customSpinner");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                spinner.style.display = "none";
                swal({
                    title: "Check Your Inbox!",
                    text: "We've sent a verification code to your inbox,please check your email",
                    icon: "success",
                    button: "Aww yiss!",
                });
                var model = document.getElementById("ConfirmEmailModel");
                md = new bootstrap.Modal(model);
                md.show();

            } else {
                swal({
                    title: "Oops!",
                    text: "Error Occured When Sending Email",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        } else {
            spinner.style.display = "flex";
        }
    }
    r.open("GET", "verifyEmailProcess.php?e=" + email, true);
    r.send();
}

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
            if (text == "success") {
                window.location = "home.php";
            } else {
                var err = document.getElementById("msg2");
                err.innerHTML = text;
            }
        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(form);
}


function forgotPassword() {
    email = document.getElementById("email2");
    var spinner = document.getElementById("customSpinner");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {

                spinner.style.display = "none";
                swal({
                    title: "Check Your Inbox!",
                    text: "We've sent a verification code to your inbox,please check your email",
                    icon: "success",
                    button: "Aww yiss!",
                });
                var model = document.getElementById("forgotPasswordModel");
                md = new bootstrap.Modal(model);
                md.show();

            } else {
                swal({
                    title: "Oops!",
                    text: "Error Occured When Sending Email",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        } else {
            spinner.style.display = "flex";
        }
        // if (r.readyState == 4) {
        //     var text = r.responseText;
        //     if (text == 'success') {
        //         spinner.style.display = "none";
        //         swal("Check your Inbox!", "We've sent the verification code to your inbox!", "success");
        //         setTimeout(function() {
        //             var adminVerification = document.getElementById("adminVerificationModal");
        //             k = new bootstrap.Modal(adminVerification);
        //             k.show()
        //         }, 3000);
        //         swal({
        //             title: "Check Your Inbox!",
        //             text: "We've sent a verification code to your inbox,please check your email",
        //             icon: "success",
        //             button: "Aww yiss!",
        //         });
        //         var model = document.getElementById("forgotPasswordModel");
        //         md = new bootstrap.Modal(model);
        //         md.show();
        //     } else {
        //         alert(text);
        //     }
        // }
    };
    r.open("GET", "forgotPasswordProcess.php?email=" + email.value, true);
    r.send();
}

function togglePassword() {
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var npbtn = document.getElementById("npbtn");
    var rnpbtn = document.getElementById("rnpbtn");

    if (npbtn.innerHTML == "Show") {
        np.type = "text";
        npbtn.innerHTML = "Hide";
    } else {
        np.type = "password";
        npbtn.innerHTML = "Show";
    }

    if (rnpbtn.innerHTML == "Show") {
        rnp.type = "text";
        rnpbtn.innerHTML = "Hide";
    } else {
        rnp.type = "password";
        rnpbtn.innerHTML = "Show";
    }
}


function resetPassword() {
    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");



    var form = new FormData();

    form.append("email", email.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 'success') {
                swal({
                    title: "Check Your Inbox!",
                    text: "We've sent a verification code to your inbox,please check your email",
                    icon: "success",
                    button: "Aww yiss!",
                });
                md.hide();

            } else {
                alert(text);
            }
        }
    }
    r.open("POST", "resetPassword.php", true);
    r.send(form)
}

function goToAddProduct() {
    window.location = "addProduct.php";
}

function changeImg() {
    var image = document.getElementById("imageUploader");
    var view = document.getElementById("prev");



    image.onchange = function() {
        var file = this.files[0];

        var url = window.URL.createObjectURL(file);


        view.src = url;


    }
}

function addProduct() {
    var category = document.getElementById("ca");
    var sub_category = document.getElementById("su_ca");
    var brand = document.getElementById("br");
    var title = document.getElementById("title");
    var color = document.getElementById("color");
    var sizeselect = document.getElementById("sizeselect");
    var sku = document.getElementById("sku")
    var qty = document.getElementById("qty");
    var price = document.getElementById("pr");
    var delivery_within_colombo = document.getElementById("cwc");
    var delivery_outside_colombo = document.getElementById("coc");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageUploader");




    var form = new FormData();

    form.append("c", category.value);
    form.append("b", brand.value)
    form.append("sc", sub_category.value)
    form.append("t", title.value)
    form.append("size", sizeselect.value)
    form.append("sku", sku.value)
    form.append("col", color.value)
    form.append("qty", qty.value)
    form.append("pr", price.value)
    form.append("dwc", delivery_within_colombo.value)
    form.append("doc", delivery_outside_colombo.value)
    form.append("d", desc.value)
    form.append("img", image.files[0]);




    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                swal({
                    title: "Successful!",
                    text: "You've Successfully Add a Product",
                    icon: "success",
                    button: "Aww yiss!",
                });
            } else {
                alert(text)
            }
        }
    }
    r.open("POST", "addProductProcess.php", true);
    r.send(form);


}


function SignOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                window.location = "home.php";
            }
        }
    }
    r.open("GET", "signout.php", true);
    r.send();
}

function changeProductView() {
    var addProductBox = document.getElementById("addProductBox");
    var updateProductBox = document.getElementById("updateProductBox");


    addProductBox.classList.toggle("d-none");
    updateProductBox.classList.toggle("d-none");
}

function updateProfile() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var mobile = document.getElementById("mobile").value;
    var no = document.getElementById("no").value;
    // var line1 = document.getElementById("line1").value;
    // var line2 = document.getElementById("line2").value;
    // var city = document.getElementById("city").value;
    // var district = document.getElementById("district").value;
    // var province = document.getElementById("province").value;
    // var pos = document.getElementById("postal").value;
    // var profile_img = document.getElementById("profileimg");

    var form = new FormData();

    form.append("f", fname);
    form.append("l", lname);
    form.append("m", mobile);
    // form.append("n", no);
    // form.append("l1", line1);
    // form.append("l2", line2);
    // form.append("c", city);
    // form.append("d", district);
    // form.append("p", province);
    // form.append("pos", pos);
    // form.append("i", profile_img.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                md.hide()
                swal("Congratulations!", "You successfully updated your details!", "success");
                // window.location.reload();
            } else {
                alert(text);
            }

        }

    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(form);



}

function updateAddress() {

    var no = document.getElementById("no").value;
    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var city = document.getElementById("city").value;



    var form = new FormData();


    form.append("n", no);
    form.append("l1", line1);
    form.append("l2", line2);
    form.append("c", city);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                md.hide()
                swal("Congratulations!", "You successfully updated your details!", "success");
                // window.location.reload();
            } else {
                alert(text);
            }

        }

    }

    r.open("POST", "updateAddressProcess.php", true);
    r.send(form);


}

function addAddress() {

    var no = document.getElementById("no").value;
    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var city = document.getElementById("city").value;



    var form = new FormData();


    form.append("n", no);
    form.append("l1", line1);
    form.append("l2", line2);
    form.append("c", city);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            md.hide()
            swal("Congratulations!", "You successfully updated your details!", "success");
            // window.location.reload();


        }

    }

    r.open("POST", "addAddressProcess.php", true);
    r.send(form);


}

function changeStatus(id) {
    var productid = id;
    var statuslabel = document.getElementById("checklabel" + productid);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "deactive") {
                statuslabel.innerHTML = "Make your product Active"
            } else if ("active") {
                statuslabel.innerHTML = "Make your product Deactive"
            }
        }
    }
    r.open("GET", "statusChangeProcess.php?p=" + productid, true);
    r.send();
}

function deleteModal(id) {
    var dm = document.getElementById("deleteModal" + id);
    k = new bootstrap.Modal(dm);
    k.show();
}

function deleteproduct(id) {
    var productid = id;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text)
            if (text == "success") {

                k.hide();
            } else {
                swal({
                    title: "Error!",
                    text: "You cannot delete this product",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        }
    }
    r.open("GET", "deleteProductProcess.php?id=" + productid, true);
    r.send();
}

function addFilters(page) {
    var search = document.getElementById("s");

    var age;
    if (document.getElementById("n").checked) {
        age = 1;
    } else if (document.getElementById("o").checked) {
        age = 2;
    } else {
        age = 0;
    }

    var qty;
    if (document.getElementById("l").checked) {
        qty = 1;
    } else if (document.getElementById("h").checked) {
        qty = 2;
    } else {
        qty = 0;
    }

    var condition;
    if (document.getElementById("b").checked) {
        condition = 1;
    } else if (document.getElementById("u").checked) {
        condition = 2;
    } else {
        condition = 0;
    }

    var form = new FormData();
    form.append("s", search.value);
    form.append("a", age);
    form.append("q", qty)
    form.append("c", condition);
    form.append("page", page)

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            var productsRow = document.getElementById("productsRow");

            productsRow.innerHTML = text

        }
    }
    r.open("POST", "filterProcess.php", true);
    r.send(form);
}





function updateProduct(id) {
    var title = document.getElementById("utitle" + id).value;
    var qty = document.getElementById("uqty" + id).value;
    var cwc = document.getElementById("ucwc" + id).value;
    var coc = document.getElementById("ucoc" + id).value;
    var desc = document.getElementById("udesc" + id).value;


    var form = new FormData();

    form.append("pid", id)
    form.append("title", title)
    form.append("qty", qty)
    form.append("cwc", cwc)
    form.append("coc", coc)
    form.append("desc", desc)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "1") {
                swal("Congratulations!", "You successfully updated your details!", "success");
                md.hide()
            } else {
                swal("Oops!", "No Such a Product!", "error");
            }

        }
    }
    r.open("POST", "updateProductProcess.php", true)
    r.send(form);
}

function loadMainImg(id) {
    var pid = id;
    var img = document.getElementById("pimg" + pid).src;


    var mainImg = document.getElementById("mainimg");

    mainImg.style.backgroundImage = "url(" + img + ")"


}

function qty_inc(qty) {
    var input = document.getElementById("qtyinput");

    if (input.value < qty) {
        newvalue = parseInt(input.value) + 1;

        input.value = newvalue.toString();
    } else {
        swal({
            title: "Error!",
            text: "You ve reached maximum capacity",
            icon: "error",
            button: "Sorry!",
        });
    }



}

function qty_dec() {
    var input = document.getElementById("qtyinput");

    if (input.value > 1) {
        newvalue = parseInt(input.value) - 1;

        input.value = newvalue.toString();
    } else {
        swal({
            title: "Error!",
            text: "You ve reached maximum capacity",
            icon: "error",
            button: "Sorry!",
        });
    }


}



function basicSearch(page) {

    var textSearch = document.getElementById("basicSearchTxt").value;
    var catSelect = document.getElementById("basicSearchSelect").value;
    var productBox = document.getElementById("productDetails");


    var form = new FormData();

    form.append("txt", textSearch);
    form.append("select", catSelect);
    form.append("page", page);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var text = r.responseText;
            if (text == "1") {
                window.location.reload();
            } else {
                productBox.innerHTML = " "
                productBox.innerHTML = text;
            }


        }

    }
    r.open("POST", "basicSearchProcess.php", true);
    r.send(form);
}

function addToWishlist(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "watchList.php";
            } else {
                window.location = "index.php";
            }
        }
    }
    r.open("GET", "addToWatchListProcess.php?id=" + id, true);
    r.send();
}


function deleteFromWatchList(id) {
    var wid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {

                window.location = "watchList.php";
            }

        }
    }

    r.open("GET", "removeWatchListItemProcess.php?id=" + wid, true);
    r.send();
}

function gotoCart() {
    window.location = "cart.php";
}


function addToCart(id) {
    var qtytext = document.getElementById("sst").value;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "cart.php";
            } else if (text == "1") {
                window.location = "index.php";
            } else {
                alert(text)
            }
        }
    }
    r.open("GET", "addToCartProcess.php?id=" + id + "&txt=" + qtytext, true);
    r.send();
}

function deleteFromCart(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "cart.php";
            } else {
                window.location = "cart.php";
            }
        }
    }
    r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
    r.send();
}

// payment gateway .........alert......alert...alert...alert...alert.
function goToIndex() {
    window.location = "index.php";
}


function payNow(id) {

    var qty = document.getElementById("sst").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            var obj = JSON.parse(text);

            var email = obj["email"];
            var amount = obj["amount"];

            if (text == "1") {
                swal({
                    title: "Sign In First!",
                    text: "You Need to Sign In First",
                    icon: "error",
                    button: "Sorry!",
                });

            } else if (text == "2") {
                swal({
                    title: "Update your Address!",
                    text: "Update your address from the Your Profile Page",
                    icon: "error",
                    button: "Sorry!",
                });

            } else {
                //Called when user completed the payment.It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, id, amount, email, qty);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1218906", // Replace your Merchant ID
                    "return_url": "http://localhost/eshop/singleProductView.php?pid=" + id, // Important
                    "cancel_url": "http://localhost/eshop/singleProductView.php?pid=" + id, // Important
                    "notify_url": "http://sample.com/saveInvoice.php",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount + ".00",
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": email,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked

                payhere.startPayment(payment);

            }
        }
    }

    r.open("GET", "buynowProcess.php?id=" + id + "&qty=" + qty, true);
    r.send();

}

function saveInvoice(orderId, id, amount, email, qty) {

    var form = new FormData();

    form.append("oid", orderId);
    form.append("amount", amount);
    form.append("pid", id);
    form.append("email", email);
    form.append("qty", qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                window.location = "invoice.php?id=" + orderId;
            }
        }
    }
    r.open("POST", "saveInvoice.php", true);
    r.send(form);
}




function printDiv() {
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;

}

//feedback function
var k;

function addFeedBack(id) {
    var feedback = document.getElementById("feedbackModal" + id);
    k = new bootstrap.Modal(feedback);

    k.show();
}

function saveFeedback(id) {

    var feedtxt = document.getElementById("feedtext" + id);

    var r1 = document.getElementById("rate-1" + id);
    var r2 = document.getElementById("rate-2" + id);
    var r3 = document.getElementById("rate-3" + id);
    var r4 = document.getElementById("rate-4" + id);
    var r5 = document.getElementById("rate-5" + id);
    var r;
    if (r5.checked) {
        r = 1;
    } else if (r4.checked) {
        r = 2;
    } else if (r3.checked) {
        r = 3;
    } else if (r2.checked) {
        r = 4;
    } else if (r1.checked) {
        r = 5;

    }


    var form = new FormData();

    form.append("id", id);
    form.append("feed", feedtxt.value);
    form.append("rating", r);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                k.hide();
            } else if (text == "1") {
                window.location = "index.php";
            } else {
                swal({
                    title: "Oops!",
                    text: "Error Occured",
                    icon: "error",
                    button: "Sorry!",
                });
            }

        }
    }
    r.open("POST", "saveFeedBackProcess.php", true);
    r.send(form);
}

function bringFeedback(page) {



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            var cardBody = document.getElementById("card-body")
            cardBody.innerHTML = text
        }
    }
    r.open("POST", "adminFeedBackProcess.php?page=" + page, true);
    r.send();
}

function fullFeedbackModal(id) {
    var feedback = document.getElementById("afullFeedbackModal" + id);
    k = new bootstrap.Modal(feedback);

    k.show();
}

function bringComments(page) {



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            var cardBody = document.getElementById("card-body")
            cardBody.innerHTML = text
        }
    }
    r.open("POST", "adminCommentsProcess.php?page=" + page, true);
    r.send();
}

function replyCommentModal(id) {
    var comment = document.getElementById("areplyCommentModal" + id);
    k = new bootstrap.Modal(comment);

    k.show();
}

function saveReply(id) {

    var reply = document.getElementById("replytext" + id);

    var form = new FormData();

    form.append("cid", id);
    form.append("reply", reply.value);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                k.hide();
            } else {
                swal({
                    title: "Oops!",
                    text: "Error Occured",
                    icon: "error",
                    button: "Sorry!",
                });
            }

        }
    }
    r.open("POST", "saveReplyprocess.php", true);
    r.send(form);
}

function adminverification() {
    var email = document.getElementById("e").value;
    var spinner = document.getElementById("customSpinner");
    var form = new FormData();

    form.append("email", email)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {

                spinner.style.display = "none";
                swal("Check your Inbox!", "We've sent the verification code to your inbox!", "success");
                setTimeout(function() {
                    var adminVerification = document.getElementById("adminVerificationModal");
                    k = new bootstrap.Modal(adminVerification);
                    k.show()
                }, 3000);

            } else {
                swal({
                    title: "Oops!",
                    text: "Error Occured When Sending Email",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        } else {
            spinner.style.display = "flex";
        }
    }
    r.open("POST", "adminverificationprocess.php", true);
    r.send(form);
}

function verify() {
    var verifyAdmin = document.getElementById("v").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                k.hide();
                window.location = "adminpanel.php";
            } else {
                swal({
                    title: "Oops!",
                    text: "Incorrect Verification Code",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        }
    }

    r.open("GET", "adminVerifyProcess.php?vc=" + verifyAdmin, true);
    r.send();
}

function blockUser(email) {
    var blockbtn = document.getElementById("blockbtn" + email);
    var form = new FormData();

    form.append("e", email);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                blockbtn.className = "badge rounded-pill alert-danger";
                blockbtn.innerHTML = "Deactive";
            } else if (t == "success2") {
                blockbtn.className = "badge rounded-pill alert-success";
                blockbtn.innerHTML = "Active";
            } else {
                swal({
                    title: "Oops!",
                    text: "Unexpected Error",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        }
    }
    r.open("POST", "userblockProcess.php", true);
    r.send(form)
}


function searchUser() {
    var text = document.getElementById("searchtxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var userbox = document.getElementById("userbox");
            userbox.innerHTML = t;

        }
    }
    r.open("GET", "searchUserProcess.php?s=" + text, true);
    r.send();
}

function blockProduct(id) {
    var blockbtn = document.getElementById("blockbtn" + id);

    var form = new FormData();

    form.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                blockbtn.className = "badge rounded-pill alert-danger";
                blockbtn.innerHTML = "Deactive";
            } else if (t == "success2") {
                blockbtn.className = "badge rounded-pill alert-success";
                blockbtn.innerHTML = "Active";
            } else {
                swal({
                    title: "Oops!",
                    text: "Unexpected Error",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        }
    }
    r.open("POST", "blockproductsProcess.php", true);
    r.send(form)
}

function searchProducts() {
    var text = document.getElementById("searchtxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var productbox = document.getElementById("productbox");
            productbox.innerHTML = t;

        }
    }
    r.open("GET", "searchProductProcess.php?s=" + text, true);
    r.send();
}

function advanceSearch(page) {
    var keyword = document.getElementById("search").value;
    var category = document.getElementById("ca").value;
    var brand = document.getElementById("br").value;
    var model = document.getElementById("mo").value;
    var condition = document.getElementById("con").value;
    var color = document.getElementById("col").value;
    var pf = document.getElementById("pf").value;
    var pt = document.getElementById("pt").value;

    var form = new FormData();
    form.append("k", keyword);
    form.append("ca", category);
    form.append("br", brand);
    form.append("mo", model);
    form.append("con", condition);
    form.append("col", color);
    form.append("pf", pf);
    form.append("pt", pt);
    form.append("page", page)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var results = document.getElementById("results");
            results.innerHTML = t;
        }
    }
    r.open("POST", "advanceSearchProcess.php", true);
    r.send(form)

}

function viewSellings() {
    var from = document.getElementById("fromdate").value;
    var to = document.getElementById("todate").value;
    var link = document.getElementById("historylink");

    link.href = "managesellinghistory.php?f=" + from + "&t=" + to;



}

function viewMessageModal() {

    var msg = document.getElementById("msgModal");
    k = new bootstrap.Modal(msg);

    k.show();


}

function addnewModal() {
    var addca = document.getElementById("addnewModal");
    k = new bootstrap.Modal(addca);

    k.show();



}


function singleViewModal(id) {
    var singleView = document.getElementById("asingleProductViewModal" + id);
    k = new bootstrap.Modal(singleView);

    k.show();
}

// sendmessage

function sendcomment(id) {


    var msgtxt = document.getElementById("msgtext");

    var f = new FormData();
    f.append("id", id);
    f.append("t", msgtxt.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {


                window.location.reload();

            } else if (t == "1") {
                window.location = "index.php";
            } else {
                swal({
                    title: "Oops!",
                    text: "Incorrect Verification Code",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        }
    }

    r.open("POST", "sendcommentprocess.php", true);
    r.send(f);

}




function gotoMessage(email) {
    window.location = "messages.php?email=" + email;
}

function clearfilters() {
    window.location.reload();
}

function goToProductView(id) {

    var link = document.getElementById("seeAllLink" + id)

    link.href = "productsGrid.php?category=" + id;
}

function productsGrid(page, cid) {

    var form = new FormData();


    form.append("page", page);
    form.append("cid", cid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            var probox = document.getElementById("probox");

            probox.innerHTML = text

        }
    }
    r.open("POST", "productGridProcess.php", true);
    r.send(form);
}

function addUserFilters(page, cid) {



    var s = document.getElementById("s").value;
    var sc = document.getElementById("sc").value;
    var br = document.getElementById("br").value;
    var pf = document.getElementById("pf").value;
    var pt = document.getElementById("pt").value;




    var form = new FormData();


    form.append("s", sc);
    form.append("sc", sc);
    form.append("br", br);
    form.append("pf", pf);
    form.append("pt", pt);
    form.append("page", page);
    form.append("cid", cid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            var probox = document.getElementById("probox");

            probox.innerHTML = text

        }
    }
    r.open("POST", "userfilterProcess.php", true);
    r.send(form);
}





function editProfileModal() {
    var modal = document.getElementById("editAccount");
    md = new bootstrap.Modal(modal);
    md.show()
}

function editShippingAddressModal() {
    var amodal = document.getElementById("editaddress");
    md = new bootstrap.Modal(amodal);
    md.show()
}

function addnewSCategoryModal() {
    var amodal = document.getElementById("addnewSCModal");
    md = new bootstrap.Modal(amodal);
    md.show()
}

function addnewColorModal() {
    var amodal = document.getElementById("addnewColorModal");
    md = new bootstrap.Modal(amodal);
    md.show()
}

function addnewBrandModal() {
    var amodal = document.getElementById("addnewBrandModal");
    md = new bootstrap.Modal(amodal);
    md.show()
}


function saveSubCategory() {
    var text = document.getElementById("nsc").value;
    var cat_select = document.getElementById("cat-select").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                md.hide();
                swal({
                    title: "Successful!",
                    text: "You've Successfully add sub Category",
                    icon: "success",
                    button: "Aww yiss!",
                });
            } else if (t == "7") {
                md.hide();
                swal({
                    title: "Successful",
                    text: "You've Successfully link a Category",
                    icon: "success",
                    button: "Aww yiss!",
                });
            } else if (t == "8") {
                md.hide();
                swal({
                    title: "No Need to Worry",
                    text: "You've already linked this category",
                    icon: "success",
                    button: "Aww yiss!",
                });
            } else {
                swal({
                    title: "Oops!",
                    text: "Unexpected Error",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        }
    }
    r.open("GET", "addNewCategoryProcess.php?cat=" + text + "&ca=" + cat_select, true);
    r.send()
}

function saveColor() {
    var text = document.getElementById("nco").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            swal({
                title: "Congratulations!",
                text: t,
                icon: "success",
                button: "Close!",
            });
            window.location.reload();

        }
    }
    r.open("GET", "addNewCategoryProcess.php?color=" + text, true);
    r.send()
}


function saveBrand() {
    var text = document.getElementById("nbr").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            swal({
                title: "Congratulations!",
                text: t,
                icon: "success",
                button: "Close!",
            });
            window.location.reload();

        }
    }
    r.open("GET", "addNewCategoryProcess.php?br=" + text, true);
    r.send()
}

function manageProducts(page) {
    var search = document.getElementById("search").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var card_body = document.getElementById("card-body");
            card_body.innerHTML = t



        }
    }
    r.open("GET", "manageProductProcess.php?page=" + page + "&s=" + search, true);
    r.send()
}

function manageUsers(page) {
    var search = document.getElementById("search").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var card_body = document.getElementById("card-body");
            card_body.innerHTML = t



        }
    }
    r.open("GET", "manageuserProcess.php?page=" + page + "&s=" + search, true);
    r.send()
}

function bringSubProducts(page, cid) {
    var sc = document.getElementById("sc").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var probox = document.getElementById("probox");
            probox.innerHTML = t



        }
    }
    r.open("GET", "scfilterProcess.php?page=" + page + "&sc=" + sc + "&c=" + cid, true);
    r.send()
}

function bringBrand(page, cid) {
    var br = document.getElementById("br").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var probox = document.getElementById("probox");
            probox.innerHTML = t

        }
    }
    r.open("GET", "brandfilterProcess.php?page=" + page + "&br=" + br + "&c=" + cid, true);
    r.send()
}

function bringSize(page, cid) {
    var size = document.getElementById("size").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var probox = document.getElementById("probox");
            probox.innerHTML = t
        }
    }
    r.open("GET", "sizefilterProcess.php?page=" + page + "&size=" + size + "&c=" + cid, true);
    r.send()
}

function bringPriceRange(page, cid) {
    var pf = document.getElementById("pf").value;
    var pt = document.getElementById("pt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var probox = document.getElementById("probox");
            probox.innerHTML = t





        }
    }
    r.open("GET", "pricefiltersProcess.php?page=" + page + "&pf=" + pf + "&pt=" + pt + "&c=" + cid, true);
    r.send()
}


function manageSales(page) {
    var search = document.getElementById("search").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var card_body = document.getElementById("card-body");
            card_body.innerHTML = t



        }
    }
    r.open("GET", "managesellinghistory.php?page=" + page + "&s=" + search, true);
    r.send()
}


function buyFromCart() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            var obj = JSON.parse(text);

            var email = obj["email"];
            var amount = obj["amount"];

            if (text == "1") {
                alert("Please sign in first");
                window.location = "index.php";
            } else if (text == "2") {
                alert("Please update your address to continue");
                window.location = "userProfile.php";
            } else {
                //Called when user completed the payment.It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoiceCart(orderId, amount, email);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1218906", // Replace your Merchant ID
                    "return_url": "cart.php", // Important
                    "cancel_url": "cart.php", // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj['id'],
                    "items": obj["item"] + " " + "Items",
                    "amount": amount + ".00",
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": email,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked

                payhere.startPayment(payment);

            }
        }
    }

    r.open("GET", "buyFromCartProcess.php", true);
    r.send();
}

function saveInvoiceCart(orderId, amount, email) {
    var form = new FormData();

    form.append("oid", orderId);
    form.append("email", email);
    form.append("amount", amount);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "invoice.php?id=" + orderId;
            }
        }
    }
    r.open("POST", "saveInvoiceCart.php", true);
    r.send(form);
}


function singleViewModalTransaction(id) {
    var modal = document.getElementById("ViewTransactionModal" + id);
    md = new bootstrap.Modal(modal);
    md.show()
}

function subscribe() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                setTimeout(function() {
                    var modal = document.getElementById("subscribeModal");
                    md = new bootstrap.Modal(modal);
                    md.show()
                }, 2000);
            }
        }
    }

    r.open("GET", "subscribeCookie.php", true);
    r.send();

}

function UpdateModal(id) {
    var modal = document.getElementById("updateModal" + id);
    md = new bootstrap.Modal(modal);
    md.show()
}


function subscribeToUs() {
    var email = document.getElementById("subemail").value;
    var spinner = document.getElementById("customSpinner");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            spinner.style.display = "none";
            swal({
                title: "Congratulations!",
                text: "We've send a email to your inbox",
                icon: "success",
                button: "Close!",
            });


        } else {
            md.hide();
            spinner.style.display = "flex";
        }


    }
    r.open("GET", "subscribeDoneCookie.php?email=" + email, true);
    r.send();
}




function sendMessageToAdmin(email) {
    var msg = document.getElementById("msgtext").value;
    var form = new FormData();


    form.append("email", email);
    form.append("msg", msg);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

        }
    }
    r.open("POST", "UserToAdminChatInsert.php", true);
    r.send(form);
}


function ChatModal(email) {
    var cm = document.getElementById("chatModal" + email)

    md = new bootstrap.Modal(cm);
    md.show()
}

function sendMessageToUser(email) {
    var msg = document.getElementById("msgtext" + email).value;
    var form = new FormData();


    form.append("email", email);
    form.append("msg", msg);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            refreshChatBox(email)
        }
    }
    r.open("POST", "AdminToUserChatInsert.php", true);
    r.send(form);
}

function refreshMessages(email) {

    setInterval(refreshChatBox, 4000, email);
}


function refreshChatBox(email) {
    var r = new XMLHttpRequest();


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            var chatbox = document.getElementById("ChatBox" + email);
            chatbox.innerHTML = text;
        }
    }
    r.open("GET", "refreshMessages.php?email=" + email, true);
    r.send();
}

function ContactUserViaEmail(email) {
    var msg = document.getElementById("msgtext" + email).value;
    var spinner = document.getElementById("customSpinner");
    var form = new FormData();


    form.append("email", email);
    form.append("msg", msg);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            spinner.style.display = "none";
            swal({
                title: "Successful!",
                text: "Message sent to " + email + " successfully",
                icon: "success",
                button: "Close!",
            });
        } else {
            spinner.style.display = "flex";
        }
    }
    r.open("POST", "ContactUserViaEmail.php", true);
    r.send(form);

}


function manageOrders(page) {
    var search = document.getElementById("search").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            var card_body = document.getElementById("card-body");
            card_body.innerHTML = t



        }
    }
    r.open("GET", "manageOrderProcess.php?page=" + page + "&s=" + search, true);
    r.send()
}

function confirmOrder(id) {
    var cbtn = document.getElementById("confirmbtn" + id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                cbtn.className = "badge rounded-pill alert-success";
                cbtn.innerHTML = "Confirmed";
            } else {

                swal({
                    title: "Oops!",
                    text: "Unexpected Error",
                    icon: "error",
                    button: "Sorry!",
                });
            }



        }
    }
    r.open("GET", "confirmOrderProcess.php?oid=" + id, true);
    r.send()
}

function OutForDelivery(id) {
    var obtn = document.getElementById("ofdbtn" + id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                obtn.className = "badge rounded-pill alert-warning";
                obtn.innerHTML = "Out for delivery";
            } else {
                alert(t)
            }



        }
    }
    r.open("GET", "outForDeliveryProcess.php?oid=" + id, true);
    r.send()
}

function delivered(id) {
    var dbtn = document.getElementById("dbtn" + id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success" || t == "successsuccess") {
                dbtn.className = "badge rounded-pill alert-primary";
                dbtn.innerHTML = "Moved to Sales";
            } else {

                swal({
                    title: "Oops!",
                    text: "Unexpected Error",
                    icon: "error",
                    button: "Sorry!",
                });
            }
        }
    }
    r.open("GET", "DeliveredProcess.php?oid=" + id, true);
    r.send()
}

function changeProductBySize(pid, bid, scid) {
    var size = document.getElementById("sizes").value;
    var color = document.getElementById("colors").value;

    var form = new FormData();

    form.append("pid", pid);
    form.append("bid", bid);
    form.append("scid", scid);
    form.append("size", size);
    form.append("color", color);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t)
            var pro = document.getElementById("pro");
            pro.innerHTML = t;
        }
    }
    r.open("POST", "changeProductBySizeProcess.php", true);
    r.send(form);
}

function changeProductByColor() {
    var size = document.getElementById("sizes").value;
    var color = document.getElementById("colors").value;

    var form = new FormData();

    form.append("pid", pid);
    form.append("bid", bid);
    form.append("scid", scid);
    form.append("size", size);
    form.append("color", color);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t)
            var pro = document.getElementById("pro");
            pro.innerHTML = t;
        }
    }
    r.open("POST", "changeProductByColorProcess.php", true);
    r.send(form);
}


function goToHome() {
    window.location = "home.php";
}