<?php

if($_SERVER["REQUEST_METHOD"]== "POST")
{
$show = false;
include "partial/dbconnect.php";
$fullname= $_POST['fname'];
$gender= $_POST['mygender'];
$dob= $_POST['dob'];
$highestdegree= $_POST['highest_degree'];
$universityname= $_POST['university_name'];
$universityroll= $_POST['university_rollno'];

   
$sql= "INSERT INTO `detail` ( `user_name`, `gender`, `dob`, `highest degree`, `university name`, `university roll no`, `date`) VALUES ('$fullname', '$gender', '$dob', '$highestdegree ', '$universityname', '$universityroll', current_timestamp())";
$result= mysqli_query($conn,$sql);
if($result){
    $show = true;
 }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->

<?php
 if($show){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your submittion sucess.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden = "true">&times;</span>
    </button>
    </div>';
}
?>    
<div class="container" >
    <h1 class="text-center"> Signup to our website </h1>
    <form action="project/partial/actualform.php" method="POST">




        <style type="text/css">
      
        
        label {
            border: 5px outset #0076ff;
            border-radius: 50px; 
            
            background: #428bca;
            color: rgb(244, 250, 250);
            padding-left: 4px;
            padding-right: 8px;
            padding-bottom: 8px;
            padding-top: 8px;
            margin-right: 5px;

        }
       
        </style>

        <div class= "form-group">
         <label for="fname">
            Full Name: <input type="text"  id="fname" name="fname">
          </label>
         </div>

        
       
         <div class="form-group"></div>
         <label for="mygender">
             Gender: Male <input type="radio" name="mygender" id="mygender"> Female <input type="radio" name="mygender" id="mygender">
             
        </label>
        </div>
        <div class="form-group">
         <label for="dob">
           Date of Birth: <input type="date" name="dob" id="dob" max="2020-02-20" min="1990-01-01" >
        </label>
        </div>
          <div class="form-group">
         <label for="highest_degree">
           Hightest Degree: <select id=highest_degree>
                <option value="10th"> select </option>
                <option value="12th"> 12th standard</option>
                <option value="diploma"> Diploma</option>
                <option value="graduation"> Graduation</option>
           </select>

        </label>
        </div>
        <div class="form-group">
         <label for="university_name">
            University Name: <input type="text" name="university_name" id="university_name">
        </label>
        </div>
        <div class="form-group">
         <label for="university_rollno">
            University Roll No: <input type="number+" title="numbers only" name="university_rollno" id="university_rollno">
        </label>
        </div>
        
        <div class="form-group">
        <label for="but">
        <button type="submit" id="but" class="btn btn-primary">Submit</button>   
        </label>
        </div>
        <div class="form-group">
        <label for="rest">
        <button type="reset" id="rest" class="btn btn-primary">Reset</button>    
       </label>  
      </div>

    
    </form>
</div>


  </body>
</html>
