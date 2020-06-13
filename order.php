<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php  
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<form action="confirmation.php" method="post">
  <div class="form-group">
    <label for="Name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="Number">Phone Number:</label>   
    <input type="tel" id="phone" name="phone" >
  </div>
  <div class="form-group">
    <label for="Address">Address:</label>
    <input type="text" class="form-control" id="address" name="address">
  </div>
  <div class="form-group">
    <label for="Price">Total Price: <?php echo $_SESSION['item_total']; ?> </label>
  </div>
  
  
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
<?php include "includes/footer.php" ?>
