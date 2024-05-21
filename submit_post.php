<?php

require("connection.php"); // Include your database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = mysqli_real_escape_string($conn, $_POST["title"]);
  $writer = mysqli_real_escape_string($conn, $_POST["writer"]);
  $post_type = mysqli_real_escape_string($conn, $_POST["type"]);
  $description = mysqli_real_escape_string($conn, $_POST["description"]);

  $sql = "INSERT INTO posts (title, writer, type, description) VALUES ('$title', '$writer', '$post_type', '$description')";

  if (mysqli_query($conn, $sql)) {
    echo "Post created successfully!";
  } else {
    echo "Error creating post: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  // Not a POST request, potentially redirect or display an error message
  echo "Invalid request method.";
}

?>
