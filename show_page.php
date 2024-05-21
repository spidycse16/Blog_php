<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Posts</title>
</head>
<body>
  <h1>All Posts</h1>
  <?php
  require("connection.php"); // Include your database connection details

  $sql = "SELECT * FROM posts";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table>
      <tr>
        <th>Title</th>
        <th>Writer</th>
        <th>Post Type</th>
        <th>Description</th>
      </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
        <td>" . $row["title"] . "</td>
        <td>" . $row["writer"] . "</td>
        <td>" . $row["type"] . "</td>
        <td>" . $row["description"] . "</td>
      </tr>";
    }
    echo "</table>";
  } else {
    echo "No posts found.";
  }

  mysqli_close($conn);
  ?>
</body>
</html>