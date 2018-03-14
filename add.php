<?php
session_start();
include ('server.php');
if(!isset($_SESSION['uid'])){
	header('location:login.php');
}
	$uid = $_SESSION['uid'];
if(isset($_POST['insert'])){
	$cat_id = $_POST['category'];
	echo $cat_id;
	$name = $_POST['name'];
	$description = $_POST['description'];
	$init_value = $_POST['init_value'];

	 $uploadOk = 0;
    // https://www.tutorialspoint.com/php/php_file_uploading.htm
    //To Do: Check the file size. It should be less than 50000.
    //To Do: Restrict the file type to jpg or jpeg or gif.
    //To Do: Uload the file using PHP move_uploaded_file() function
    //TO Do change the $uploadOk to 1 after above if above tasks are completed
    if(isset($_FILES['photo'])){
        $errors= array();
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $tmp = explode('.', $_FILES['photo']['name']);
        $file_ext=strtolower(end($tmp));
        $expensions= array("jpeg","jpg","png", "gif");
        if(in_array($file_ext,$expensions)=== false){
        	echo "extensions error";
           array_push($errors, "extension not allowed, please choose a JPEG or PNG file.");
        }
        
        if($file_size > 600000000) {
            array_push($errors, "File size must be excately 50 KB.");
        }
        
        if(empty($errors)==true) {
        	echo "noerror";
           move_uploaded_file($file_tmp,"uploads/".$file_name) or die("error moving file");
           $uploadOk = 1;
        }else{
		   print_r($errors);
		   
        }
     
    if ($uploadOk == 1) {
        $photo= $_FILES["photo"]["name"];
    $qry = "INSERT INTO `tble_add`(`uid`,`name`,`description`,`init_value`,`photo`) VALUES('$uid','$name','$description','$init_value','$photo');";
    //create an insert query to insert name, userid, description, ingredients, directions and photo name to recipe table
    // execute the query
    mysqli_query($conn,$qry) or die("Connection failed: " . $qry);
        header('location:view1.php');
    }
}
	//$sql = "INSERT INTO tble_add (uid, cid,name, description,init_value,end_date) VALUES ('$uid','$cat_id','$name','$description','$init_value','$end_date');";
	//mysqli_query($db,$sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Auction</title>
</head>
<body>
	<div class = "input_group">
		<h3>Add Your Items</h3>
	</div><br><br>
	<form method="post" action="" enctype="multipart/form-data"> 
		<select name="category">
			<option value="">Select Any One</option>
			<option name="sel" value="">Bus</option>
			<option name="sel" value="">Cars</option>
			<option name="sel" value="">Bikes</option>
			
		</select><br><br>
		
				Product Name<input type="text" name="name"><br><br>
                Description<textarea name="description"></textarea><br><br>
                Initialvalue<input type="text" name="init_value"><br><br>
                Photo<input type="file" name="photo" id="photo"><br><br>
                <input type="submit" name="insert" value="Click to Submit">	
	
		
	</form>
    
	
</body>
</html>