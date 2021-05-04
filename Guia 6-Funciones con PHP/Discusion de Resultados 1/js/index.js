window.onload = initForms;

var Validado=false;

function initForms(){
    var enviar=document.getElementById("enviar");
    var datonumero;
    var agregar=document.getElementById("agregar");

    agregar.addEventListener("click",function(){
        datonumero = document.frmNO.numero.value;
        if(datonumero.length > 0){
            formnumeros=document.frmNO;
            AñadirNumero(formnumeros.ingresados,formnumeros.numero.value);
        }
        else{
            alert("Debe ingresar un número.");
        }
    },false);

    enviar.addEventListener("click",function(){
        var contador = 0;
        var opciones=document.getElementById("ingresados").options;
        for(var i=0; i<opciones.length; i++){
            if(opciones[i].selected){
                contador++;
            }
        }
        if(contador == 0){
            alert("No se han seleccionado elementos.");
            Validado = false;                                                   
        }
        else if (contador<=2) {
            alert("Seleccione más de 2 elementos.");
            Validado = false;    
        }
        else{
            Validado=true;
        }
    },true);
}

function AñadirNumero(optionMenu, value){
    var texto="";
    var texto=value;
    var posicion = optionMenu.length;
    optionMenu[posicion] = new Option(value,texto);
}

function validateForm() {
    return Validado;
  }