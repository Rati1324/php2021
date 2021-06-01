pass = 1

function valid_email(email){
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var error = re.test(String(email).toLowerCase()) ? "" : "Not a valid email";
    setTimeout(() => document.querySelector("#email_errors").innerHTML = error, 1500);
    if (error != "") pass = 0;
    else pass = 1;
    disable_button_if_error();    
}

function valid_pw(pw) {
    var upper_case = 0, lower_case = 0, symbol = 0, number = 0;
    var error = "", strength = "";
    
    for (let i = 0; i < pw.length; i++){
        if (pw[i].charCodeAt() >= 65 && pw[i].charCodeAt() <= 90)
            upper_case = 1;
        else if (pw[i].charCodeAt() >= 97 && pw[i].charCodeAt() <= 122)
            lower_case = 1; 
        else if (pw[i].charCodeAt() >= 48 && pw[i].charCodeAt() <= 57)
            number = 1;
        else symbol = 1;
    }

    if (pw.length < 8){
        strength = "Weak"
        error = "Minimum 8 characters";
    }
    else if (lower_case && !upper_case && !symbol && !number){
        strength = "Weak"
        error = "Add atleast one uppercase letter and number";
    } 
    else if ((lower_case && upper_case && number)){
        strength = "Average"
        error = "try adding symbols if you want a stronger password";
    }
    else if (lower_case && number && upper_case && symbol){
        strength = "Strong"
    }
    else {
        strength = "Weak"
        error = "Add atleast one uppercase letter and number"
    }
    setTimeout(() => {
        document.querySelector("#pw_errors").innerHTML = error;
        document.querySelector("#strength").innerHTML = strength;
        if (error != " ") {
            document.querySelector(".strength_text").style.visibility = "visible";
            document.querySelector(".strength_text").style.position = "static";
        }
    }, 1000);
    if (strength == "Weak") pass = 0;
    else pass = 1;
    disable_button_if_error();
}

function valid_pw_confirm(pw_input, pw_confirm){
    var error = "";
    if (pw_input.value != pw_confirm) error = "Passwords do not match";
    document.querySelector("#pw_errors").innerHTML = error;
    if (error != "") pass = 0;
    else pass = 1;
    disable_button_if_error();
}

function valid_phone(phone) {
    var error = ""
    if (isNaN(phone)) error = "Not a valid number";
    setTimeout(() => document.querySelector("#phone_errors").innerHTML = error, 1000)
    if (error != "") pass = 0;
    else pass = 1;
    disable_button_if_error();
}
function disable_button_if_error(){
    var submit_btn = document.querySelector("#submit");
    if (pass == 1) {
        console.log("pass is 1")
        submit_btn.replaceWith(submit_btn.cloneNode(true));
    }
    else {
        submit_btn.addEventListener("click", (e) => e.preventDefault())        
        console.log("pass is 0")
    }
}
