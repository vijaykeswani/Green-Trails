<?php 
 
 //This is the directory where images will be saved 
 $target = "ques/"; 
 $target = $target . basename( $_FILES['photo']['name']); 
 
 //This gets all the other information from the form 
 $sub=$_POST['sub']; 
 //$email=$_POST['email']; 
 //$phone=$_POST['phone']; 
 $pic=($_FILES['photo']['name']); 
 
 // Connects to your Database 
 mysql_connect("localhost", "root", "batman") or die(mysql_error()) ; 
 mysql_select_db("test") or die(mysql_error()) ; 
 
 //Writes the information to the database 
 mysql_query("INSERT INTO `test5` VALUES ('$sub', '$pic')") ; 
 
 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
 { 
 
 //Tells you if its all ok 
 echo "The file has been uploaded, and your information has been added to the directory"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 ?> 