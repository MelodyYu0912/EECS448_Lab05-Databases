<html>
  <head>
    <title> User Table </title>
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

      $query = "SELECT user_id FROM Users;";

      if ($result = $mysqli->query($query))
      {
        $i = 1;

        echo "<table>";
        echo "<tr>";
        echo "<th style='font-family:verdana'>No.</th>";
        echo "<th style='font-family:verdana'>Users</th>";
        echo "</tr>";
        //The first row of the table, include the header of two columns: number $ user_id

        while ($row = $result->fetch_assoc())
        {
          echo "<tr>";
          echo "<td width='50'>".$i."</td>";
          echo "<td width='400'>".$row["user_id"]."</td>";
          echo "</tr>";
          $i = $i + 1;
          //The content of each row in the table
        }
        echo "</table>";
        $result->free();
      }
      else
      {
        echo "<p>No user stored in the database!</p>";
      }
      $mysqli->close();
      ?>
    </div>
  </body>
</html>
