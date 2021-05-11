<?php

function valid_email($email) { 
    $error = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Not a valid email";
    }
    return $error;
}

function valid_pw($pw){
    echo "asd";
    $error = ""; 
    $strength = "";

    $upper_case = preg_match('/[A-Z]/', $pw);
    $lower_case = preg_match('/[a-z]/', $pw);

    foreach (str_split($pw) as $i) 
        $symbol = ((ord($i) >= 33 && ord($i) <= 47) || (ord($i) >= 58 && ord($i) <= 64) ||
          (ord($i) >= 91 && ord($i) <= 96) || (ord($i) >= 123 && ord($i) <= 126) || preg_match('/[0-9]/', $pw)) ? 1 : 0;

    if (strlen($pw) < 6) {
        $strength = "weak";
        $error  = "Minimum 6 characters";
    }

    else if ($lower_case && !$symbol && !$upper_case) {
        $strength = "weak";
        $error = "try adding uppercase letters and symbols/numbers";
    }

    else if (($lower_case && $upper_case && !$symbol) || ($lower_case && !$upper_case && $symbol) || (!$lower_case && $upper_case && $symbol)) {
        $strength = "Average";
        $error = "try adding symbols and uppercase letters if you want a stronger password";
    }

    else if ($lower_case && $upper_case && $symbol)
        $strength = "Strong";

    else {
        $strength = "Weak";
        $error = "Use symbols/numbers, upprecase and lowercase letters";
    }
    return [$strength, $error];
}

function valid_phone($phone){
    return ctype_digit($phone) ? "" : "Not a valid phone number";
}