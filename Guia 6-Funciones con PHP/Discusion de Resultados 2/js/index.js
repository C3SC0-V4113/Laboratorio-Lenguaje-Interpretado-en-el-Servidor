var numero=document.getElementsByClassName("numero");
var Validado=false;
LimiteMaxMin(numero,1,100);

function validateForm(){
    return Validado;
}

function LimiteMaxMin(Arreglo,min,max){
    for (let index = 0; index < Arreglo.length; index++) {
        const numerico = Arreglo[index];
        if (isNaN(numerico)) {
            numerico.addEventListener("change",function(){
                parseInt(numerico.value)
                if (numerico.value>max) {
                    numerico.value=max;
                }
                if (numerico.value<min) {
                    numerico.value=min;
                }
                Validado=true;
            })
        } else {
            alert("No es valor númerico");
            Validado=false;
        }
    }
}