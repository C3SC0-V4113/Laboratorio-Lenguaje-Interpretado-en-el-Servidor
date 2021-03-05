window.onload = initForms;

function initForms(){
    var datonumero;
    var agregar=document.getElementById("agregar");
    agregar.addEventListener("click",function(){
        datonumero = document.frmNO.numero.value;
        if(datonumero.length > 0){
            formnumeros=document.frmNO;
            AñadirNumero(formnumeros.ingresados,formnumeros.numero.value);
        }
        else{
            alert("Debe ingresar un producto para agregarlo.");
        }
    },false);
    document.getElementById("enviar").onclick = function(){
        var contador = 0;
        var opciones=document.frmalumnos.ingresados.options;
        for(var i=0; i<opciones.length; i++){
            if(opciones[i].selected){
                contador++;
            }
        }
        if(contador == 0){
            alert("No se han seleccionado elementos.");
            return false;                                                   
        }
    }
}

function AñadirNumero(optionMenu, value){
    var texto="";
    var texto=value;
    var posicion = optionMenu.length;
    optionMenu[posicion] = new Option(value,texto);
}