function bringDistrict() {
    var province = document.getElementById("province").value


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var district = document.getElementById("district")
            district.innerHTML = r.responseText;
        }
    }
    r.open("GET", "bringDistrict.php?pid=" + province, true);
    r.send()
}

function bringCity() {
    var district = document.getElementById("district").value

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var city = document.getElementById("city")
            city.innerHTML = r.responseText;
        }
    }
    r.open("GET", "bringDistrict.php?did=" + district, true);
    r.send()
}

function bringCategory() {
    var cat = document.getElementById("ca").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var model = document.getElementById("su_ca")
            model.innerHTML = r.responseText;
        }
    }
    r.open("GET", "bringDistrict.php?bid=" + cat, true);
    r.send()
}



function bringsize() {

    var cat = document.getElementById("ca").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var model = document.getElementById("sizeselect")
            model.innerHTML = r.responseText;
        }
    }
    r.open("GET", "bringsizeprocess.php?cid=" + cat, true);
    r.send()
}

// function addSummary(id) {
//     var check = document.getElementById("cartchecker" + id).checked;

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {

//             var summary = document.getElementById("summary");
//             summary.innerHTML = r.responseText;

//         }
//     }
//     r.open("GET", "addCartSummaryProcess.php?check=" + check + "&pid=" + id, true);
//     r.send()
// }