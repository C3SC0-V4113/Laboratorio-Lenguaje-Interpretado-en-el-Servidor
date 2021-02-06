/***********************************************************************************
 * InputFilter.js: Filtrado no intrusivo de pulsaciones de teclas para             *
 *                 elementos INPUT del formulario.                                 *
 *                                                                                 *
 * Este módulo hace una búsqueda por todo el documento de los campos               *
 * <input type="text" /> de un formulario contenido en un documento web            *
 * que contiene atributos no estándar denominados "allowed".                       *
 * Registra un controlador de evento onkeypress para que cualquiera de             *
 * dichos elementos restrinja la entrada del usuario de forma que sólo             *
 * se puedan introducir los caracteres que aparezcan en el valor de ese atributo.  *
 * Si el elemento INPUT también tiene un atributo denominado "messageid",          *
 * el valor de dicho atributo se lleva al id de otro elemento del documento.       *
 * Si el usuario digita un carácter que no se permite, el elemento messageid       *
 * se hace visible. Si el usuario digita un carácter permitido, el elemento        *
 * messageid se oculta.                                                            *
 * Este elemento id de mensaje se ha diseñado para indicar al usuario el por qué   *
 * se ha rechazado una determinada pulsación de tecla.                             *
 *                                                                                 *
 * Acá se muestra un ejemplo de código HTML para utilizar este módulo js.          *
 *   Aceptar sólo números:                                                         *
 *   <input id="integer" type="text" allowed="0123456789" messageid="numbersonly"> *
 *   <span id="numbersonly" style="visibility:hidden">Sólo números enteros</span>  *
 *                                                                                 *
 * En los navegadores como Internet Explorer, que no admiten addEventListener(),   *
 * el controlador keypress registrado por este módulo .js sobrescribe cualquier    *
 * controlador keypress definido en el HTML.                                       *
 **********************************************************************************/
(function() {  // Todo el módulo se encuentra dentro de una función anónima
               // Cuando el documento se haya cargado totalmente se llama a la función 
init()
    if (window.addEventListener) window.addEventListener("load", init, false);
    else if (window.attachEvent) window.attachEvent("onload", init);
    // Buscar en el documento todos los elementos INPUT de tipo texto, ya que
    // solamente en ellos se va a registrar un controlador de evento.
    function init() {
        var inputtags = document.getElementsByTagName("input");
        // Hacer un recorrido por todos los campos del formulario
        for(var i = 0 ; i < inputtags.length; i++) { 
            var tag = inputtags[i];
            // Solo se desean controlar los campos de texto, los demás tipos de campos 
            // se pasan por alto
            if (tag.type != "text") continue; 
            var allowed = tag.getAttribute("allowed");
            // Solo se afectarán los campos con el atributo no estándar añadido allowed
            if (!allowed) continue; 

            // Al llegar acá es porque estamos con un campo de texto con el atributo  
            // allowed, si es así registrar en esta etiqueta nuestra función de control 
            // de evento
            if (tag.addEventListener)
                tag.addEventListener("keypress", filter, false);
            else {
                // No utilizamos attachEvent porque no llama a la función de controlador 
                // con el valor correcto de la palabra clave this. En su lugar se invova
                // con el manejador de evento onkeypress  
                tag.onkeypress = filter;
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
        
        // Dejar pasar teclas de retroceso (BackSpace), tabulación (Tab), entrada (Enter), 
        // escape (Scape) y espacios en blanco (SpaceBar)
        if (code==0 || code==8 || code==9 || code==13 || code==27 || code==32) return true; 

        // Buscar la información de los caracteres válidos para este campo de entrada
        var allowed = this.getAttribute("allowed");     // Caracteres válidos
        var messageElement = null;                      // Mensaja a ocultar/mostrar
        var messageid = this.getAttribute("messageid"); // id del mensaje, si existe
        if (messageid)  // Si existe un id del mensaje, obtener el elemento
            messageElement = document.getElementById(messageid);
        
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
})(); // Finalizar la función anónima esperando ser invocada.