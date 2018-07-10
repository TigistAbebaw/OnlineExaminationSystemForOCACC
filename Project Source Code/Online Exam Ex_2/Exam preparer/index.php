<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/exampreloginform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/BC/examprelogin.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprewelcomeform.php");


$lf=new AdminLoginform();
$account=new Adminaccount();
$examprep= new Adminwelcomeform();

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
echo "crate";
//validate if user is registered
if(!$r)
{
$errorauth = $account-> errorDisplay();
$lf->displayLoginform($account,$errorauth);
}

else
{
session_start();

$_SESSION['name']=$r['name'];
$_SESSION['examprepid']=$r['examprepid'];
  
/*echo $r['name'];
echo $r['password'];
echo $r['examprepid'];
echo $r['email'];*/
$rw = $account->getExamId();
if($rw){
$_SESSION['examid'] = $rw['examid'];
//echo "Exam Id" .$rw['examid'];}
//else
/*echo"wrong";*/
header("Location: ../Exam Preparer/LOGIC/examprewelcomelogic.php");
}

else{
$examNotAssigned = array();
$examNotAssigned["notAssigned"] = "You are not assigned to prepare an exam yet!";
$lf->displayLoginform($account,$examNotAssigned);
}
}

}
} 
else
$lf->displayLoginform($account,array());

?>