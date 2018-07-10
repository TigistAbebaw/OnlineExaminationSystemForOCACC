<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/UI/loginform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/BC/login.php");


$lf=new Loginform();
$account=new Account();
error_reporting(E_ALL);
if(isset($_POST['submit']))//name of login button
{
$account->collectLogindata();
$errorvald = $account->validateCandidate();
//validate empty text field
if(count($errorvald)>0)
{
$lf->displayLoginform($account,$errorvald);
}
else
{
$r = $account->authenticateCandidate();
//validate if user is registered
if(!$r)
{
$errorauth = $account-> errorDisplay();
$lf->displayLoginform($account,$errorauth);
}

else
{
session_start();
$account->loginCandidate($r);
header('Location: LOGIC/candidatewelcomelogic.php');
}
}
}
else if(isset($_POST['register']))
 header('Location: LOGIC/registercandidatelogic.php');
 
else
$lf->displayLoginform($account,array());

?>