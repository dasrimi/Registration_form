<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: login.php");
    exit;
}
 $userid= $_SESSION["username"];
?>

<?php
 $showAlert = false; 
//  $showUser = false;
 if(isset($_POST['submit_data'])){
  include "partial/dbconnect.php";
   $fullname= $_POST["fname"];
   $gender= $_POST["mygender"];
   $dob= $_POST["dob"];
   $adharno= $_POST["adharno"];
   $email=$_POST["email"];
   $phno=$_POST["phno"];
   $highestdegree= $_POST["highest_degree"];
   $universityname= $_POST["university_name"];
   $universityroll= $_POST["university_rollno"];
  
   $get_user = mysqli_query($conn,"SELECT * FROM detail WHERE adharno='$adharno'");
   $numuser = mysqli_num_rows($get_user);
   if( $numuser> 0){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> Already submitted your form....
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
     <span aria-hidden = "true">&times;</span>
     </button>
   </div>';
  }
  
    
  else{ 
   
   $sql= "INSERT INTO `detail` ( username, `user_name`, `gender`, `dob`,adharno,email,phno, `highest degree`, `university name`, `university roll no`, `date`) VALUES ('$userid','$fullname', '$gender', '$dob','$adharno','$email','$phno', '$highestdegree ', '$universityname', '$universityroll', current_timestamp())";
   $result= mysqli_query($conn,$sql);
   if($result){
     $showAlert = true;
    }

  } 
 }
// if($_SERVER["REQUEST_METHOD"]== "POST")
// {
  
// include "partial/dbconnect.php";
// $fullname= $_POST["fname"];
// $gender= $_POST["mygender"];
// $dob= $_POST["dob"];
// $highestdegree= $_POST["highest_degree"];
// $universityname= $_POST["university_name"];
// $universityroll= $_POST["university_rollno"];

   
// $sql= "INSERT INTO `detail` ( `user_name`, `gender`, `dob`, `highest degree`, `university name`, `university roll no`, `date`) VALUES ('$fullname', '$gender', '$dob', '$highestdegree ', '$universityname', '$universityroll', current_timestamp())";
// $result= mysqli_query($conn,$sql);
// if($result){
//   $showAlert = true;



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>welcome</title>
  </head>
  <body>
  <?php require 'partial/_nav.php' ?>
<?php 
    
  


    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your submission sucessful.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden = "true">&times;</span>
        </button>
      </div>';
    }
    
?>
    <!-- <div class="container my-4" >
      <div class="alert alert-success" role="alert">
      <!-- <h4 class="alert-heading">userid:<?php echo $_SESSION["username"];?></h4> -->
     
        <!-- <br>  -->
        
        

    <div class="container" >
    <h1 class="text-center"> Enter your full details </h1>
    
    <form action="/project/welcome.php" method="POST">




        <style type="text/css">
      
        
        label {
            border: 5px outset #0076ff;
            border-style: double; 
            
            
            color: black;
            padding-left: 4px;
            padding-right: 8px;
            padding-bottom: 8px;
            padding-top: 8px;
            margin-right: 5px;

        } 
       
         </style> 

        <div class= "form-group">
         <label for="username" class="form-label">
         
            User Name: <?php echo $_SESSION["username"];?>
          </label>
         </div>

        <div class= "form-group">
         <label for="fname" class="form-label">
         
            Full Name: <input type="text"  id="fname" name="fname" placeholder="Fullname">
          </label>
         </div>

         <div class="form-group">
         <label for="mygender" class="form-level">

             Gender: Male <input type="radio" name="mygender" id="mygender"> Female <input type="radio" name="mygender" id="mygender">
        </label>
        </div>
&nbsp
        <div class="form-group">
         <label for="dob" class="form-level">

           Date of Birth: <input type="date" name="dob" id="dob" max="2020-02-20" min="1990-01-01" >
        </label>
        </div>&nbsp

        <div class="form-group">
         <label for="adharno" class="form-level">

           Adhar No: <input type="int" name="adharno" id="adharno" maxlength="12" >
        </label>
        </div>&nbsp

        <div class="form-group">
         <label for="email" class="form-level">

           E-mail: <input type="email" name="email" id="email">
        </label>
        </div>&nbsp

        <div class="form-group">
         <label for="phno" class="form-level">

           Mobile No: <input type="int" name="phno" id="phno" maxlength="10" >
        </label>
        </div>&nbsp

          <div class="form-group">
         <label for="highest_degree" class="form-level">

           Hightest Degree: <input type="text" name="highest_degree" id="highest_degree" >

        </label>
        </div>&nbsp

        <div class="form-group">
         <label for="university_name" class="form-level" onclick="validateForm()">

            University Name: <input type="text" name="university_name" id="university_name">
        </label>
        </div>&nbsp

        <div class="form-group">
         <label for="university_rollno" class="form-level">

            University Roll No: <input type="number+" title="numbers only" name="university_rollno" id="university_rollno">
        </label>
        </div>&nbsp
        
        <div class="form-group" >
        <label for="submit_data" class="form-level">

        <button type="submit" id="submit_data" name="submit_data" class="btn btn-primary">Submit</button>   
        </label>
        </div>&nbsp

        <div class="form-group" class="form-level">
        <label for="rest">

        <button type="reset" id="rest" class="btn btn-primary">Reset</button>    
       </label>  
      </div>

    
    </form>
</div>

</div>
    </div>

  


      <hr>
      <p ><div class="alert alert-info" role="alert" style="text-align: center">
  
 <b> You can logout when you want logout <a href="/project/logout.php"><i><mark> using this link.</mark></i></b></a></p>
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