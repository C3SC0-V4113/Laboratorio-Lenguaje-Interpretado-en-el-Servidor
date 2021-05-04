

function callAHAH(url, pageElement, callMessage, errorMessage) {
   document.getElementById(pageElement).innerHTML = callMessage;
   try {
      /* Par navegadores como Firefox, Safari, Chrome, Opera, etc */
      req = new XMLHttpRequest(); 
   } 
   catch(e) {
      try {
         /* Versiones anteriores de Internet Explorer IE */
         req = new ActiveXObject("Msxml2.XMLHTTP");  
      } 
	  catch (e) {
         try {
            /* Otras versiones de Internet Explorer IE */
            req = new ActiveXObject("Microsoft.XMLHTTP");  
         } 
		 catch (E) {
            req = false;
         } 
      } 
   }
   req.onreadystatechange = function() {
                               responseAHAH(pageElement, errorMessage);
                            };
   req.open("GET", url, true);
   req.send(null);
}

function responseAHAH(pageElement, errorMessage) {
   var output = '';
   if(req.readyState == 4) {
      if(req.status == 200) {
         output = req.responseText;
         document.getElementById(pageElement).innerHTML = output;
      } 
	  else {
         document.getElementById(pageElement).innerHTML = errorMessage + "\n" + output;
      }
   }
}