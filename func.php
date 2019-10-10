<?php


  $connection = mysqli_connect("localhost", "root", "", "elecontact");


if ($_SERVER["REQUEST_METHOD"] =="POST"){

$raw_username= $_POST['contact_name'];
$raw_email =$_POST['contact_email'];
$raw_message= $_POST['contact_message'];



$c_username= filter_var($raw_username, FILTER_SANITIZE_STRING);
$c_email= filter_var($raw_email, FILTER_VALIDATE_EMAIL);
$c_message= filter_var($raw_message, FILTER_SANITIZE_STRING);





$querry = "INSERT INTO contact (name,e_mail,message) VALUES ('$c_username','$c_email','$c_message')";

$run_querry = mysqli_query($connection,$querry);



$message1 = " your message has been sent";
$message2 = "Sorry having difficulties sending your message, try again.";

 

if($run_querry){

    echo  "<script type='text/javascript'>alert('$c_username $message1');
    window.location = 'ele_comp.php';
    </script>"; 
   

    
}else{
    echo "<script type='text/javascript'>alert($message2);</script>";
}




mysqli_close($connection);

};






 ?>