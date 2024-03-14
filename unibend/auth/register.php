<?php require "includes/header.php"; ?>
<?php require "includes/db.php"; ?>
<?php
if(isset($_POST['submit'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate data (you should add more validation as per your requirements)
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
      exit;
  }

  // Prepare SQL statement to insert data into the users table
  $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

  if ($conn->query($sql) === TRUE) {
      echo '<script>alert("User created successfully");</script>'; // Display JavaScript alert
      header("Location: login.php");
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>





<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1></br>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div></br>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div></br>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div></br>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">register</button>
    <h6 class="mt-3">Already have an account?  <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>
