var modal=document.getElementById('modal_login');
var btn=document.getElementById('button_login');
var span=document.getElementsByClassName('close_modal')[0];

var op=1;

btn.onclick=function (){
    modal.style.display='block';
    modal.style.opacity='100';
}

window.onmousedown=function(event){
    if (event.target==modal){

        modal.style.display='none';

        /*
        while(op>=0){
            (function(_op){
                setTimeout(function() {modal.style.opacity=_op;}, 60-op*600);
            })(op);
            op-=0.1;
        } 
        //if (op<0) {modal.style.display='none'; modal.style.opacity='100%';}
        */
    }
}

span.onclick=function (){
    modal.style.display='none';
}