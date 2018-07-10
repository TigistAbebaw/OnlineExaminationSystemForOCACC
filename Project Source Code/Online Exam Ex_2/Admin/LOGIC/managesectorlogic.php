
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Admin/UI/managesectorform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Admin/BC/managesector.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Admin/UI/adminwelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Admin/BC/adminwelcome.php");


$host  = $_SERVER['HTTP_HOST'];

$sec = new  Sector();
$secf = new Sectorform();
$awf=new Adminwelcomeform();
$awel=new WelcomeAdmin();


session_start();
error_reporting(0);
//not logged in
if (!isset($_SESSION['admname']))
{
$error = $awel->checkError();
$awf->displayRelogin($error);
}
else if(isset($_POST['logout']))
header("Location: http://$host/Online Exam Ex_2/index.php");
else if(isset($_POST['welcome']))
header("Location: http://$host/Online Exam Ex_2/Admin/LOGIC/Adminwelcomelogic.php");
else if(isset($_POST['delete']))
{ 
 if(isset($_POST['radio'])) 
	       {
		   $errora=$sec->accedentalDeletion($sec);
		   $sec->checksecAvailabilty();
	      if($errora)
	       {
		    $secf->displayError($sec);
			}
		  else 
	       { 
		    $sec->successfullyDeleted();
			$secf->displayMessage($sec);
			}
		  }
 else
    {
	$sec->radioNotselected();
	$secf->displaySectorlist($sec);
	}
    		  
}	
else if (isset($_POST['saveedit']))
{
	 	 $update = $sec->updateSector();
			if($update)
                 $secf->displayMessage($sec);
	
}
else if (isset($_POST['saveadd']))
{
$sec->generateSectorid();
$sec->fetchData();
$exist=$sec->checkAlreadyexist();
$erroremp=$sec->checkemptySector();
	if($erroremp)
	$secf->displayAddsector($sec);//tik
    else if($exist)
	$secf->displayAddsector($sec);//tik
	else
	{
	 $inserted=$sec->insertSector();
	 if($inserted)
	 $secf->displayMessage($sec);
	 }
}
else if(isset($_POST['add']))
{echo "7";
$secf->displayAddsector();
}
else if(isset($_POST['edit']))
{
     if(isset($_POST['radio'])) 
	       {
		    $available=$sec->secdataAvailable();
			if($available==false)
			{
			$secf->displayError($sec);
			}
			else
			{
			$secf->displayEditsector($sec);
            }
			}
	else
	{
	$sec->radioNotselected();
	$secf->displaySectorlist($sec);
	}
	
}
else if(isset($_POST['back']))
{
$sec->unsetVariables();
$available=$sec->checksecAvailabilty();
if($available==false)
$secf->displayError($sec);
else
$secf->displaySectorlist($sec);
}
else
{
$sec->unsetVariables();
$available=$sec->checksecAvailabilty();
if($available==false)
$secf->displayError($sec);
else
$secf->displaySectorlist($sec);
}
?>