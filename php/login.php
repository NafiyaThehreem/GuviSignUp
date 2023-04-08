<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $host = "localhost";
  $dbname = "register_db";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($host ,$username , $password, $dbname);

  if(! $conn) {
    die("Connection error : ".mysqli_error());
  }


  if(isset($_POST["login"])){
    $email= $_POST["email"];
    $password= $_POST["password"];
    $sql = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' && pass1_hash = '$password'");

    if(mysqli_num_rows($sql) == true){
    header('Location: http://localhost/guvi/profile.html');
    }
    else{
      die("not valid user credentials");
    }
  }
}

?>
