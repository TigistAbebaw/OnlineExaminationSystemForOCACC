<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
error_reporting(E_ALL);

Class  Aknowledgment
{
function unsetVariables()
{  
   $p=new Persistence();
   $p->connect();
    unset($_SESSION['starttime']);
    unset($_SESSION['endtime']);
    unset($_SESSION['tqn']);
    unset($_SESSION['qn']);
    unset($_SESSION['duration']);
	unset($_SESSION['final']);
    
	
}
}
?>
      
 

