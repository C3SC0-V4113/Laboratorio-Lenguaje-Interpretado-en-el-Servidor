function makeactive(tab) { 
   var links= document.getElementsByTagName("a");
   for (var i = 0; i < links.length; i++) {
   links[i].className="nav-link";
 }

   document.getElementById("tab" + tab).className = "nav-link active"; 
   callAHAH('content.php?content=' + tab, 'content', 'Esperando para cargar el contenido de la pestaña' + tab + '. Espere, por favor...', 'Error'); 
}