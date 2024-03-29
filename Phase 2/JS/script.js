function addRow(tableID){
	var table = document.getElementById(tableID);
	var len = table.rows.length;
	var row = table.insertRow(-1);

	var cell1 = row.insertCell(0);
	var element1 = document.createElement('input');
	cell1.className = "no";
	element1.type="text";
	element1.id=tableID + "Ref" + len;
	element1.name += tableID + "Ref" + len;
	element1.value = len;
	element1.readOnly = true;
	cell1.appendChild(element1);

	var cell2 = row.insertCell(1);
	cell2.className = "iDesc";
	var element2 = document.createElement('input');
	element2.type="text";
	element2.id=tableID + "Desc" + len;
	element2.name += tableID + "Desc" + len;
	cell2.appendChild(element2);

	var cell3 = row.insertCell(2);
	cell3.className = "no";
	var element3 = document.createElement('input');
	element3.type="text";
	element3.value="0";
	element3.id = tableID + "Reqd" + len;
	element3.name += tableID + "Reqd" + len;
	element3.onkeyup=function() {
		calc(tableID, len);
		if (tableID == 'materialsTable')
		{
			totalIt(tableID);
			totalPer(tableID);
			totalCost(tableID);
		}
		else if (tableID =='labourTable')
		{
			totalIt(tableID);
		}  
		else
		{
			totalPer(tableID);
		}	
		grandTotal();
	}
	cell3.appendChild(element3);

	var cell4 = row.insertCell(3);
	cell4.className = "no";
	cell4.innerHTML = '£';
	var element4 = document.createElement('input');
	element4.type="text";
	element4.value="0.00";
	element4.id = tableID + "UCost" + len;
	element4.name = tableID + "UCost" + len;
	element4.onkeyup=function() {
		calc(tableID, len);
		if (tableID == 'materialsTable')
		{
			totalIt(tableID);
			totalPer(tableID);
			totalCost(tableID);
		}

		else if (tableID =='labourTable')
		{
			totalIt(tableID);
		} 
		
		else
		{
			totalPer(tableID);
		}	
		grandTotal();
	}
	cell4.appendChild(element4);
	var cell5 = row.insertCell(4);
	cell5.className = "no";
	cell5.innerHTML = '£'
	var element5 = document.createElement('input');
	element5.type="text";
	element5.id = tableID + "TCost" + len;
	element5.name = tableID + "TCost" + len;
	element5.readOnly = true; 
	element5.value = "0.00"
	element5.name = tableID + "TCost" + len;
	cell5.appendChild(element5);

	document.getElementById(tableID+"Count").value= len + 1;
}	

function calc(tableID, idx) {
  var price = parseFloat(document.getElementById(tableID+"Reqd"+idx).value)*
              parseFloat(document.getElementById(tableID+"UCost"+idx).value);
  document.getElementById(tableID+"TCost"+idx).value= (isNaN(price)?"0.00":price.toFixed(2));
  if(tableID == 'contractTable')
  {
  	price *= 1.15;
  	document.getElementById(tableID+"TCostPer").value= (isNaN(price)?"0.00":price.toFixed(2));
  	document.getElementById(tableID+"Total").value= (isNaN(price)?"0.00":price.toFixed(2));
  }   
}

function totalIt(tableID) {
	var table = document.getElementById(tableID);
	var len = table.rows.length;
	var total = 0;

	for (var i = 0; i < len; i++) {
		calc(tableID, i);
		 var price = parseFloat(document.getElementById(tableID+"TCost"+i).value);
		total += isNaN(price)?0:price;
	};
	document.getElementById(tableID + "TCost").value= (isNaN(total)?"0.00":total.toFixed(2));
	
	if (tableID == 'labourTable')
	{
		document.getElementById(tableID + "TCostPer").value= (isNaN(total)?"0.00":total.toFixed(2));
		document.getElementById(tableID + "Total").value= (isNaN(total)?"0.00":total.toFixed(2));
	}                        
} 

function totalPer(tableID) {
	var table = document.getElementById(tableID);
	var len = table.rows.length;
	var total = 0;
	for (var i = 0; i < len; i++) {
		calc(tableID, i);
		 var price = parseFloat(document.getElementById(tableID+"TCost"+i).value) * 1.15;
		total += isNaN(price)?0:price;
	};
	document.getElementById(tableID + "TCostPer").value= (isNaN(total)?"0.00":total.toFixed(2));
	document.getElementById(tableID + "Total").value= (isNaN(total)?"0.00":total.toFixed(2));                        
}

function totalCost(tableID) {
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

function grandTotal(){
	console.log(materialTotal);
	var materialTotal = parseFloat(document.getElementById("materialsTableTotal").value);
	var servicesTotal = parseFloat(document.getElementById("servicesTableTotal").value);
	var contractTotal = parseFloat(document.getElementById("contractTableTotal").value);
	var labourTotal = parseFloat(document.getElementById("labourTableTotal").value);
	
	var grandTotal = materialTotal + servicesTotal + contractTotal + labourTotal;

	document.getElementById("TableTotal").value= (isNaN(grandTotal)?"0.00":grandTotal.toFixed(2));	
} 

function validity(inputID){
	var inputValue = document.getElementByID(inputID).value

	if (inputVal == "") {
        document.getElementById(inputID).style.backgroundColor = "red";
    }
    else{
        document.getElementById(inputID).style.backgroundColor = "white";
    }
}