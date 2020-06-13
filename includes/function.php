<?php 



function get_hotel(){
    global $connection;
    $query = "select * from hotel";
    $send_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($send_query)){
        echo " 
        <div class='col-sm-4 col-lg-4 col-md-4'>
                        <div class='thumbnail'>
                            <img src='images/{$row['hotel_image']}' >
                            <div class='caption'>
            
                                <h4>{$row['hotel_name']}</h4>
                                <a class='btn btn-primary'  href='hotel.php?id={$row['hotel_id']}'>View</a>
                            </div>
                            </div>
                    </div>";

        
        
    }
}

function get_item(){
    global $connection;
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "select * from item where item_hotel_id={$id}";
        $send_query = mysqli_query($connection,$query);
       while($row = mysqli_fetch_array($send_query)){
           echo "

           <div class='col-sm-4 col-lg-4 col-md-4'>
           <div class='thumbnail'>
               <img src='images/{$row['item_image']}'>
               <div class='caption'>
                   <h4 class='pull-right'>{$row['item_price']}</h4>
                   <h4>{$row['item_title']}</h4>
                   <a class='btn btn-primary'  href='cart.php?add={$row['item_id']}'>Add</a>
               </div>
               </div>
       </div>
           
           ";


    }
   }
}

?>