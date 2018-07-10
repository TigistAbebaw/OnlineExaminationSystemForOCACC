<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Admin/UI/adminloginform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Admin/BC/adminlogin.php");


$lf=new AdminLoginform();
$account=new Adminaccount();

if(isset($_POST['admsubmit']))//name of login button
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
header('Location: LOGIC/adminwelcomelogic.php');
}
}
}
 
else
$lf->displayLoginform($account,array());

?>