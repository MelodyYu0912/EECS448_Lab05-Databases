<html>
  <head>
    <title> User Table </title>
  </head>

  <body style="background-color:rgb(179, 204, 230); font-family: arial">
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

      echo "<table style='margin:10pt; text-align:center'>";
      echo "<tr>";
      echo "<th>No.</th>";
      echo "<th>Users</th>";
      echo "</tr>";
      //The first row of the table, include the header of two columns: number $ user_id

      while ($row = $result->fetch_assoc())
      {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$row["user_id"]."</td>";
        echo "</tr>";
        $i = $i + 1;
        //The content of each row in the table
      }
      echo "</table>";
      $result->free();
    }
    else
    {
      echo "No user stored in the database!";
    }
    $mysqli->close();
    ?>
  </body>
</html>
