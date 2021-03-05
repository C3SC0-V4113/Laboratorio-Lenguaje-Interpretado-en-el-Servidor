(function(){
    //Agregar al manejador de evento load la función init())
    if (window.addEventListener) window.addEventListener("load", init, false);
    else if (window.attachEvent) window.attachEvent("onload", init);
    
    // Buscar en el documento todos los elementos INPUT de tipo texto, ya que
    // solamente en ellos se va a registrar un controlador de evento.
    function init(){
        var inputtag = document.getElementById("txtnumero");
        // Hacer un recorrido por todos los campos del formulario
        if (inputtag.addEventListener){
            inputtag.addEventListener("keypress", filter, false);
        }
        else {
            // No utilizamos attachEvent porque no llama a la función de controlador 
            // con el valor correcto de la palabra clave this. En su lugar se invova
            // con el manejador de evento onkeypress  
            inputtag.onkeypress = filter;
        }
    }
    
    // Este es el controlador keypress que filtra la entrada del usuario
    function filter(event) {

         // Mensaja a ocultar/mostrar
        var messageElement = document.getElementById("numbersOnly");
  
   
        // Obtener el objeto event y el código de carácter de la tecla pulsada
        // de forma compatible con todos los navegadores
        // Objeto de evento de la tecla
        var e = event || window.event;
        // tecla que se ha pulsado
        var code = e.charCode || e.keyCode;

        // Si se ha pulsado una tecla de función de cualquier tipo, no filtrarla
        // Tecla de función (solo para Firefox)
        if (e.charCode == 0) return true;
        // Se mantienen presionadas Ctrl o Alt
        if (e.ctrlKey || e.altKey) return true;
        // Carácter de Ctrl en tabla ASCII
        if (code < 32) return true;
        
        // Dejar pasar teclas de retroceso (BackSpace), tabulación (Tab), entrada (Enter), 
        // escape (Scape) y espacios en blanco (SpaceBar)
        if (code==0 || code==8 || code==9 || code==13 || code==27 || code==32) return true; 

        // Buscar la información de los caracteres válidos para este campo de entrada
        // Caracteres válidos
        var allowed = "0123456789";
       

        // Convertir el código de carácter a su carácter correspondiente
        var c = String.fromCharCode(code);
              // Comprobar si el carácter está dentro del conjunto de caracteres permitidos
        if (allowed.indexOf(c) != -1) {
            // Si c es un carácter legal, ocultar el mensaje, si es que existe.
            if (messageElement) messageElement.style.visibility = "hidden";
            return true; // Aceptar el carácter
        }
        else {
            // Si c no está en el conjunto de caracteres permitidos, mostrar el mensaje
            if (messageElement) messageElement.style.visibility = "visible";
            // Y rechazar este evento keypress
            if (e.preventDefault) e.preventDefault();
            if (e.returnValue) e.returnValue = false;
            return false;
        }
    }
})();

