<?php

function handle_request() {
    if (isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['language']) && isset($_POST['agree_terms']) && isset($_POST['birthdate'])) {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $language = $_POST['language'];
        $agree_terms = $_POST['agree_terms'];
        $birthdate = $_POST['birthdate'];

        $data = array(
            "username" => $username,
            "fullname" => $fullname,
            "password" => $password,
            "email" => $email,
            "language" => $language,
            "agree_terms" => $agree_terms,
            "birthdate" => $birthdate
        );

        $json_data = json_encode($data, JSON_PRETTY_PRINT);

        echo "<pre>";
        echo $json_data;
        echo "</pre>";

        $file_name = "user_data.json";
        file_put_contents($file_name, $json_data);

    } else {
        echo "Error: Niet alle velden zijn ingevuld.";
    }
}

handle_request();

?>
