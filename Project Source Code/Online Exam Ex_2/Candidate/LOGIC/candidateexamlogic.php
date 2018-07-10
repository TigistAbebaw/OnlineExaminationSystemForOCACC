<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/UI/candidateexamform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/BC/candidateexam.php");

$host  = $_SERVER['HTTP_HOST'];

$ef = new Examcodeform();
$exam = new Examentry();
session_start();
error_reporting(0);
//not logged in
if (!isset($_SESSION['candidateid']))
{
$errort = $exam->timeoutError();
$ef->displayTimeout($errort);
}
else if(isset($_POST['login']))
header("Location: http://$host/Online Exam Ex_2/Candidate/index.php");
else if(isset($_SESSION['starttime']))
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/examconductorlogic.php");
else if (isset($_POST['logout']))
{
session_destroy();
header("Location: http://$host/Online Exam Ex_2/Website/UI/home.php");
}
else if(isset($_POST['welcome']))
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/Candidatewelcomelogic.php");

//the askcode button is clicked
else if(isset($_POST['askcode']))
{
$exam->sessionExamid();//put test id on session.
$ef->displayEntertestcode(array());
}

//on the second page startexam is clicked.

else if(isset($_POST['startexam']))
{
$err1 = $exam->checkCodeempty();
 if(count($err1)==0)
  { //get testcode
   $valid = $exam->validateExamcode();
      if(!$valid)
	    {
		$err2= $exam->examcodeError();
	    $ef->displayEntertestcode($err2);
		}
	   else
	     {
	       $s= $exam->selectQuestion();
	          if(!$s)
	            {
			     $err3=$exam->quesnotfoundError();
	             $ef->displayNoexam($err3);
				}
				else
				{
				$exam->insertToexam();
				$d=$exam->inserttoCandidateanswer();
				   if(!$d)
				    {
					  $err4 = $exam->quesprepError();
				      $ef->displayNoexam($err4);
					  
				     }
				   else
				    { 
				     $exam->setSession();
					header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/examconductorlogic.php");
					 }
		        }		  
   }
   }
   else
      { $ef->displayEntertestcode($err1);
      }
}

else  
{

$rs=$exam->getExamdetail();
if(!$rs)
{
$errorn=$exam->noexamError();
$ef->displayNoexam($errorn);
}
else
{
$ef->displayOfferedtests($exam);
}
}
//the page is displayed.




?>