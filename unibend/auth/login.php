<?php require "includes/header.php"; ?>
<?php require "includes/db.php"; ?>
<?php
      function sanitizeInput($input) {
        return htmlspecialchars(trim($input));
    }
    //session code
    session_start();
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user input
        $email = sanitizeInput($_POST["email"]);
        $password = sanitizeInput($_POST["password"]);
    
        // Query the database for the user
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($query);
    
        if ($result->num_rows == 1) {
            // Login successful
            $_SESSION['username'] = $email;
            echo "Login successful";
            header("Location: main.php");
            exit();
        } else {
            // Login failed
            echo "Invalid username or password";
        }
    }
    
    // Close the database connection
    $conn->close();
?>

<main class="form-signin w-50 m-auto">
  <form method="post" action="login.php">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1></br>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div></br>
    
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div></br>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
