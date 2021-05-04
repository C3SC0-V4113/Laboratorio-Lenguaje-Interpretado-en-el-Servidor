(function(){
    //Agregar al manejador de evento load la función init())
    if (window.addEventListener) window.addEventListener("load", init, false);
    else if (window.attachEvent) window.attachEvent("onload", init);
    
    // Buscar en el documento todos los elementos INPUT de tipo texto, ya que
    // solamente en ellos se va a registrar un controlador de evento.
    function init(){
        var number1 = document.getElementById("number1");
        var number2 = document.getElementById("number2");
        var number3 = document.getElementById("number3");
        var resparea = document.getElementById("fact");
        // Hacer un recorrido por todos los campos del formulario
        if (number1.addEventListener){
            number1.addEventListener("keypress", filter, false);
        }
        else {
            // No utilizamos attachEvent porque no llama a la función de controlador 
            // con el valor correcto de la palabra clave this. En su lugar se invova
            // con el manejador de evento onkeypress  
            number1.onkeypress = filter;
        }
        if (number2.addEventListener){
            number2.addEventListener("keypress", filter, false);
        }
        else {
            // No utilizamos attachEvent porque no llama a la función de controlador 
            // con el valor correcto de la palabra clave this. En su lugar se invova
            // con el manejador de evento onkeypress  
            number2.onkeypress = filter;
        }
        if (number3.addEventListener){
            number3.addEventListener("keypress", filter, false);
        }
        else {
            // No utilizamos attachEvent porque no llama a la función de controlador 
            // con el valor correcto de la palabra clave this. En su lugar se invova
            // con el manejador de evento onkeypress  
            number3.onkeypress = filter;
        }
    }
    
    // Este es el controlador keypress que filtra la entrada del usuario
    function filter(event) {
        // Obtener el objeto event y el código de carácter de la tecla pulsada
        // de forma compatible con todos los navegadores
        var e = event || window.event;         // Objeto de evento de la tecla
        var code = e.charCode || e.keyCode;    // tecla que se ha pulsado

        // Si se ha pulsado una tecla de función de cualquier tipo, no filtrarla
        if (e.charCode == 0) return true;       // Tecla de función (solo para Firefox)
        if (e.ctrlKey || e.altKey) return true; // Se mantienen presionadas Ctrl o Alt
        if (code < 32) return true;             // Carácter de Ctrl en tabla ASCII
        
        // Dejar pasar teclas de retroceso (BackSpace), tabulación (Tab), entrada (Enter) y 
        // escape (Scape)
        if (code==0 || code==8 || code==9 || code==13 || code==27) return true; 

        // Buscar la información de los caracteres válidos para este campo de entrada
        var allowed1 = "0123456789";     // Caracteres válidos
        var messageElement1 = document.getElementById("numbersOnly1");  // Mensaja a ocultar/mostrar
        var messageElement2 = document.getElementById("numbersOnly2");  // Mensaja a ocultar/mostrar
        var messageElement3 = document.getElementById("numbersOnly3");  // Mensaja a ocultar/mostrar

        // Convertir el código de carácter a su carácter correspondiente
        var c = String.fromCharCode(code);
        
        // Comprobar si el carácter está dentro del conjunto de caracteres permitidos
        if (allowed1.indexOf(c) != -1) {
            // Si c es un carácter legal, ocultar el mensaje, si es que existe.
            if (messageElement1) messageElement1.style.visibility = "hidden";
            return true; // Aceptar el carácter
        }
        else {
            // Si c no está en el conjunto de caracteres permitidos, mostrar el mensaje
            if (messageElement1) messageElement1.style.visibility = "visible";
            // Y rechazar este evento keypress
            if (e.preventDefault) e.preventDefault();
            if (e.returnValue) e.returnValue = false;
            return false;
        }
        if (allowed2.indexOf(c) != -1) {
            // Si c es un carácter legal, ocultar el mensaje, si es que existe.
            if (messageElement2) messageElement2.style.visibility = "hidden";
            return true; // Aceptar el carácter
        }
        else {
            // Si c no está en el conjunto de caracteres permitidos, mostrar el mensaje
            if (messageElement2) messageElement2.style.visibility = "visible";
            // Y rechazar este evento keypress
            if (e.preventDefault) e.preventDefault();
            if (e.returnValue) e.returnValue = false;
            return false;
        }
        if (allowed3.indexOf(c) != -1) {
            // Si c es un carácter legal, ocultar el mensaje, si es que existe.
            if (messageElement3) messageElement3.style.visibility = "hidden";
            return true; // Aceptar el carácter
        }
        else {
            // Si c no está en el conjunto de caracteres permitidos, mostrar el mensaje
            if (messageElement3) messageElement3.style.visibility = "visible";
            // Y rechazar este evento keypress
            if (e.preventDefault) e.preventDefault();
            if (e.returnValue) e.returnValue = false;
            return false;
        }
    }
})();