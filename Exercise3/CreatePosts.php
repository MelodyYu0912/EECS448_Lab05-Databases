<html>
  <head>
    <title> Create a post </title>
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
        $post = $_POST['post'];

        if (($post == '') || ($username == ''))
        {
          echo "<p>Error: Both content and username needs to be filled out.</p>";
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
                  echo "<p>Your new post is created!</p>";
                }
                exit();
              }
            }
            echo "<p>Error: user does not exist in the database!</p>";
            $result->free();
          }
        }
        $mysqli->close();
      ?>
    </div>
  </body>
</html>
