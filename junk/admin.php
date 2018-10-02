
<?php
    session_start();
    include_once ( "db.php" );

    if(!isset( $_SESSION['admin']) && $_SESSION['admin'] != 1 ){
      header("Location: login.php");
      return;
    }

    

?>

<!--?php require_once( "header.php" ); ?-->

<html lang="en">



    <body>

      <?php

        $sql = "SELECT * FROM blog ORDER BY id DESC";

        $res = mysqli_query($db, $sql) or die(mysqli_error($db));

        $post = "";

        if(mysqli_num_rows($res) > 0){

          while($row = mysqli_fetch_assoc($res)){
            $id = $row['id'];
            $title = $row['title'];
            $date = $row['date'];

            $admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<div><a href='edit_post.php?pid=$id'>Edit</a>&nbsp;</div>";

            $post .= "<div><h2><a href='view_post.php?pid=$id' target='_blank'>$title</a></h2><h3>$date</h3>$admin<hr /></div>";

          }

          echo $post;

        } else {
          echo "There are no post to display!";

        }

        echo "<br /><a href='index.php' target='_blank'>Home</a>&nbsp<a href='post.php' target='_blank'>Post</a>";

      ?>

      <a href ='post.php' target='_blank'>Post</a>

    </body>

</html>
