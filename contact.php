<?php
   if(isset($_FILES['image'])){
      $errors;
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("","jpeg","jpg","png","pdf", NULL);
      
      if(in_array($file_ext,$expensions)=== false){
         $errors="<script>alert('Sorry! File extension not allowed, please choose a PDF, JPEG or a PNG file.')</script>";
      }
      
      if($file_size > 2097152) {
         $errors="<script>alert('Sorry, your file must be less than 2MB. Please try again')</script>";
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name);
          print '<meta http-equiv="refresh" content="0; url=thankyou.html" />';
      }else{
         print_r($errors);
          print '<meta http-equiv="refresh" content="0; url=thankyou.html" />';
          exit;
      }
   }
$email = $_REQUEST['email'] ;
$name = $_REQUEST['name'] ;
$phone = $_REQUEST['phone'] ;
$message = $_REQUEST['message'] ;
require("phpmailer/PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "SMTP HOST NAME HERE";
$mail->SMTPAuth = true; 
$mail->Username = "EMAIL ADDRESS HERE"; // SMTP username
$mail->Password = "PASSWORD HERE"; // SMTP password
$mail->addAttachment("uploads/".$file_name);
$mail->From = $email;
$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465;
$mail->addAddress("hello@fresh-print.com", "Craig Malloy");
$mail->Subject = "You have an email from a website visitor!";
$mail->Body ="
Name: $name<br>
Email: $email<br>
Telephone: $phone<br><br><br>
Comments: $message";
$mail->AltBody = $message;

if(!$mail->Send())
{
echo "Message could not be sent.";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}
print '<meta http-equiv="refresh" content="0; url=thankyou.html" />';

?>
