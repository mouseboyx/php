		selectedArray[selectedArray.length]=object
//		selectedArray[selectedArray.length]=parseInt(object.price);
		document.getElementById("selected").innerHTML="";
		document.getElementById("total").innerHTML="";
		total = 0.0;
		for (i=0; i<selectedArray.length; i++) {
		total=total+selectedArray[i].price;
		document.getElementById("selected").innerHTML+=selectedArray[i].title;
		document.getElementById("total").innerHTML+=selectedArray[i].price+"<br>";
		// add cancel button functionality
		/*
		cancel = document.createElement("a");
		cancel.addEventListener("click", removeItem);
		cancel.innerHTML="X";
		cancel.setAttribute("href","javascript:void(0)");
		
		document.getElementById("selected").innerHTML+="[";
		
		document.getElementById("selected").appendChild(cancel);
		*/
		document.getElementById("selected").innerHTML+="<br>";
		
		}
		
		document.getElementById("total").innerHTML+="total:"+total;