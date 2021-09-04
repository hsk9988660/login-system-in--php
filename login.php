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
    <title>login</title>
  </head>
  <body>
  <?php

  $login=false;
  $showerr=false;
require 'partail/new.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
  require 'partail/dbcoonect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];

$sql="SELECT * FROM  users where username='$username' AND password='$password'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if( $num==1){

    $login=true;
    session_start();
    $_SESSION['logedin']=true;
    $_SESSION['username']=$username;
    header('location:welcome.php');

      }
  else{
  
  echo $showerr;
  }
  


}
     ?>
     <?php
if($login){
  echo  "<div class='alert alert-dark' role='alert'>
  you are  login     <strong>successfuly</strong>
  </div>";
}
  if($showerr){
    echo "<div class='alert  alert-danger ' role='alert'>
    $showerr

    </div>";
}
  
?>
    <div class="container"> 
      <h1 class="text-center"> login</h1>
      <form action="/login system/login.php" method='POST' class="col-md-6">
  <div class="form-group  col-md-6" >
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
    <small id="emailHelp" class="form-text text-muted">your username</small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">login</button>
</form>
</div>
 
  
    
   </body>


  </html>










  
    
  


  



