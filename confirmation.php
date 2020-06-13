<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>

<?php 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    echo "<h1>Dear customer {$name} ,your order will be delivered soon to the corresponding address .</h1>";
}

?>
   <?php include "includes/footer.php" ?>