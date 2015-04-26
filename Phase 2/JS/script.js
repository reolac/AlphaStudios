function addRow(tableID){
    var table = document.getElementById(tableID);
var len = table.rows.length;
// Create an empty <tr> element and add it to the 1st position of the table:
var row = table.insertRow(-1);

// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3 = row.insertCell(2);
var cell5 = row.insertCell(3);
var cell6 = row.insertCell(4);


var element2 = document.createElement('input');
element2.type="text";

var element3 = document.createElement('input');
element3.type="text";

var element4 = document.createElement('input');
element4.type="text";

var element5 = document.createElement('input');
element5.type="text";

cell1.id += tableID + "Ref" + len;
cell2.id += tableID + "Desc" + len;
cell3.id += tableID + "Reqd" + len;
cell5.id += tableID + "UCost" + len;
cell6.id += tableID + "TCost" + len;

cell1.innerHTML = len;


cell2.appendChild(element2);
cell3.appendChild(element3);
cell5.appendChild(element5);




// Add some text to the new cells:

}

function getTotal(tableID){
    var req = document.getElementById(tableID + 'Reqd' + 0);
    var uCost = document.getElementById(tableID + 'UCost' + 0);
    
    
    var tot=0;
    tot = parseInt(req * uCost);
    
    document.getElementById(tableID + 'TCost' + 0).value = tot;
}
