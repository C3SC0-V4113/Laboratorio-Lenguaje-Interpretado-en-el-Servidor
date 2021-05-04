window.onload = initForms;

function initForms(){
    document.getElementById("text-box").onfocus = function(){
        this.value = "";
    }
}