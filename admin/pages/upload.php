<?php

//insert to the db
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $username=$_POST['username'];
  $dob=$_POST['dob'];
  $Gender=$_POST['sex'];
  $phone=$_POST['phone'];
  $Email=$_POST['email'];
  $password=$_POST['password'];

  $sql="INSERT INTO customers (name,username,dob,gender,phone,email,password) Values('$name','$username','$dob','$Gender','$phone','$Email','$password')";
  $sql_query=mysqli_query($link,$sql);
  if($sql_query==TRUE){
    echo "<script>alert('Registration Succesfull.');</script>"; 
    echo "<script>window.location.href = 'auth-login-basic.php'</script>";
    
  }
  else{
    echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
  
  }
  // Close connection
  mysqli_close($link);
}

?>