window.onload = initForms;

function initForms(){
    var datoalumno;
    var agregar=document.getElementById("agregar");
    agregar.addEventListener("click",function(){
        datoalumno = document.frmalumnos.nombre.value;
        if(datoalumno.length > 0){
            formalumnos=document.frmalumnos;
            AñadirAlumno(formalumnos.ingresados, formalumnos.nombre.value, formalumnos.nota1.value, formalumnos.nota2.value, formalumnos.nota3.value);
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

function AñadirAlumno(optionMenu, value,nota1,nota2,nota3){
    var texto="";
    var texto=value+","+nota1+","+nota2+","+nota3;
    var posicion = optionMenu.length;
    optionMenu[posicion] = new Option(value,texto);
}