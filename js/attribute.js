function goToAttributes() {
    var category = document.getElementById("ca");
    var subCategory = document.getElementById("sc");
    var tag = document.getElementById("tag");
    var color = document.getElementById("colorName");
    var hex = document.getElementById("hex");
    var size = document.getElementById("size");

    alert(hex.value);

    var form = new FormData();

    form.append("category", category.value);
    form.append("subCategory", subCategory.value);
    form.append("tag", tag.value);
    form.append("color", color.value);
    form.append("hex", hex.value);
    form.append("size", size.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                swal("Congratulations!", "New Category Added", "success");
                category.value = '';
                bringAttributes(1);
            } else if (text == "2") {
                swal("Congratulations!", "New Sub Category Added", "success");
                subCategory.value = '';
                bringAttributes(2);
            } else if (text == "3") {
                swal("Congratulations!", "New Tag Added", "success");
                tag.value = '';
                bringAttributes(3);
            } else if (text == "4") {
                swal("Congratulations!", "New Color Added", "success");
                color.value = '';
                bringAttributes(4);
            } else if (text == "5") {
                swal("Congratulations!", "New Size Added", "success");
                size.value = '';
                bringAttributes(5);
            } else {
                alert(text)
            }

        }
    }
    r.open("POST", "attributesProcess.php", true);
    r.send(form);
}



var md;

function updateThings(aid) {
    var identifier = document.getElementById("identifier").innerHTML;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var modalBody = document.getElementById("modalBody");
            modalBody.innerHTML = r.responseText;

            updateModal()
        }
    }
    r.open("GET", "updateModalProcess.php?aid=" + aid + "&identifier=" + identifier, true);
    r.send();
}

function deleteThings(did) {
    alert(did)
}

function updateModal() {
    var model = document.getElementById("updateThings");
    md = new bootstrap.Modal(model);
    md.show()
}

function updateStatus() {

}

function updateAttribute() {
    var aid = document.getElementById("aid").value;
    var identifier = document.getElementById("identity").value;
    var newan = document.getElementById("newan").value;
    var status = document.getElementById("attributeStatus").value;
    var form = new FormData();


    form.append("aid", aid);
    form.append("identity", identifier);
    form.append("newan", newan);
    form.append("status", status);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            md.hide();
            if (text == "1") {
                bringAttributes(1);
            } else if (text == "2") {
                bringAttributes(2);
            } else if (text == "3") {
                bringAttributes(3);
            } else if (text == "4") {
                bringAttributes(4);
            } else if (text == "5") {
                bringAttributes(5);
            } else {
                alert(text)
            }
        }

    }
    r.open("POST", "updateAttribute.php", true);
    r.send(form)
}






function bringAttributes(value) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            var data = document.getElementById("data");
            data.innerHTML = text;
        }
    }
    r.open("GET", "DisplayAttributeProcess.php?select=" + value, true);
    r.send()
}