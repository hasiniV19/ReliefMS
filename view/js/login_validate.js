function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validatePassword(password) {
    const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    return re.test(String(password));
}

function validateForm(){
    const email = document.getElementById("email");
    let x = email.value;
    if(x !="" && !validateEmail(x)){
        const emailError = document.getElementById("emailError");
        emailError.classList.add("visible");
        email.classList.add("invalid");
        emailError.setAttribute("aria-hidden", false);
        emailError.setAttribute("aria-invalid", true);

        return false;
    }else{
        emailError.innerHTML = "";
    }
    const password = document.getElementById("password");
    let y = password.value;

    if(y != "" && !validatePassword(y)){
        const passwordInfo = document.getElementById("passwordInfo");

        const passwordError = document.getElementById("passwordError");
        passwordError.classList.add("visible");
        password.classList.add("invalid");
        passwordError.setAttribute("aria-hidden", false);
        passwordError.setAttribute("aria-invalid", true);
        passwordInfo.innerHTML = "";

        return false;
    }else{
        passwordError.innerHTML = "";
        passwordInfo.innerHTML = "Use 8 or more characters with a mix of letters and numbers";
    }

    const repassword = document.getElementById("re-password");
    let z = repassword.value;

    if(z != "" && z != y){
        const repasswordError = document.getElementById("repasswordError");
        repasswordError.classList.add("visible");
        repassword.classList.add("invalid");
        repasswordError.setAttribute("aria-hidden", false);
        repasswordError.setAttribute("aria-invalid", true);

        return false;
    }else{
        repasswordError.innerHTML = "";
    }
}

