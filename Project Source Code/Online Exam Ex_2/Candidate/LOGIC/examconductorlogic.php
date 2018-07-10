<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/UI/examconductorform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/BC/examconductor.php");

$host  = $_SERVER['HTTP_HOST'];

$ef = new Examinationform();
$exmn = new Examination();
session_start();
error_reporting(0);
if(!isset($_SESSION['candidateid']))
{
   $errort = $exmn->timeoutError();
   $ef->displayTimeout($errort);
}
else if (isset($_POST['logout']))
{
session_destroy();
header("Location: http://$host/Online Exam Ex_2/Website/UI/home.php");
}
else if(isset($_POST['login']))
header("Location: http://$host/Online Exam Ex_2/Candidate/index.php");
else if(isset($_POST['welcome']))
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/Candidatewelcomelogic.php");
else if(isset($_POST['next']) || isset($_POST['finalsubmit']))
{ 
 
  if(time()<$_SESSION['endtime'])
   {  
      $inserted=$exmn->insertCandanswer();
       if(!$inserted)
	   {  
	    $err1=$exmn->errorAnswernotinserted();
	     $ef->displayExamination($err1,array(),array(),array(),array());
	   }
	     
    if(isset($_POST['next']))
      {
	   $exmn->incrementQuestions();
	   header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/examconductorlogic.php");
	  }
	  else if(isset($_POST['finalsubmit']))
        {
		 unset($_POST['finalsubmit']);
      header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/examacklogic.php");
	       }
    }
   else //time out
   {
    header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/examacklogic.php");
	 
   }
}
/*else if(time()>strtotime($_SESSION['endtime']))//time out
   {
    //header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/examacklogic.php");
	
   }
*/else
{
$time=$exmn->createClock();
if(!$time)
{echo "no clock";
$err2=$exmn->noClockerror();
$ef->displayExamination($err2,array(),array(),array(),array());
}
else
{

$questions=$exmn->fetchQuestions();
$btnname=$exmn->chooseNextorFinal();
$ef->displayExamination(array(),$questions,$btnname,$time);
}

}
	 
 ?>