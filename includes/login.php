<?php
include('../dbconfig.php');

if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  $image = $_FILES["image"]["name"];

  if(file_exists("upload/".$_FILES["image"]["name"]))
  {
    $store = $_FILES["image"]["name"];
    echo "file exists";
    header('Location:../hello.php');
  }
  else{


  $query = "INSERT INTO login(username,password,image) VALUES('$username','$password','$image')";
  $query_run = mysqli_query($connection,$query);
  if($query_run)
  {
    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/".$_FILES["image"]["name"]);
    $path = "upload/$image";
    echo "value inserted";
    header('Location:../hello.php');
  }
  else {
    echo "Not inserted";
    header('Location:../hello.php');
  }
}
}
if(isset($_POST['del']))
{
  $id = $_POST['delete'];

  $query = "SELECT image FROM login WHERE id ='$id'";
  $query_run = mysqli_query($connection,$query);
  $row = mysqli_fetch_assoc($query_run);
  unlink("upload/".$row['image']);

  $query = "DELETE FROM login WHERE id ='$id'";
  $query_run = mysqli_query($connection,$query);
  if($query_run)
  {
    echo "value deleted";
    header('Location:../hello.php');
  }
  else {
    echo "Not deleted";
    header('Location:../hello.php');
  }
}
if(isset($_POST['edit_btn']))
{
  $id = $_POST['edit_id'];
  $name = $_POST['edit_name'];
  $pass = $_POST['edit_pass'];

  $query =  "UPDATE login SET username = '$name',password = '$pass'WHERE id ='$id'";
  $query_run = mysqli_query($connection,$query);
  if($query_run)
  {
    echo "value updated";
    header('Location:../hello.php');
  }
  else {
    echo "Not updated";
    header('Location:../hello.php');
  }
}



 ?>
