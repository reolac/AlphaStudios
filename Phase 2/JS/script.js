function addRow(tableID){
	var table = document.getElementById(tableID);
	var len = table.rows.length;
	var row = table.insertRow(-1);

	var cell1 = row.insertCell(0);
	cell1.innerHTML = len;
	cell1.id += tableID + "Ref" + len;
	cell1.className = "coll1"

	var cell2 = row.insertCell(1);
	cell2.className = "iDesc";
	var element2 = document.createElement('input');
	element2.type="text";
	element2.id=tableID + "Desc" + len;
	cell2.appendChild(element2);

	var cell3 = row.insertCell(2);
	cell3.className = "no";
	var element3 = document.createElement('input');
	element3.type="text";
	element3.id = tableID + "Reqd" + len;
	element3.onkeyup=function() {calc(tableID, len); totalIt(tableID); totalPer(tableID); totalCost(tableID)}
	cell3.appendChild(element3);

	var cell4 = row.insertCell(3);
	cell4.className = "no";
	var element4 = document.createElement('input');
	element4.type="text";
	element4.value="0.00";
	element4.id = tableID + "UCost" + len;
	element4.onkeyup=function() {calc(tableID, len); totalIt(tableID); totalPer(tableID); totalCost(tableID)}
	cell4.appendChild(element4);

	var cell5 = row.insertCell(4);
	cell5.className = "no";
	cell5.innerHTML = '£'
	var element5 = document.createElement('input');
	element5.type="text";
	element5.id = tableID + "TCost" + len;
	element5.disabled = "disabled";
	element5.value = "0.00"
	element5.name = "total[]"
	cell5.appendChild(element5);
}	

function calc(tableID, idx) {
  var price = parseFloat(document.getElementById(tableID+"Reqd"+idx).value)*
              parseFloat(document.getElementById(tableID+"UCost"+idx).value);
  document.getElementById(tableID+"TCost"+idx).value= (isNaN(price)?"0.00":price.toFixed(2));
   
}

function totalIt(tableID) {
    var qtys = document.getElementsByName('total[]');
	var total = 0;
	for (var i = 0; i < qtys.length; i++) {
		calc(tableID, i);
		 var price = parseFloat(document.getElementById(tableID+"TCost"+i).value);
		total += isNaN(price)?0:price;
	};
	document.getElementById(tableID + "TCost").value= (isNaN(total)?"0.00":total.toFixed(2));                        
} 

function totalPer(tableID) {
    var qtys = document.getElementsByName('total[]');
	var total = 0;
	for (var i = 0; i < qtys.length; i++) {
		calc(tableID, i);
		 var price = parseFloat(document.getElementById(tableID+"TCost"+i).value) * 1.15;
		total += isNaN(price)?0:price;
	};
	document.getElementById(tableID + "TCostPer").value= (isNaN(total)?"0.00":total.toFixed(2));                        
}

function totalCost(tableID) {
    var qtys = document.getElementsByName('total[]');
	var total = 0;
	var price = parseFloat(document.getElementById(tableID+"TCostPer").value)+
	 			parseFloat(document.getElementById(tableID+"Carriage").value);
	var price2 = parseFloat(document.getElementById(tableID+"TCostPer").value);

	total += isNaN(price)?0:price;
	document.getElementById(tableID + "Total").value= (isNaN(total)?"0.00":total.toFixed(2));                        
	console.log(document.getElementById(tableID+"Carriage").value);
	if (document.getElementById(tableID+"Carriage").value == ""){
		document.getElementById(tableID + "Total").value= (price2.toFixed(2)); 		
	}

}   
