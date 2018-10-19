<html>
  <head>
    <title> Create a user </title>
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

        $username = $_POST['userName'];
        $query = "INSERT INTO Users(user_id) VALUES ('$username')";
        $query2 = "SELECT user_id FROM Users";

        if ($username == '')
        {
          echo "<p>Error: Username cannot be empty!</p>";
          echo "<br>";
        }
        else
        {
          //$query is a string of MySQL code. Then query function is applying $query to the database that $mysqli is pointing at. Return value:bool.
          //Equivament to $mysqli->query("INSERT INTO Users(user_id) VALUES ($username)")，Skipped creating a $query value, which is on the Lab page.
          if ($mysqli->query($query))
          {
            echo "<p>New User Created!</p>";
            echo "<br>";
          }
          else
          {
            echo "<p>Error: User already existed!</p>";
            echo "<br>";
          }
        }

        $mysqli->close();
      ?>
    </div>
  </body>
</html>
