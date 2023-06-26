<?php
// Извличане на входните данни от формата за вход
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Проверка дали потребителското име е попълнено
    if (empty($username)) {
      $username_err = "Моля, въведете потребителско име.";
    }

    // Проверка дали паролата е попълнена
    if (empty($password)) {
      $password_err = "Моля, въведете парола.";
    }

    // Ако няма грешки, проверка за наличие на потребителя в базата данни
    if (empty($username_err) && empty($password_err)) {
      $sql = "SELECT id, username, password FROM users WHERE username = ?";
      if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        if ($stmt->execute()) {
          $stmt->store_result();

          if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $username, $hashed_password);
            if ($stmt->fetch()) {
              if (password_verify($password, $hashed_password)) {
                // Валиден вход, запазване на сесията и пренасочване към началната страница
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                header("location: index.php");
              } else {
                // Грешна парола
                $password_err = "Грешна парола.";
              }
            }
          } else {
            // Не е намерен потребителят
            $username_err = "Потребителското име не е намерено.";
          }
        } else {
          echo "Нещо се обърка. Моля, опитайте отново по-късно.";
        }

        $stmt->close();
      }
    }

    $mysqli->close();
  }

  // Извличане на входните данни от формата за регистрация
  if (isset($_POST["register"])) {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Проверка за валидно потребителско име
    if (empty($username)) {
      $username_err = "Моля, въведете потребителско име.";
    } else {
      $sql = "SELECT id FROM users WHERE username = ?";
      if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        if ($stmt->execute()) {
          $stmt->store_result();

               if ($stmt->num_rows == 1) {
        $username_err = "Това потребителско име вече е заето.";
      } else {
        $username = trim($_POST["username"]);
      }
    } else {
      echo "Нещо се обърка. Моля, опитайте отново по-късно.";
    }

    $stmt->close();
  }
}

// Проверка за валиден email
if (empty($email)) {
  $email_err = "Моля, въведете email адрес.";
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_err = "Невалиден email адрес.";
  } else {
    $email = trim($_POST["email"]);
  }
}

// Проверка за валидна парола
if (empty($password)) {
  $password_err = "Моля, въведете парола.";
} elseif (strlen($password) < 6) {
  $password_err = "Паролата трябва да съдържа поне 6 символа.";
} else {
  $password = trim($_POST["password"]);
}

// Проверка за потвърждение на паролата
if (empty($confirm_password)) {
  $confirm_password_err = "Моля, потвърдете паролата.";
} else {
  $confirm_password = trim($_POST["confirm_password"]);
  if (empty($password_err) && ($password != $confirm_password)) {
    $confirm_password_err = "Паролите не съвпадат.";
  }
}

// Ако няма грешки, запис на данните в базата данни
if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("sss", $param_username, $param_email, $param_password);
    $param_username = $username;
    $param_email = $email;
    $param_password = password_hash($password, PASSWORD_DEFAULT);

    if ($stmt->execute()) {
      // Регистрацията е успешна, пренасочване към страницата за вход
      header("location: login.php");
    } else {
      echo "Нещо се обърка. Моля, опитайте отново по-късно.";
    }

    $stmt->close();
  }
}

$mysqli->close();
  }
}
