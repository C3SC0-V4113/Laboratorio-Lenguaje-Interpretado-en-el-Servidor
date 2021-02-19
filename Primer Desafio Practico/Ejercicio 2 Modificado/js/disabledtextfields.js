function disableTextBox(){
    document.salario.hextra.onclick = function(){
        document.salario.numhorasex.disabled = !document.salario.numhorasex.disabled;
        document.salario.pagohextra.disabled = !document.salario.pagohextra.disabled; 
    }
}

function addLoadEvent(func) {
    var oldonload = window.onload;
        if(typeof window.onload != 'function') {
            window.onload = func;
    }
    else {
        window.onload = function() {
            if(oldonload) {
                oldonload();
            }
            func();
        }
    }
}

addLoadEvent(disableTextBox);