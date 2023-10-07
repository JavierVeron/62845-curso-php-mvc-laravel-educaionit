<?php

/**
* Ok so this looks pretty terrible, right? Everything is public and crappy method names!
*/
interface SendMailInterface
{
   public function setSendToEmailAddress($emailAddress);
   public function setSubjectName($subject);
   public function setTheEmailContents($body);
   public function setTheHeaders($headers);
   public function getTheHeaders();
   public function getTheHeadersText();
   public function sendTheEmailNow();
}

/** Implementing that crappy interface **/
class SendMail implements SendMailInterface
{
   public $to, $subject, $body;
   public $headers = array();
   public function setSendToEmailAddress($emailAddress)
   {
       $this->to = $emailAddress;
   } 
   public function setSubjectName($subject)
   {
       $this->subject = $subject;
   }
   public function setTheEmailContents($body)
   {
       $this->body = $body;
   }
   public function setTheHeaders($headers)
   {
       $this->headers = $headers;
   }
   public function getTheHeaders()
   {
       return $this->headers;
   }
   public function getTheHeadersText()
   {
       $headers = "";
       foreach ($this->getTheHeaders() as $header) {
           $headers .= $header . "\r\n";
       }
   }
 
   public function sendTheEmailNow()
   {
       echo $this->to.' - '.$this->subject.' - '.$this->body.' - '.$this->getTheHeadersText();
   }
}


/** A facade wrapper around the crappy SendMail, to improve method names **/
class SendMailFacade
{
   private $sendMail;
   public function __construct(SendMailInterface $sendMail)
   {
       $this->sendMail = $sendMail;
   }
   public function setTo($to)
   {
       $this->sendMail->setSendToEmailAddress($to);
       return $this; //vean que es importante retornar this para poder anidar llamadas luego
   }
   public function setSubject($subject)
   {
       $this->sendMail->setSubjectName($subject);
       return $this;
   }
   public function setBody($body)
   {
       $this->sendMail->setTheEmailContents($body);
       return $this;
   }
   public function setHeaders($headers)
   {
       $this->sendMail->setTheHeaders($headers);
       return $this;
   }
   public function send()
   {
       $this->sendMail->sendTheEmailNow();
   }
}


$to      = "bob@marley.com";
$subject = "Bob Marley and the Wailers";
$body    = "Bob Marley and the Wailers were a Jamaican reggae band created by Bob Marley, Peter Tosh and Bunny Wailer.";
$headers = array(
   "From: Steve@Irwin.com"
);
 
// Using the minging SendMail class
$sendMail = new SendMail();
$sendMail->setSendToEmailAddress($to);
$sendMail->setSubjectName($subject);
$sendMail->setTheEmailContents($body);
$sendMail->setTheHeaders($headers);
$sendMail->sendTheEmailNow();
 
 echo '<br><br>';
 
// Using the sexy SendMailFacade class
$sendMail       = new SendMail();
$sendMailFacade = new sendMailFacade($sendMail);
$sendMailFacade->setTo($to)
			   ->setSubject($subject)
			   ->setBody($body)
			   ->setHeaders($headers)
			   ->send();