<?php 
include "server.php";
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
            <title>Online Auction</title>
            <link rel="stylesheet" href="style1.css">
    </head>   
    <body>
        <div class="header">
        

            <?php include "header.php"?>
        
        </div>
        <div class="content">
            <div class="disp">
                    <h2>Products</h2>
                    <ul class="products-ul">
                    <?php 
                    $uid=$_SESSION['uid'];
                    $qry = "SELECT * FROM `tble_add` where `uid`!=$uid";// make select query to get all rows from recipe table
                    $sql = mysqli_query($conn,$qry) or die("erro in query_ ".$qry); // execute the quert
                    if(mysqli_num_rows($sql)>0) { // if query returned some rows
                        while($row=mysqli_fetch_assoc($sql)) { // keep fetching rows using mysqli_fetch_assoc method
                           $imagepath ="uploads/".$row["photo"];//get imagepath from $row associative array
                           $productlink = "view.php?rid=".$row['tid']; // learn how we are doing this
                           $name = $row['name'];//get the recipe name
                           $description = $row['description'];//get the description of recipe
                           $initial_value=$row['init_value'];
                           echo "<li>";
                           echo "<img src='$imagepath' width='50%' height='50%'>";
                           echo "<h3><a href='$productlink'>$name</a></h3>";
                           echo "<p>$description</p>";
                           echo "<p>$initial_value</p>";
                           echo "</li>";
                        } 
                    } else { 
                        echo "<li>No Products</li>";
                    }
                    ?>
                    </ul>
            </div> 
            <p class="footer">&#169; Online Auction</p>
        </div>
    </body>  
</html>
