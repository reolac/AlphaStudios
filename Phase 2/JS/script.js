function addRow(tableID){
    var table = document.getElementById(tableID);
var len = table.rows.length;
// Create an empty <tr> element and add it to the 1st position of the table:
var row = table.insertRow(-1);

// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell1 = row.insertCell(0);





cell1.innerHTML = len;
cell1.id += tableID + "Ref" + len;

var cell2 = row.insertCell(1);
var element2 = document.createElement('input');
element2.type="text";
cell2.appendChild(element2);

var cell3 = row.insertCell(2);
var element3 = document.createElement('input');
element3.type="text";
element3.id = tableID + "Reqd" + len;
element3.onkeyup=function() {calc(tableID, len);}
cell3.appendChild(element3);

var cell4 = row.insertCell(3);
var element4 = document.createElement('input');
element4.type="text";
element4.id = tableID + "UCost" + len;
element4.onkeyup=function() {calc(tableID, len);}
cell4.appendChild(element4);


var cell5 = row.insertCell(4);
var element5 = document.createElement('input');
element5.type="text";
element5.id = tableID + "TCost" + len;
cell5.appendChild(element5);


// Add some text to the new cells:

}

function calc(tableID, idx) {
  var price = parseFloat(document.getElementById(tableID+"Reqd"+idx).value)*
              parseFloat(document.getElementById(tableID+"UCost"+idx).value);
  //alert(idx+":"+price);  
  document.getElementById(tableID+"TCost"+idx).value= isNaN(price)?"0.00":price.toFixed(2);
   
}
