<?php
  $title = "Bloggii";
  $the_sub_title = "Where Your Word Reach the World.";
  $the_image_url = "home-bg.jpg";
 ?>
<?php
    session_start();

    if(!isset($_SESSION['username'])){
      header("Location: login.php");
      return;
    }
    include_once( "db.php" );
    require_once( "nav.php" );

?>

<!--html lang="en">

    <body-->

      <?php

        require_once("nbbc/nbbc.php");

        $bbcode = new BBCode;

        $sql = "SELECT * FROM blog ORDER BY id DESC";

        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        $post = "";

        if(mysqli_num_rows($res) > 0){

          while($row = mysqli_fetch_assoc($res)){
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $date = $row['date'];

            $admin = "<div align='right'><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a>&nbsp;</div>";

            $output = $bbcode->Parse($content);

            $post .= "<section id='pid'><div class='container'><div class='row'><div class='col-lg-8 mx-auto'><h2>$title</a></h2><h3>$date</h3><p>$output</p>$admin<hr /></div>";

          }

          echo $post;

        } else {
          echo "There are no post to display!";

        }

        /* if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1 ){
          echo "<a href='admin.php'>Admin</a> | <a href='logout'>Logout</a>";
        }

        if(!isset($_SESSION['username'])){
          echo "<a href='login.php'>Login</a>";
        }

        if(!isset($_SESSION['username'])){
          echo "<a href='logout.php'>Logout</a>";
        } */

      ?>

      <?php include_once("footer.php"); ?>

    <!--/body>

</html-->
