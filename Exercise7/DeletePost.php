<html>
  <head>
    <title>Delete Posts</title>
  </head>

  <body style="background-color:rgb(179, 204, 230); font-family: arial">
    <?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "x864y008", "aeriph9U", "x864y008");
    if ($mysqli->connect_errno)
    {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $deletes = $_POST["posts"];
    if (count($deletes) == 0)
    {
      echo "No post is chosed to be deleted.";
    }
    else
    {
      echo "Here is the list of id of the posts that has been deleted:";
      echo "<br>";
      for($i=0;$i<count($deletes);$i++)
      {
        $target = $deletes[$i];
        $query = "DELETE FROM Posts WHERE post_id = '$target'";
        if ($result = $mysqli->query($query))
        {
          echo "$target";
          echo "<br>";
        }
      }
    }
    $result->free();
    $mysqli->close();
    ?>
  </body>
</html>
