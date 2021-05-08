function valid_email(email){
    var error = "";
    if (!email.includes('@') || !email.includes(".") || email.length<6) 
        error = 'Not a valid email';

    else if ( ( email.indexOf('@') > email.lastIndexOf('.') ) ||
    ( (email.length - email.lastIndexOf('.')) < 4 ) ){
        error = 'Not a valid email';
    }
    setTimeout(() => document.querySelector("#email_errors").innerHTML = error, 1500);
}

function valid_pw(pw, pw_confirm) {
    var upper_case = 0, lower_case = 0, symbol = 0;
    var error = "", strength = "";
    
    for (let i = 0; i < pw.length; i++){
        if (pw[i].charCodeAt() >= 65 && pw[i].charCodeAt() <= 90) 
            upper_case = 1;
        else if (pw[i].charCodeAt() >= 97 && pw[i].charCodeAt() <= 122)
            lower_case = 1; 
        else symbol = 1;
    }

    if (pw != pw_confirm) {
        error = "Passwords do not match"
    }

    else if (pw.length < 6){
        strength = "Weak"
        error = "Minimum 6 characters";
    }
    else if ((lower_case && !upper_case && !symbol)){
        strength = "Weak"
        error = "try adding uppercase letters and symbols";
    } 
    else if ((lower_case && upper_case && !symbol) || (lower_case && !upper_case && symbol) || (!lower_case && upper_case && symbol) ){
        strength = "Average"
        error = "try adding symbols if you want a stronger password";
    }
    else if (lower_case && upper_case && symbol){
        strength = "Strong"
    }
    else {
        strength = "Weak"
        error = "Use symbols/numbers, upprecase and lowercase letters"
    }
    console.log(strength);


    setTimeout(() => {
        document.querySelector("#pw_errors").innerHTML = error;
        document.querySelector("#strength").innerHTML = strength;
        document.querySelector(".strength_text").style.visibility = "visible";
        }, 1000);
    
}

function valid_phone(phone) {
    var error = ""
    if (isNaN(phone)) error = "Not a valid number";
    setTimeout(() => document.querySelector("#phone_errors").innerHTML = error, 1500)
}

