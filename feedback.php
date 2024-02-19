<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link rel="stylesheet" href="register.css">
  
</head>
<body>
  <div id="inputContainer">
  <main>
    <h2>We value your opinion!</h2>
    <form action="#" method="post">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" required="true"><br><br>
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required="true"><br><br>
        <label for="feedback">Your feedback: </label><br>
        <textarea id="feedback" name="feedback" rows="4" required="true"></textarea>
        <br><br>
        <button type="submit">Submit feedback</button>
    </form>
</main>
</div>
<footer>
    &copy; All rights reserved.
</footer>
</body>
</html>
<?php

if(isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["feedback"])){
$name=$_POST["name"];
$email=$_POST["email"];
$feedback=$_POST["feedback"];

$conn=mysqli_connect("127.0.0.1:3307","root","","spotify-clone");
if(!$conn){
    die("Not connected".mysqli_connect_error());

}
else
{
    echo "Connected";
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $feedback = mysqli_real_escape_string($conn, $feedback);
    
    // Use a prepared statement to insert the feedback
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $feedback);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Feedback inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
    if($stmt){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Feedback successfully submitted")';  
        echo '</script>';
    }
    else{
        echo "Insertion failed";
    }

}
}
?>