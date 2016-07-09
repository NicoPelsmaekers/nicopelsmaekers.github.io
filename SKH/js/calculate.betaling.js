function calc(){
    var adult1 = document.getElementById("adults");
    var child1 = document.getElementById("children");
    
    var adult = adult1.options[adult1.selectedIndex].value;
    var child = child1.options[child1.selectedIndex].value;
    
    var calculation = (adult * 12) + (child * 8);
    
    document.getElementById("payment").innerHTML ="€ "+ calculation;
}