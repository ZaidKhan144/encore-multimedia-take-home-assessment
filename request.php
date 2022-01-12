<?php

    function validateEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //Check Password
            validatePhone($_POST['pnumber']);
        }
        else {
            echo "Email";exit;
        }
    }

    function validatePhone($phone){
        if (validate_phone_number($phone) == true) {
           echo $_POST['fname'] . '~' . $_POST['lname'] . '~' . $_POST['email'] . '~' . $_POST['pnumber'];exit;
        } else {
            echo "Phone";exit;
        }
    }

    function validate_phone_number($phone){
        // Allow +, - and . in phone number
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);

        // Check the lenght of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 10) {
            return false;
        } else {
            return true;
        }
    }
    
    validateEmail($_POST['email']);
?>