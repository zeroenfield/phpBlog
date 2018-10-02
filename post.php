
<?php

    $title = "Create Post";
    $the_sub_title = "";
    $the_image_url = "post-bg2.jpg";

 ?>

<?php
    session_start();
    include_once("db.php");
    require_once("nav.php");

    if(isset($_POST['post'])){
      $title = strip_tags($_POST['title']);
      $content = strip_tags($_POST['content']);

      $title = mysqli_real_escape_string($db, $title);
      $content = mysqli_real_escape_string($db, $content);

      $date = date('l jS \of F Y h:i:s A');

      $sql = "INSERT into blog (title, content, date) VALUES ('$title', '$content', '$date')";

      if ($title == "" || $content == ""){

        echo "Please complete your post!";
        return;

      }

      mysqli_query ($db, $sql);

      header ("Location: index.php");

    }
?>

<html lang="en">
  <head>
  <title>Blog - Post</title>
  </head>
  <body>
    <form align="center" action="post.php" method="post" enctype="multipart/form-data">
      <input placeholder="Title" name="title" type="text" autofocus size="48"><br /><br />
      <textarea placeholder="Content" name="content" rows="20" cols="50"></textarea><br />
      <input name="post" type="submit" value="Post">
    </form>


  </body>

  <?php include_once("footer.php"); ?>

</html>
