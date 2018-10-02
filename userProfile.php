<?php
  session_start();
  $username = $_SESSION['username'];
  $title = "Welcome";
  $the_sub_title = "". $username ."";
  $the_image_url = "about-bg.jpg";
 ?>
<?php

  if(!isset($_SESSION['username'])){
    header("Location: login.php");
    return;
  }
  include_once( "db.php" );
  require_once( "nav.php");

 ?>

 <html lang="en">
 <head>
   <title>User Profile</title>
 </head>

 <body>

   <!--div class="divTable" style="width: 50%;" >
    <div class="divTableBody">
    <div class="divTableRow">
    <div class="divTableCell">&nbsp;<!?php echo $username; ?></div>
    </div>
    <div class="divTableRow">
    <div class="divTableCell">&nbsp;<!?php echo $email; ?></div>
    </div>
    <div class="divTableRow">
    <div class="divTableCell">&nbsp;<!?php echo $firstname; ?></div>
    </div>
    <div class="divTableRow">
    <div class="divTableCell">&nbsp;<!?php echo $lastname; ?></div>
    </div>
    <div class="divTableRow">
    <div class="divTableCell">&nbsp;<!?php echo $about; ?></div>
    </div>
    <div class="divTableRow">
    <div class="divTableCell">&nbsp;<b id = "logout"><a href="logout.php">Logout</a></b></div>
    </div>
    </div>
  </div-->

   <?php

    $sql_list = "SELECT * FROM users WHERE username = '$username'";
    $res = mysqli_query($db, $sql_list) or die(mysqli_error($db));
    $names = "";
    $button = "";

    if(mysqli_num_rows($res) > 0 ){

      while ($row = mysqli_fetch_assoc($res)){

        $id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $about = $row['about'];

        $names .= "<br /><div class='container'><div class='row'><div class='col-lg-8 col-md-10 mx-auto'<div class='divTable' style='width: 50%;' ><div class='divTableBody'><div class='divTableRow'><div class='divTableCell'>&nbsp;<center>First Name: &nbsp;$firstname</div></div><hr /><div class='divTableRow'><div class='divTableCell'>&nbsp;<center>Last Name: &nbsp;$lastname</div></div><hr /><div class='divTableRow'><div class='divTableCell'><center>&nbsp;Email: &nbsp;$email</div></div><hr /><div class='divTableRow'><div class='divTableCell'>&nbsp;<center>About: &nbsp;$about<hr /></div></div></div>";

        /*$button = "<div class='overlay'><div class='container'><div class='row'><div class='col-lg-8 col-md-5 mx-auto'><div class='divTable' style='width: 50%;' ><div class='divTableBody'><div class='divTableRow'><div class='divTableCell'>&nbsp;</div><center><a href='edit_profile.php'>Edit Profile</a></div><br /><div class='divTableCell'>&nbsp;Change Password</div></div>";*/

      }

      echo $names;
      echo "<center><a href='edit_profile.php'>Edit Profile</a>";

    }

     /*$id = $_SESSION['username'];
     $sql = "SELECT * FROM users WHERE username ='$id'";

     $get = mysqli_query($db, $sql) or die(mysqli_error($db));
     $get2 = mysqli_fetch_assoc($get);
     $username = $get2['username'];
     */
   ?>

   <?php include_once("footer.php"); ?>

 </body>

 </html>
