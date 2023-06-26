<!DOCTYPE html>
<html>
  <head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <h1>Регистрация</h1>
    <form action="" method="POST">
      <label for="username">Потребителско име:</label>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="email">Имейл:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <label for="password">Парола:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <label for="confirm-password">Потвърдете паролата:</label>
      <input type="password" id="confirm-password" name="confirm-password" required>
      <br>
      <input type="submit" value="Регистрация">
    </form>
  </body>
</html>
