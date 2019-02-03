<?php
$errors = "";
  if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['name'])) {

    if(isset($_FILES['image'])) {
      $errors;
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext = explode('.',$_FILES['image']['name']);
      $file_ext = end($file_ext);
      $file_ext = strtolower($file_ext);

      $extensions= array("","jpeg","jpg","png","pdf", NULL);

      if(in_array($file_ext,$extensions) === false){
        $errors = "Sorry! File extension not allowed, please choose a PDF, JPEG or a PNG file.'";
        isset($_REQUEST['email']) ? $email = $_REQUEST['email'] : $email = "";
        isset($_REQUEST['name']) ? $name = $_REQUEST['name'] : $name="";
        isset($_REQUEST['comments']) ? $message = $_REQUEST['comments'] : $message = "";
        print '<meta http-equiv="refresh" content="0; url=/?error='. $errors . '&email='.$email.'&name='.$name.'&message='.$message.'#contact" />';
        exit;
      }

      if($file_size > 8097152) {
        $errors = "Sorry, your file must be less than 8MB. Please try again";
        isset($_REQUEST['email']) ? $email = $_REQUEST['email'] : $email="";
        isset($_REQUEST['name']) ? $name = $_REQUEST['name'] : $name="";
        isset($_REQUEST['comments']) ? $message = $_REQUEST['comments'] : $message = "";
        print '<meta http-equiv="refresh" content="0; url=/?error='. $errors . '&email='.$email.'&name='.$name.'&message='.$message.'#contact" />';
        exit;
      }

      if(empty($errors) == "true") {
        move_uploaded_file($file_tmp,"uploads/".$file_name);
      }
    }

    $email = $_REQUEST['email'] ;
    $name = $_REQUEST['name'] ;
    $message = $_REQUEST['comments'] ;
    require("phpmailer/PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ely.nathan93@gmail.com"; // SMTP username
    $mail->Password = "519362et"; // SMTP password
    if(isset($file_name)) {
      $mail->addAttachment("uploads/".$file_name);
    }
    $mail->From = $email;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->addAddress("ely.nathan93@gmail.com", "Eli Nathan");
    $mail->Subject = "You have an email from a website visitor!";
    $mail->Body ="
    Name: $name<br>
    Email: $email<br>
    Comments: $message";
    $mail->IsHTML(true);
    $mail->AltBody = $message;

    if(!$mail->Send()) {
      $errors = "Message could not be sent. Please try again later or email us at hello@fresh-print.com";
      isset($_REQUEST['email']) ? $email = $_REQUEST['email'] : $email = "";
      isset($_REQUEST['name']) ? $name = $_REQUEST['name'] : $name = "";
      isset($_REQUEST['comments']) ? $message = $_REQUEST['comments'] : $message = "";
      print '<meta http-equiv="refresh" content="0; url=/?error='. $errors . '&email='.$email.'&name='.$name.'&message='.$message.'#contact" />';
      exit;
    }
    print '<meta http-equiv="refresh" content="0; url=/?mail=true#contact" />';
    exit;
  }


?>
