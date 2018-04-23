<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];
  
  $email_from = "$visitor_email \r\n";
  
  /*CORRECT THE $to LINE BELOW + THEN DELETE THIS COMMENT LINE*/
  $to = "underwo6@seattleu.edu";
  
  $headers = "From: $visitor_email \r\n";
  $headers .= "Reply-To: $visitor_email \r\n";
  $email_subject = "From sunderwoodart.com";
  
  $email_body = "You have received news from $name.\n".   	  "Here's the message:\n $message";

  mail($to,$email_subject,$email_body,$headers);

  /*CORRECT THE Location: LINE BELOW (MAKING SURE OF RELATIVE LINK!)+ THEN DELETE THIS COMMENT LINE*/
  header('Location:newContactThank.html');


function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
                
    $inject = join('|', $injections);
    $inject = "/$inject/i";
     
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}
 
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>