<?php 
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprewelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/BC/examprelogin.php");

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprepareinterfacee.php");



/* Redirect to a different page in the current directory that was requested */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$awf=new Adminwelcomeform();

$bc = new Adminaccount();
$qinfo= new Questionform();
error_reporting(0);
if(isset($_SESSION['name']))
{

$awf->displayadminWelcomeform("");
}

else
{

$error = $bc->checkError();
$awf->displayRelogin("",$error);

}


if(isset($_POST['logout']))
{
session_destroy();
header("location:home.php");
}


//else
//$nothig="no";




?>