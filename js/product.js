function saveProduct() {
    var title = document.getElementById("title");
    var sku = document.getElementById("sku");
    var color = document.getElementById("color");
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var desc = document.getElementById("desc");
    var price = document.getElementById("price");
    var status = document.getElementById("status");
    var sub_category = document.getElementById("sub_category");
    var tag = document.getElementById("tag");
    var size = document.getElementById("size");
    var file = document.getElementById("file");



    var form = new FormData();

    form.append("title", title.value);
    form.append("sku", sku.value);
    form.append("color", color.value);
    form.append("category", category.value);
    form.append("brand", brand.value);
    form.append("desc", desc.value);
    form.append("price", price.value);
    form.append("status", status.value);
    form.append("sub_category", sub_category.value);
    form.append("tag", tag.value);
    form.append("size", size.value);
    form.append("file", file.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text)
        }
    }
    r.open("POST", "productRegistrationProcess.php", true);
    r.send(form)

}

function currentProducts() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            var productForm = document.getElementById("productForm");
            productForm.innerHTML = text;
        }
    }
    r.open("GET", "products.php", true);
    r.send()
}

function showModal() {
    var modal = document.getElementById("modal1");
    md = new bootstrap.Modal(modal);
    md.show()
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