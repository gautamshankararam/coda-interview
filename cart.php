<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    // session_destroy();
?>
<?php include "includes/db.php" ?>
<?php 

if(isset($_GET['add'])){
    $_SESSION['product_' . $_GET['add']]+=1;
    header("Location: checkout.php");
}
if(isset($_GET['remove'])){
    $_SESSION['product_' . $_GET['remove']]--;
    if($_SESSION['product_' . $_GET['remove']]<1){
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        header("Location: checkout.php");
    }else{
        header("Location: checkout.php");
    }
}

if(isset($_GET['delete'])){
    $_SESSION['product_' . $_GET['delete']]='0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    header("Location: checkout.php");

}

function cart(){
    $total=0;
    $item_quantity = 0;
    foreach($_SESSION as $name => $value){
        
        if($value>0){
            if(substr($name,0,8)== "product_"){
                $length =strlen($name-8);
                $id = substr($name,8,$length);



                global $connection;
                $query = "select * from item where item_id = '{$id}'";
                $send_query = mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($send_query)){
                    $sub = $row['item_price']*$value;
                    $item_quantity += $value;
                    
                    
                    $product = <<<DELIMETER
                    <tr>
                    <td>{$row['item_title']}</td>
                    <td>{$row['item_price']}</td>
                    <td>{$value}</td>
                    <td>{$sub}</td>
                    <td><a class="btn btn-warning" href="cart.php?remove={$row['item_id']}"><span class="glyphicon glyphicon-minus"></span></a>
                    <a class="btn btn-success" href="cart.php?add={$row['item_id']}"><span class="glyphicon glyphicon-plus"></span></a>
                    <a class="btn btn-danger" href="cart.php?delete={$row['item_id']}"><span class="glyphicon glyphicon-remove"></a></td>
                    </tr>
            
                    DELIMETER;
                    echo $product;

            
                }
                $total+=$sub;
                $_SESSION['item_total']=$total;
                $_SESSION['item_quantity']=$item_quantity;
                


    
            }

        }
       
    }
 

}
?>