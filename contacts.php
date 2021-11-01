<?php 

$conn = mysqli_connect('localhost:3306','root','root','web_contacts');
 
   if (!$conn) {
     echo 'Error: ' . mysqli_error($conn);
   }
   
  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['fname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    $sql = "INSERT INTO webform( name, email, message) VALUES('$uname','$email', '$message')";
    
    if (mysqli_query($conn, $sql)) {
      header('Location: index.html');
    } else {
      echo 'Error Request: ' . mysqli_error($conn);
    }
  }

?>