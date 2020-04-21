<?php
$result="";
if(isset($_POST['submit'])){
  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new phpmailer;

  $mail->Host='smtp.gmail.com';
  $mail->Port=587;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $mail->Username='paschal.ihenacho@gmail.com';
  $mail->Password=''

  $mail->setFrom($_POST['email'],$_POST['name']);
  $mail->addAddress('pascha.ihenacho@gmail.com');
  $mail->addReplyT($_POST['email'],$_POST['name']);

  $mail->isHTML(true);
  $mail->Subject='Form Submission: '.$_POST['subject'];
  $mail->Body='<h1 align=center>Name : '.$_POST['name'].'<br>
    Email: '.$_{POST['email'].'<br>Message: '.$_POST['msg'].'</h1>';

  if(!$mail->send()){
    $result="Something went wrong. Please try again.";
  }
  else{
    $result="Thanks ".$_POST['name']."for contacting me. I will get back to you soon!";
  }
}

?>