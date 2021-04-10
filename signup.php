<?php 
$showAlert = false;
$showError = false;
 if($_SERVER["REQUEST_METHOD"]== "POST")
 {
    include 'partial/dbconnect.php';
    $username= $_POST["username"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];
    $exsitsSql = "SELECT * FROM anyone WHERE username ='$username'";
    $result = mysqli_query($conn,$exsitsSql);
    $numExsitsRows = mysqli_num_rows($result);
    if( $numExsitsRows> 0){
        $showError = "User already exits";
    }
    else{
    if($password == $cpassword){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql= "INSERT INTO `anyone` ( `username`, `password`, `datetime`) VALUES ( '$username', '$hash', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
                $showAlert= true;
            }
        }
        else{
            $showError= "password donot match ";
            }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>signup page</title>
  </head>
  <body>
    <?php require 'partial/_nav.php' ?>
    <?php 
    if($showAlert  ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden = "true">&times;</span>
        </button>
      </div>';
    }
    if($showError ){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden = "true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <div class="container" >
        <h1 class="text-center"> Signup to our website </h1>
        <form action= "/project/signup.php" method="POST" >
        <style type="text/css">
      
        
      label {
          border: 5px outset #0076ff;
          /* border-radius: 50px;  */
          
          background outline:5 px;
          color: black;
          padding-left: 4px;
          padding-right: 8px;
          padding-bottom: 8px;
          padding-top: 8px;
          margin-right: 5px;

      }
      </style>
            <div class="form-group col-md-6" >
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" maxlength="25" minlength="6">
               </div>
            <div class="form-group col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group col-md-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>