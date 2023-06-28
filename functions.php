<?php

//DB connection

session_start();

// Create connection
$conn = new mysqli('localhost', 'root', '', 'cookingrecipes-1');

$username = "";
$email = "";
$country = "";
$errors = array();

// Check connection
/* if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully"; */


if (isset($_POST['register_btn'])) {
    register();
}

//REGISTRATION FORM
function register() {

    global $conn, $errors, $username, $email, $country;

    $username = e($_POST['username']);
    $email = e($_POST['email']);
    $password_1 = e($_POST['password_1']);
    $country = e($_POST['country']);
    $username_escape = mysqli_real_escape_string($conn, $username);
    $q = mysqli_query($conn, 'SELECT * FROM users WHERE 
            username="' . $username_escape . '"');

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if (empty($country)) {
        array_push($errors, "Country is required");
    }
    if (mb_strlen($username) < 3) {
        array_push($errors, "The name is too short");
    }
    if (mysqli_num_rows($q) > 0) {
        array_push($errors, "There is such a user");
    }

    if (mb_strlen($password_1) <= 5) {
        array_push($errors, "Password is too short");
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $query = "INSERT INTO users (username, email, password, country, userType) 
					  VALUES('$username', '$email', '$password', '$country', 'user' )";
        mysqli_query($conn, $query);

        $logged_in_user_id = mysqli_insert_id($conn);

        $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

function display_error() {
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}

function getUserById($id) {
    global $conn;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

function e($val) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($val));
}
