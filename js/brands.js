var md;
function newBrandModal() {
  var model = document.getElementById("brandModal");
  md = new bootstrap.Modal(model);
  md.show();
}

function publishBrand() {
  var bname = document.getElementById("bname");
  var bdesc = document.getElementById("bdesc");
  var bstatus = document.getElementById("bStatus");
  var file = document.getElementById("file");

  var form = new FormData();

  form.append("bname", bname.value);
  form.append("bdesc", bdesc.value);
  form.append("bstatus", bstatus.value);
  form.append("file", file.files[0]);
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      var error = document.getElementById("err_msg");
      if (text == 1) {
         bname.value = "";
         bdesc.value = "";
         bstatus.value = "0";
         file.value = "";
         bringBrands()
        swal("Congratulations", "New Brand Added", "success");
       
      } else {
        error.innerHTML = text;
        setTimeout(function () {
          err.innerHTML = "";
          bname.value = "";
          bdesc.value = "";
          bstatus.value = "0";
          file.innerHTML = "";
        }, 4000);
      }
    }
  };
  r.open("POST", "brandProcess.php", true);
  r.send(form);
}

function bringBrands() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      var brands = document.getElementById("brands");
      brands.innerHTML = text;
    }
  };
  r.open("GET", "brandViewProcess.php", true);
  r.send();
}

function displayBrand(id){
var r = new XMLHttpRequest();

r.onreadystatechange = function(){
   if(r.readyState == 4){
     
      var text = r.responseText;
      var modal = document.getElementById("singleBrand");
      md = new bootstrap.Modal(modal);
      md.show()
      var modal_content = document.getElementById("modal-content");
      modal_content.innerHTML = text;
   }
}
r.open("GET","displayBrand.php?id="+id,true);
r.send();
}
var md;
function DisplayModal(){
  
  
  
}
