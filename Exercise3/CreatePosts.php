<html>
  <head>
    <title> Create a post </title>
  </head>

  <body style="background-color:rgb(179, 204, 230); font-family: arial">
    <?php
      $mysqli = new mysqli("mysql.eecs.ku.edu", "x864y008", "aeriph9U", "x864y008");
      if ($mysqli->connect_errno)
      {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
      }

      $username = $_POST['userName'];
      $post = $_POST['post'];

      if (($post == '') || ($username == ''))
      {
        echo "Error: Both content and username needs to be filled out.";
        echo "<br>";
      }
      else
      {
        $query = "SELECT user_id FROM Users";
        if ($result = $mysqli->query($query)) //assign column user_id to $result
        {
          while ($row = $result->fetch_assoc()) //assign a row in the $result to $row each time
          {
            if ($username == $row["user_id"])
            {
              $query2 = "INSERT INTO Posts(content,author_id) VALUES ('$post','$username')";
              if ($mysqli->query($query2))
              {
                echo "Your new post is created!";
              }
              exit();
            }
          }
          echo "Error: user does not exist in the database!";
          $result->free();
        }
      }
      $mysqli->close();
    ?>
  </body>
</html>
