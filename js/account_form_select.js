let id_button;
let id_div;

function button_id_div(id_button) {
    switch (id_button) {
        case 'change_pwd':
            id_div = 'form_popup_pwd';
            break;
        case 'change_nickname':
            id_div = 'form_popup_nickname';
            break;
        case 'change_email':
            id_div = 'form_popup_email';
            break;
    }
    return id_div;
}

function openForm(id_button) {
    id_div=button_id_div(id_button);

    document.getElementById(id_div).style.display="block";
    //document.getElementById(id_div).onclick=closeForm(this.id);
    document.getElementById(id_button).setAttribute("onClick", "closeForm(this.id)");
}

function closeForm(id_button) {
    id_div=button_id_div(id_button);

    document.getElementById(id_div).style.display="none";
    document.getElementById(id_button).setAttribute("onClick", "openForm(this.id)");
}