<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: login.php");
    return;
  }
  include_once( "db.php" );

  if (isset($_POST['firstname']) && isset($_POST['lastname'])){
    if($_POST['firstname'] != "" && $_POST['lastname'] !== ""){
      $first = $_POST['firstname'];
      $last = $_POST['lastname'];
      $sql_store = "INSERT into names (id, firstname, lastname) VALUES (NULL, '$firstname', '$lastname')";
      $sql = mysqli_query($db, $sql_store) or die (mysqli_error($db));

      echo "Your entered '$firstname $lastname' into the database.";
    } else{
      echo "Cannot be blank";
    }
  } else {
    echo "Cannot be blank";
  }

  /*$id = $_GET['id'];
  $id = mysqli_real_escape_string($db, $id);
  $query = "SELECT * FROM blog WHERE id ='". $_SESSION['id'] ."'";
  $res = mysqli_query($db, $query) or die(mysqli_error($db));

  if(mysqli_num_rows($res) > 0){

    while($row = mysqli_fetch_array($res)){

      echo "<br><br>";
      echo $row['firsname'];
      echo $row['lastname'];
      echo $row['about'];

    }

  }*/

?>

<html lang="en">
  <head>
    <title>User Profile Page</title>
  </head>
    <body>
      <div id="container">
       <div id="menu">
         <a href="index.php">Home</a>
         <a href="account.php">Profile</a>
         <a href="logout.php">Logout</a>
       </div>

       <strong><u>Update name</u></strong>
       <form action="profile.php?update=name" method="POST">
         First Name : <input type="text" name="fName" value=<?php echo $_POST['firstname']; ?> />
         Last Name : <input type="text" name="lName" value=<?php echo $_POST['lastname']; ?> />
         <input type="submit" name="nameSubmit" value="update">
       </form>
     </div>
    </body>

</html>
