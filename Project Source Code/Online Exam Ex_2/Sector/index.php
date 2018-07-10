<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/UI/sectorloginform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/BC/sectorlogin.php");


$lf=new SectorLoginform();
$account=new Sectoraccount();
session_start();
error_reporting(0);
if(isset($_POST['secsubmit']))//name of login button
{
$account->collectLogindata();
$errorvald = $account->validateUser();
//validate empty text field
if(count($errorvald)>0)
{
$lf->displayLoginform($account,$errorvald);
}
else
{
$r = $account->authenticateUser();
//validate if user is registered
if(!$r)
{
$errorauth = $account-> errorDisplay();
$lf->displayLoginform($account,$errorauth);
}

else
{
$account->loginUser($r);
header('Location: LOGIC/sectorwelcomelogic.php');
}
}
}
 
else
$lf->displayLoginform($account,array());

?>