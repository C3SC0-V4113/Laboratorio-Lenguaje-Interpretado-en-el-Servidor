window.onload = initForms;

function initForms(){
    var datoproducto;
    document.getElementById("agregar").onclick = function(){
        datoproducto = document.frmproductos.producto.value;
        if(datoproducto.length > 0){
            addProducts(document.frmproductos.ingresados, document.frmproductos.producto.value);
        }
        else{
            alert("Debe ingresar un producto para agregarlo.");
        }
    }
    document.getElementById("enviar").onclick = function(){
        var contador = 0;
        for(var i=0; i<document.frmproductos.ingresados.options.length; i++){
            if(document.frmproductos.ingresados.options[i].selected){
                contador++;
            }
        }
        if(contador == 0){
            alert("No se han seleccionado elementos.");
            return false;                                                   
        }
    }
}

function addProducts(optionMenu, value){
    var posicion = optionMenu.length;
    optionMenu[posicion] = new Option(value, value);
}