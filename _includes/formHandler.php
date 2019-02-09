<?php
$errors = "";
  if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['name'])) {

    if(isset($_FILES['image']) || !empty($_FILES['image'])) {

      function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
          foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
          }
        }
        return $file_ary;
      }

      if (isset($_FILES['image'])) {
        $file_ary = reArrayFiles($_FILES['image']);

        foreach ($file_ary as $file) {
          $errors;
          $file_name = $file['name'];
          $file_size = $file['size'];
          $file_tmp = $file['tmp_name'];
          $file_type = $file['type'];
          $file_ext = explode('.',$file['name']);
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
      }
    }

    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $message = $_REQUEST['comments'];
    if (isset($_FILES['image']) || !empty($_FILES['image'])) {
     $message .= " <br /> <br /> <br /> --- " . $name . " attached the following files --- <br />";
    }
    require("phpmailer/PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "smtp.123-reg.co.uk";
    $mail->SMTPAuth = true;
    $mail->Username = "hello@elisweb.co.uk"; // SMTP username
    $mail->Password = "Relapse93!"; // SMTP password
    if (isset($_FILES['image']) || !empty($_FILES['image'])) {
      $file_ary = reArrayFiles($_FILES['image']);
      foreach ($file_ary as $file) {
        $file_name = $file['name'];
        $mail->addAttachment("uploads/".$file_name);
      }
    }
    $mail->From = $email;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom($email, $name);
    $mail->addReplyTo($email, $name);
    $mail->addAddress("ely.nathan93@gmail.com", "Eli Nathan");
    $mail->Subject = "You have an email from a website visitor!";
    $mail->Body ="
    Name: $name<br />
    Email: $email<br />
    Comments: $message<br />";
    $mail->IsHTML(true);
    $mail->AltBody = $message;

    if(!$mail->Send()) {
      $errors = "Message could not be sent. Please try again later or email us at <a href='mailto:hello@fresh-print.com?subject=Website enquiry&body=".isset($_REQUEST['comments']) ? $message = $_REQUEST['comments'] : $message = "";
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
