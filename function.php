<?php
require 'config.php';

if(isset($_POST["action"])){
  if($_POST["action"] == "insert"){
    insert();
  }
  else if($_POST["action"] == "edit"){
    edit();
  }
  else if($_POST["action"] == "delete"){
    delete();
  }
}

function insert(){
  global $conn;

  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $hobbies = implode(', ', $_POST["hobbies"]); // Convert hobbies array to a comma-separated string
  $interests = implode(', ', $_POST["interests"]); // Convert interests array to a comma-separated string
  $about = $_POST["about"];

  $query = "INSERT INTO users (name, email, gender, hobbies, interests, about) VALUES ('$name', '$email', '$gender', '$hobbies', '$interests', '$about')";
  mysqli_query($conn, $query);
  echo "Inserted Successfully";
}

function edit(){
  global $conn;

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $hobbies = implode(', ', $_POST["hobbies"]); // Convert hobbies array to a comma-separated string
  $interests = implode(', ', $_POST["interests"]); // Convert interests array to a comma-separated string
  $about = $_POST["about"];

  $query = "UPDATE users SET name = '$name', email = '$email', gender = '$gender', hobbies = '$hobbies', interests = '$interests', about = '$about' WHERE id = $id";
  mysqli_query($conn, $query);
  echo "Updated Successfully";
}

function delete(){
  global $conn;

  $id = $_POST["id"];

  $query = "DELETE FROM users WHERE id = $id";
  mysqli_query($conn, $query);
  echo "Deleted Successfully";
}
?>
