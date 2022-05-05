var modal=document.getElementById('modal_login');
var btn=document.getElementById('button_login');
var span=document.getElementsByClassName('close_modal')[0];

btn.onclick=function (){
    modal.style.display='block';
}

window.onmousedown=function(event){
    if (event.target==modal){
        modal.style.display='none';
    }
}

span.onclick=function (){
    modal.style.display='none';
}