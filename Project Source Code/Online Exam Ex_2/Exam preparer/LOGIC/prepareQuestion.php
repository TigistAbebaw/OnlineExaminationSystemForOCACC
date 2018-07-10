<?php 
session_start();

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprepareinterfacee.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/BC/examprelogin.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprewelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/BC/exampreparerbc.php");


/* Redirect to a different page in the current directory that was requested */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
error_reporting(0);
$qinfo_ = new Questionform();
$bc = new Adminaccount();
$exmpr = new prepareexam();
$rlf=new Adminwelcomeform();


if(isset($_POST['Create']))
{
	
	$result = $exmpr->getNumberQuestionsPrepared($_SESSION['examid']);
	if($result["preparedQns"]<$result["totalquestions"])
		header("Location: http://$host/Online Exam Ex_2/Exam preparer/LOGIC/exampreparelogic.php");	
	else if($result["preparedQns"]>=$result["totalquestions"]){
		$status = "You have already prepared enough questions!";
		$rlf->displayadminWelcomeform($status);
	}
	

}

if(isset($_POST['logout']))
{
session_destroy();
unset ($_SESSION['admname']);
header("Location: http://$host/Online Exam Ex_2/Website/UI/home.php");
}

else if(isset($_POST['Home']))
{
header("Location: http://$host/Online Exam Ex_2/Exam preparer/LOGIC/examprewelcomelogic.php");	
}
if(isset($_POST['viewexam']))
{
$value1=$exmpr->QuestionChecker();

$qinfo_ ->displaytabelquestion($value1,"");
}


?>