(function(){
    //Agregar al manejador de evento load la función init())
    if (window.addEventListener) window.addEventListener("load", init, false);
    else if (window.attachEvent) window.attachEvent("onload", init);
    
    // Buscar en el documento todos los elementos INPUT de tipo texto, ya que
    // solamente en ellos se va a registrar un controlador de evento.
    function init(){
        var inputtag = document.getElementById("quantity");
        var sendbutton = document.getElementById("enviar");
        var resparea = document.getElementById("fact");
        // Hacer un recorrido por todos los campos del formulario
        if (inputtag.addEventListener){
            inputtag.addEventListener("keypress", filter, false);
            //Calcular el factorial del número
            if(sendbutton.addEventListener){
                sendbutton.addEventListener("click", function(){
                      resparea.innerHTML = "<p>" + inputtag.value + "! = " + factorial(inputtag.value) + "</p>";
                }, false);
            }
            else if(sendbutton.attachEvent){
                sendbutton.addEventListener("onclick", function(){
                    resparea.innerHTML = "<p>" + inputtag.value + "! = " + factorial(inputtag.value) + "</p>";
                });
            }
        }
        else {
            // No utilizamos attachEvent porque no llama a la función de controlador 
            // con el valor correcto de la palabra clave this. En su lugar se invova
            // con el manejador de evento onkeypress  
            inputtag.onkeypress = filter;
            //Calcular el factorial del número
            if(sendbutton.addEventListener){
                sendbutton.addEventListener("click", function(){
                    resparea.innerHTML = "<p>" + inputtag.value + "! = " + factorial(inputtag.value) + "</p>";
                }, false);
            }
            else if(sendbutton.attachEvent){
                sendbutton.addEventListener("onclick", function(){
                    resparea.innerHTML = "<p>" + inputtag.value + "! = " + factorial(inputtag.value) + "</p>";
                });
            }
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
        var allowed = "0123456789";     // Caracteres válidos
        var messageElement = document.getElementById("numbersOnly");  // Mensaja a ocultar/mostrar

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
    function factorial(valor){
        if(valor == 0) {
            return 1;
        } 
        else {
            return valor * factorial(valor-1);
        }
    }
})();