<html>
  <head>
    <title>View User Posts</title>
  </head>

  <body style="background-color:rgb(179, 204, 230); font-family: arial">
    <?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "x864y008", "aeriph9U", "x864y008");
    if ($mysqli->connect_errno)
    {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $select = $_POST['select'];
    $query = "SELECT * FROM Posts WHERE author_id = '$select'";

    if ($result = $mysqli->query($query))
    {
      echo "<table style='margin:10pt; text-align:center'>";
      echo "<tr>";
      echo "<th>Post ID</th>";
      echo "<th>Content</th>";
      echo "</tr>";

      while ($row = $result->fetch_assoc())
      {
        echo "<tr>";
        echo "<td>".$row["post_id"]."</td>";
        echo "<td>".$row["content"]."</td>";
        echo "</tr>";
      }
      echo "</table>";
      $result->free();
    }
    else
    {
      echo "The user does not have any post yet!";
    }
    $mysqli->close();
    ?>
  </body>
</html>
