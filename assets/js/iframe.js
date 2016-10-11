$(document).ready(function() {
    $("#mijnEventIframe").load(function() {
        var doc = this.contentDocument || this.contentWindow.document;
        var target = doc.getElementById("content");
        target.innerHTML = "Found It!"; 
    });
});
 