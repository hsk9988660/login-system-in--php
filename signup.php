 <!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>signup</title>
  </head>
  <body>
  <?php

  $showalert=false;
  $showerr=false;
require 'partail/new.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
  $showalert=false;
 
  require 'partail/dbcoonect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  
$existsql="SELECT * FROM users where username='$username' ";
$result=mysqli_query($conn,$existsql);
$numrows=mysqli_num_rows($result);
if ($numrows>0) {
 $showerr= 'username already exist';
}else{
// $_POST is global variable and is use to collect information from form which user enter
// $_SERVER is a global super variable that hold information regarding HTTP headers,path,
// and script location .
if(($password==$cpassword)){
  $sql="INSERT INTO `users` ( `username`, `password`, `date`) VALUES ( '$username', '$password', '2021-09-03 06:52:37.000000');";
  $result=mysqli_query($conn,$sql);
  if( $result){
    $showalert=true;
      }
}
  else{
  
  $showerr='password do not match';
  }
  
}
}
     ?>
     <?php
if($showalert){
  echo  "<div class='alert alert-dark' role='alert'>
  you are  signup      <strong>successfuly</strong>
  </div>";
}
  if($showerr){
    echo "<div class='alert  alert-danger ' role='alert'>
    $showerr

    </div>";
}
  
?>
    <div class="container"> 
      <h1 class="text-center"> signup</h1>
      <form action="/login system/signup.php" method='POST' class="col-md-6">
  <div class="form-group  col-md-6" >
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
    <small id="emailHelp" class="form-text text-muted">your username</small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" name="password">
  </div>
  <div class="form-group">
    <label for="cPassword"> confirm Password</label>
    <input type="password" class="form-control" id="cPassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">make sure your password  should be match</small>
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
</div>
 
  
    
   </body>


  </html>





