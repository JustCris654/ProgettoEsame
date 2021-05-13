function form_validate() {
    let psw1 = document.forms['registerForm']['password_1'].value;
    let psw2 = document.forms['registerForm']['password_2'].value;
    console.log(psw1, psw2)
    if (psw1 === psw2) {
        return true;
    } else {
        alert('Le password devono coincidere');
        return false;
    }
}

