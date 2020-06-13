<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php require_once("cart.php"); ?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    // session_destroy();
?>


    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">

      <h1>Checkout</h1>

<form action="">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Item</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
           <?php @cart(); ?>
        </tbody>
    </table>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">
<?php 

echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity']='0' ;
?>

</span></td>
</tr>
<tr class="shipping">
<th>Delivery charge</th>
<td>0</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">
<?php 
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total']='0' ;
?>
</span></strong> </td>
</tr>

<?php

if(isset($_SESSION['item_quantity']) && $_SESSION['item_quantity']>0){
echo "<tr>
<td>
<form role='form' action='order.php' method='post' id='login-form' autocomplete='off'>
<input type='submit' name='order' id='btn-login' class='btn btn-custom btn-lg btn-block' value='order'>
</form>
</td>      
                       

</tr>";}
?>

</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->

 <?php include "includes/footer.php" ?>