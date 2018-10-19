<html>
  <head>
    <title>Delete Posts</title>
    <link href="myStyle3.css"
          rel="stylesheet"
          type="text/css"/>
  </head>

  <body>
    <div class="content">
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
        echo "<p>No post is chosed to be deleted.</p>";
      }
      else
      {
        echo "<p>Here is the list of id of the posts that has been deleted:</p>";
        for($i=0;$i<count($deletes);$i++)
        {
          $target = $deletes[$i];
          $query = "DELETE FROM Posts WHERE post_id = '$target'";
          if ($result = $mysqli->query($query))
          {
            echo "<p>$target</p>";
            echo "<br>";
          }
        }
      }
      $result->free();
      $mysqli->close();
      ?>
  </div>
  </body>
</html>
