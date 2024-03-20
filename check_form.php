<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];
    $fields = ['company_name', 'full_name', 'email', 'phone', 'choose_service'];

    $emptyFieldFound = false;

    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            if (!$emptyFieldFound) {
                readfile('field-error.html');
                $emptyFieldFound = true;
            }
        }
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        readfile('field-error.html');
        $emptyFieldFound = true;
    }

    if (empty($errors) && !$emptyFieldFound) {
        readfile('form-sent.html');
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
} else {
    echo "Invalid request method.";
}

?>
