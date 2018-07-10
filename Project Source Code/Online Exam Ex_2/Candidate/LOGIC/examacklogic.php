<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/UI/examackform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/UI/examconductorform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/BC/examack.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/BC/examconductor.php");

$host  = $_SERVER['HTTP_HOST'];
$ef = new Examinationform();
$af = new Ackform();
$exmn = new Examination();
$ack = new Aknowledgment();
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
else if(isset($_POST['welcome']))
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/Candidatewelcomelogic.php");
else if(isset($_POST['viewresult']))
{
$ack->unsetVariables();
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/viewresultlogic.php");
$_SESSION['givecertficate']=true;
}
else
{
$ack->unsetVariables();
$af->displayAcknowledgment();
}
?>
                      
               
