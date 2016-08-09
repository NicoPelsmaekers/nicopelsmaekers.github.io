function biercalc(){
    var flesid = document.getElementById("flessen");
    var prijs1 = 8;
    var prijs2 = 7.5;
    var prijs3 = 7;
    
    var fles = flesid.options[flesid.selectedIndex].value;
    
    if(fles <3){
       var calculation = fles * prijs1; 
    }else if(fles >=3 && fles <6){
        var calculation = fles * prijs2; 
    }else if(fles >=6){
        var calculation = fles * prijs3; 
    }  
    
    document.getElementById("paymentbier").innerHTML ="€ "+ calculation;
} 