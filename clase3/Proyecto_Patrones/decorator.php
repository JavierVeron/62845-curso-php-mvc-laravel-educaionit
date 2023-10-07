<?php

interface eMailBody {
    public function loadBody();
}

class eMail implements eMailBody {
    public function loadBody() {
        echo "This is Main Email body.<br />";
    } 
}
 
abstract class emailBodyDecorator implements eMailBody {    
    protected $emailBody;    
    public function __construct(eMailBody $emailBody) {
        $this->emailBody = $emailBody;
    }  
    abstract public function loadBody();    
} 
 
class christmasEmailBody extends emailBodyDecorator {   
    public function loadBody() {     
        echo '<p style="color:white; background-color:black;">This is Extra Content for Christmas</p><br />';
        $this->emailBody->loadBody();        
    }   
}
 
class newYearEmailBody extends emailBodyDecorator {
    public function loadBody() {      
        echo 'This is Extra Content for New Year.<br />';
        $this->emailBody->loadBody();      
    }
}

/*Normal Email*/
$email = new eMail();
$email->loadBody();
// Output
//This is Main Email body.
 
/* Email with Xmas Greetings*/ 
$email = new eMail();
$email = new christmasEmailBody($email);
$email->loadBody();
// Output
//This is Extra Content for Christmas
//This is Main Email body.
 
/* Email with New Year Greetings*/
 
$email = new eMail();
$email = new newYearEmailBody($email);
$email->loadBody();
 
// Output
//This is Extra Content for New Year.
//This is Main Email body.
 
/*Email with Xmas and New Year Greetings*/
$email = new eMail();
$email = new christmasEmailBody($email);
$email = new newYearEmailBody($email);
$email->loadBody(); 
// Output
//This is Extra Content for New Year.
//This is Extra Content for Christmas
//This is Main Email body.


