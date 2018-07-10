<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/UI/sectorwelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/BC/sectorwelcome.php");

/* Redirect to a different page in the current directory that was requested */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');



$awf=new Sectorwelcomeform();
$awel=new Welcomesector();
session_start();

error_reporting(0);
if(isset($_SESSION['secname']))
{
$awf->displaysectorwelcomeform();
}
else
{
$error = $awel->checkError();
$awf->displayRelogin($error);
}
if(isset($_POST['logout']))
{
session_destroy();
header("Location: http://$host/Online Exam Ex_2/index.php");
}
else if(isset($_POST['ManageOccupation']))
header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/Manageoccupationlogic.php");

else if(isset($_POST['Manageexam']))
header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/Manageexamlogic.php");

else if(isset($_POST['login']))
header("Location: http://$host/Online Exam Ex_2/index.php");
else
$nothig="no";
?>