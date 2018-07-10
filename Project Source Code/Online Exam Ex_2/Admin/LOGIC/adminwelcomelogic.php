<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Admin/UI/adminwelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Admin/BC/adminwelcome.php");

/* Redirect to a different page in the current directory that was requested */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');



$awf=new Adminwelcomeform();
$awel=new WelcomeAdmin();
session_start();

error_reporting(0);
if(isset($_SESSION['admname']))
{
$awf->displayAdminwelcomeform();
}
else
{
$error = $awel->checkError();
$awf->displayRelogin($error);
}
if(isset($_POST['logout']))
{
session_destroy();
header("Location: http://$host/Online Exam Ex_2/Website/UI/home.php");
}
else if(isset($_POST['Managecandidate']))
header("Location: http://$host/Online Exam Ex_2/Admin/LOGIC/Managecandidatelogic.php");


else if(isset($_POST['Managecompetency']))
header("Location: http://$host/Online Exam Ex_2/Admin/LOGIC/managecompetencylogic.php");

else if(isset($_POST['Managesector']))
header("Location: http://$host/Online Exam Ex_2/Admin/LOGIC/Managesectorlogic.php");

else if(isset($_POST['login']))
header("Location: http://$host/Online Exam Ex_2/Website/UI/home.php");
else
$nothig="no";
?>