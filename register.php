<?php
  require_once("nav.php");

  if(isset($_SESSION['id'])){

    header("Location: index.php");

  }
  if(isset($_POST['register'])){
    include_once("db.php");


    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $confirmPassword = strip_tags($_POST['confirmPassword']);
    $email = strip_tags($_POST['email']);

    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);
    $confirmPassword = stripslashes($_POST['confirmPassword']);
    $email = stripslashes($_POST['email']);

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);
    $confirmPassword = mysqli_real_escape_string($db, $confirmPassword);
    $email = mysqli_real_escape_string($db, $email);

    $password = md5($password);
    $confirmPassword =md5($confirmPassword);

    $sql_store = "INSERT into users (username, password, email) VALUES ( '$username', '$password', '$email')";
    $sql_fetch_username = "SELECT username FROM users WHERE username = '$username'";
    $sql_fetch_email = "SELECT email FROM users WHERE email = '$email'";

    $query_username = mysqli_query($db, $sql_fetch_username);
    $query_email = mysqli_query($db, $sql_fetch_email);

    if(mysqli_num_rows($query_username)){
      echo "Registered Username";
      echo "";
      return;

    }

    if ($username == ""){
      echo "Please insert a username";
      return;
    }

    if ($password == "" || $confirmPassword == ""){
      echo "Please insert your password";
      return;
    }

    if ($password != $confirmPassword){
      echo "The Password do not match!";
      echo "";
      return;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == ""){
      echo "Not a valid email!";
      return;
    }

    if (mysqli_num_rows($query_email)){
      echo "Email is already in use";
      return;
    }

    mysqli_query($db, $sql_store);

    header ("Location: index.php");


  }

  ?>

  <html lang="en">

    <head>
      <title>Register</title>
    </head>
    <body>
      <h1 style="font-family: Tahoma;">Register</h1>
      <form action="register.php" method="post" enctype="multipart/form-data">
        <input placeholder="Username" name="username" type="text" autofocus>
        <input placeholder="Password" name="password" type="password">
        <input placeholder="Confirm Password" name="confirmPassword" type="password">
        <input placeholder="E-Mail Address" name="email" type="text">
        <input name="register" type="submit" value="Register">
      </form>
    </body>

    <?php include_once("footer.php"); ?>

  </html>
