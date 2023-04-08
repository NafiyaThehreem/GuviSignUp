<?php
  if(empty($_POST["name"])){
    die("Name is required");
  }
  if(! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
    die("Valid email id required");
  }
  if(strlen($_POST["pass1"])<8){
    die("Password must be atleast 8 Characters");
  }
  if(! preg_match("/[a-z]/i",$_POST["pass1"])){
    die("Password must contain atleast one letter");
  }
  if(! preg_match("/[0-9]/",$_POST["pass1"])){
    die("Password must contain atleast one number");
  }
  if($_POST["pass1"] !== $_POST["pass2"]){
    die("Passwords must match");
  }
  // $pass1_hash = password_hash($_POST["pass1"],PASSWORD_DEFAULT);


  $host = "localhost";
  $dbname = "register_db";
  $username = "root";
  $password = "";

  $mysqli = new mysqli(hostname : $host , username : $username , password : $password , database : $dbname);

  if($mysqli->connect_errno) {
    die("Connection error : ".$mysqli->connect_error);
  }

  $sql = "INSERT INTO user(name,email,pass1_hash) VALUES(?,?,?)";
  $stmt = $mysqli->stmt_init();
  $stmt->prepare($sql);
  $stmt->bind_param("sss",$_POST["name"],$_POST["email"],$_POST["pass1"]);

  $sql1 = sprintf("SELECT * FROM user WHERE email = '%s'",$mysqli->real_escape_string($_GET["email"]));
  $result = $mysqli->query($sql1);
  $is_available =$result->num_rows === 0;
  header("Content-Type:application/json");
  echo json_encode(["available"=>$is_available]);

  if($stmt->execute()) {
    header('Location: http://localhost/guvi/login.html');
    exit;
  }else{
    if($mysqli->errno === 1062){
      die("email already taken");
    }else{
      die($mysqli->error." ".$mysqli->errno);
    }
  }


?>
