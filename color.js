function getHexColor(colorStr) {
    var a = document.createElement('div');
    a.style.color = colorStr;
    var colors = window.getComputedStyle(document.body.appendChild(a)).color.match(/\d+/g).map(function(a) { return parseInt(a, 10); });
    document.body.removeChild(a);
    var r = document.getElementById("clr");
    r.innerHTML = (colors.length >= 3) ? '#' + (((1 << 24) + (colors[0] << 16) + (colors[1] << 8) + colors[2]).toString(16).substr(1)) : false;

}