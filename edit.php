<?php include('includes/header.php');?>

<?php
require 'dbconfig.php';
$id =$_POST['edit_id'];
$query = "SELECT * FROM login WHERE  id ='$id'";
$query_run = mysqli_query($connection,$query);
if($query_run)
{
  foreach($query_run as $row)
  {
    ?>




<form class="" action="includes/login.php" method="post">
  <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
  <input type="text" name="edit_name" value="<?php echo $row['username']; ?>">
  <input type="text" name="edit_pass" value="<?php echo $row['password']; ?>">
  <input type="submit" name="edit_btn" value="">

</form>

    <?php
  }
}


 ?>
