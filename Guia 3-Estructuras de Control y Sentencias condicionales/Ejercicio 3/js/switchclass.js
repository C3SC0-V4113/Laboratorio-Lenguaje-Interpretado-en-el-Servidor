var parrafos = document.getElementsByClassName("msgOff");

for(var i=0; i<parrafos.length; i++){
	parrafos[i].onmouseover = function(){
		changeClass(this);
	};
	parrafos[i].onmouseout = function(){
        changeClass(this);
	}
}

function changeClass(element){
    element.className = (element.className) == 'msgOff' ? 'msgOn' : 'msgOff';
}