<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/UI/candidatewelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/BC/candidatewelcome.php");

/* Redirect to a different page in the current directory that was requested */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');



$cwf=new Candidatewelcomeform();
$wel=new Welcome();
session_start();
error_reporting(E_ALL);
if(!isset($_SESSION['0']))
{
$cwf->displayCandidatewelcomeform();
}
else
{
$error = $wel->checkError();
$cwf->displayRelogin($error);
}
if(isset($_POST['logout']))
{
session_destroy();
header("Location: http://$host/Online Exam Ex_2/Website/UI/home.php");
}
else if(isset($_POST['viewresult']))
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/viewresultlogic.php");

else if(isset($_POST['candexam']))
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/candidateexamlogic.php");

else if(isset($_POST['editprofile']))
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/editprofilelogic.php");

else if(isset($_POST['login']))
header("Location: http://$host/Online Exam Ex_2/Candidate/index.php");
else
$nothig="no";
?>