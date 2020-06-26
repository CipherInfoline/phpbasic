
<?php include('includes/header.php');?>
<?php include('includes/navbar.php'); ?>

<form class="" action="includes/login.php" method="post" enctype="multipart/form-data">
  <input type="text" name="username" value="" placeholder="Username">
  <input type="password" name="password" value=""placeholder="Password">
  <input type="file" name ="image" value=" " >
  <input type="submit" name="submit" value="submit">
</form>
<style>
  table,th,td{
    border: 1px solid;
  }
</style>

<?php

$innerjoin = "SELECT login.*,reg.email FROM login INNER JOIN reg ON login.id=reg.login_id";


 ?>
<table>
  <?php
  require 'dbconfig.php';
  $query = "SELECT * FROM login";
  $query_run = mysqli_query($connection,$query);
  if(mysqli_num_rows($query_run)>0)
  {
    while($row = mysqli_fetch_assoc($query_run))
    {
      //
      //
      ?>

  <tr>
    <th>Username</th>
    <th>Password</th>
    <th>Image</th>
  </tr>
  <tr>
    <td><?php echo $row['username']; ?></td>
    <td><?php echo $row['password']; ?></td>
    <td><img src="includes/upload/<?php echo $row['image']; ?>" alt="image"> </td>
    <td><form class="" action="includes/login.php" method="post">
        <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
        <button type="submit" value="delete"name="del"></button>
        </form>

    </td>

    <td><form class="" action="edit.php" method="post">


      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
      <button type ="submit" name ="btn">edit</button></td>
      </form>
  </tr>





  <?php
}
}
else {
echo "no record";
}

?>
</table>




  <?php include('includes/scripts.php'); ?>
  <?php include('includes/footer.php'); ?>
