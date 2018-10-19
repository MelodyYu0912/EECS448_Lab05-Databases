<html>
  <head>
    <title>View User Posts</title>
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

      $select = $_POST['select'];
      $query = "SELECT * FROM Posts WHERE author_id = '$select'";

      if ($result = $mysqli->query($query))
      {
        echo "<table>";
        echo "<tr>";
        echo "<th style='font-family:verdana'>Post ID</th>";
        echo "<th style='font-family:verdana'>Content</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc())
        {
          echo "<tr>";
          echo "<td width='100'>".$row["post_id"]."</td>";
          echo "<td width='800'>".$row["content"]."</td>";
          echo "</tr>";
        }
        echo "</table>";
        $result->free();
      }
      else
      {
        echo "<p>The user does not have any post yet!</p>";
      }
      $mysqli->close();
      ?>
    </div>
  </body>
</html>
