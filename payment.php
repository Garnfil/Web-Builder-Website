<?php 
 $conn = mysqli_connect('localhost:3306','root','root','payment_form');
 
   if (!$conn) {
     echo 'Error: ' . mysqli_error($conn);
   }
   
  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $adress = mysqli_real_escape_string($conn, $_POST['adress']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $plan = mysqli_real_escape_string($conn, $_POST['plans']);
    $holder = mysqli_real_escape_string($conn, $_POST['holder']);
    $cardnum = mysqli_real_escape_string($conn, $_POST['cardnum']);
    $expiry = mysqli_real_escape_string($conn, $_POST['expiry']);
    $cvc = mysqli_real_escape_string($conn, $_POST['cvc']);
    
    $sql = "INSERT INTO payment(name, email, adress, zip, plan, holder, cardnum, expiry, cvc) VALUES('$name','$email', '$adress', '$zip', '$plan', '$holder', '$cardnum','$expiry','$cvc')";
    
    if (mysqli_query($conn, $sql)) {
      header('Location: index.html');
      echo '<h3>Thankyou! Your Subscription is successfully Ordered</h3>';
    } else {
      echo 'Error Request: ' . mysqli_error($conn);
    }
  }

?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Website Builder</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="payment-container">
    <div class="toggle-content">
      <span class="toggle"><i class="fas fa-adjust"></i></span>
    </div>
    
    <div class="payment-card">
      <div class="first-form">
        <form action="payment.php" method="POST" accept-charset="utf-8">
          <input type="text" name="name" id="" placeholder="Name" required/>
          <input type="email" name="email" id="" placeholder="Email" required/>
          <input type="text" name="adress" id="" placeholder="Adress" required/>
          <input type="text" name="zip" id="" placeholder="Zip Code" required/>
          <small>Choose a plan</small>
          <select name="plans" id="">
            <option value="Basic">Basic</option>
            <option value="Standard">Standard</option>
            <option value="Premium">Premium</option>
          </select>
      </div>
      <div class="second-form">
        <p>Secure Payment</p> </br>
          <label for="holder">Card Holder:</label>
          <input type="text" name="holder" id="" placeholder="Card Holder" required/>
          <label for="card_number">Card Number:</label>
          <input type="text" name="cardnum" id="" placeholder="Card Number"  data-mask="0000 0000 0000 0000" required/>
          <label for="">Expiry Date:</label>
          <input type="text" name="expiry" id="" placeholder="00 / 00" data-mask="00 / 00"/>
          <label for="cvc">CVC:</label>
          <input type="text" name="cvc" id="" placeholder="000" data-mask="00000" required/>
          <button type="submit" name="submit">Check Out</button>
        </form>
      </div>
    </div>
  </div>
  
  <!------FONT ICONS------->
 <script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
 
 <!-------JS FILE------->
  <script src="payment.js"></script>
  
 <!--------JQUERY PLUGIN---------->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</body>
</html>
