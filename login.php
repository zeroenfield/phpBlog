<?php
  $title = "Bloggii";
  $the_sub_title = "Where Your Word Reach the World.";
  $the_image_url = "home-bg.jpg";
 ?>
<?php
  session_start();

  require_once("header.php");

  if(isset($_POST['login'])){

    include_once("db.php");

    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    $password = md5($password);

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    $db_password = $row['password'];
    /*$admin = $row['admin'];*/

    if( $password == $db_password ){

      $_SESSION['username'] = $username;
      $_SESSION['id'] = $id;
      /*if($admin == 1){
        $_SESSION['admin'] = 1;
      }*/
      header("Location: index.php");

    }else{
      echo "You didn't enter the correct details.";
    }

  }

  ?>

  <html lang="en">

    <head>
      <title>Login</title>
    </head>
    <body>
      <h1 align ="center" style="font-family: Tahoma;">Login</h1>
      <center><form action="login.php" method="post" enctype="multipart/form-data">

        <div class="divTable" style="width: 50%;" >
        <div class="divTableBody">
        <div class="divTableRow">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="divTableCell">&nbsp;<input placeholder="Username" name="username" type="text" autofocus><br /></div>
        </div>
        <div class="divTableRow">
        <div class="divTableCell">&nbsp;<input placeholder="Password" name="password" type="password"><br /></div>
        </div>
        <div class="divTableRow">
        <div class="divTableCell">&nbsp;<input name="login" type="submit" value="login"></div>
        </div>
        </div>
        </div>

      </form>
    </body>

    <?php include_once("footer.php"); ?>

  </html>
