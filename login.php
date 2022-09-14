<?php
session_start();

$msg = "";

if (isset($_session['loggin_user'])) {
    header("location:my_posts.php");
}

if (isset($_POST['user'])) {

    $conn = mysqli_connect("localhost", "root","","diplo");

    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `students`(`name`, `email`, `password`) VALUES ('" . $_POST['user'] . "','" . $_POST['email'] . "','" . $_POST['pswd'] . "')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $msg = "<p style='color:green; text-align:center'> User Has been registred.  </p>";
    } else {

        $msg = "<p style='color:red; text-align:center'> User Has not been registred. </p>";
    }
}

if (isset($_POST['password'])) {

    $conn = mysqli_connect("localhost", "root", "", "diplo");
    $sql = "SELECT * FROM `students` WHERE  email='" . $_POST['email'] . "' and password='" . $_POST['password'] . "'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) == 1) {

        $row = mysqli_fetch_array($res);

        $_session['loggin_user'] = $row['name'];
        // die("User found");
        header("location:my_posts.php");
    } else {

        $msg = "<p style='color:red; text-align:center'><strong>Invalid Email or Password</strong></p>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="./style2.css">


</head>

<body>
    <div class="login-box">
    <a class="btn btn-primary">Login</button></a>

  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form method = "post" action= "login.php">
      
       
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

    

      
      <div class="form-outline mb-4">
        <input type="email" name="email" class="form-control" />
        <label class="form-label" for="loginName">Email </label>
      </div>

      
      <div class="form-outline mb-4">
        <input type="password" name="password" class="form-control" />
        <label class="form-label" for="loginPassword">Password</label>
      </div>

      
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          
          <a href="#!">Forgot password?</a>
        </div>
      </div>

     
      <button type="submit" name="login" value="login" class="btn btn-primary btn-block mb-4">login</button>

     
      <div class="text-center">
        <p>Not a member? <a href="#!">Register</a></p>
      </div>
    </form>
  </div>
   </div>
</div>
<div class="register-box">
  <a class="btn btn-primary">Register</a>
  
   <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    <form method = "post" action= "login.php">
      
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

    

      
      <div class="form-outline mb-4">
        <input type="text" name="user" class="form-control" />
        <label class="form-label" for="registerName">Name</label>
      </div>


     
      <div class="form-outline mb-4">
        <input type="email" name="email" class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

     
      <div class="form-outline mb-4">
        <input type="password" name="pswd" class="form-control" />
        <label class="form-label" for="registerPassword">Password</label>
      </div>

    

      
      <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
          aria-describedby="registerCheckHelpText" />
        <label class="form-check-label" for="registerCheck">
          I have read and agree to the terms
        </label>
      </div>

      
      <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>
    </form>
  </div>
</div>

</div>



</body>

</html>