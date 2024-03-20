<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];
    $fields = ['company_name', 'full_name', 'email', 'phone', 'choose_service'];

    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "Please fill in all fields.";
            break;
        }
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($errors)) {

        echo "Form submitted successfully!";

    } else {
        
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
} else {
    echo "Invalid request method.";
}

?>