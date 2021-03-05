function addEvent(obj, evType, fn){
    if(obj.addEventListener){
        obj.addEventListener(evType, fn, false);
        return true;
    }
    else if (obj.attachEvent){
        var r = obj.attachEvent("on"+evType, fn);
        return r;
    }
    else{
        return false;
    }
}

function initForms(){
    var btnenviar = document.getElementById("enviar");
    btnenviar.onclick = function(){
        //Verificar si hay un país seleccionado en el campo select
        var contador = 0;
        for(var i=0; i<document.frmdestinos.location.options.length; i++){
            if(document.frmdestinos.location.options[i].selected){
                contador++
            }
        }
        if(contador == 0){
            alert("No ha seleccionado ningún país.");
            return false;
        }
        //Verificar si existe un campo marcado en las casillas
        //de verificación con las ciudades
        kontador = 0;
        for(var j=0; j<document.frmdestinos["place[]"].length; j++){
            if(document.frmdestinos["place[]"][j].checked){
                kontador++;
            }
        }
        if(kontador == 0){
            alert("Debe seleccionar al menos una ciudad.");
            return false;
        }
    }
}

addEvent(window, 'load', initForms);