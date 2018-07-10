
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/UI/manageoccupationform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/BC/manageoccupation.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/UI/sectorwelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/BC/sectorwelcome.php");


$host  = $_SERVER['HTTP_HOST'];

$occ = new  Occupation();
$occf = new Occupationform();
$awf=new Sectorwelcomeform();
$awel=new Welcomesector();
error_reporting(0);

session_start();
error_reporting(E_ALL);
//not logged in
if (!isset($_SESSION['secname']))
{
$error = $awel->checkError();
$awf->displayRelogin($error);
}
else if(isset($_POST['logout']))
header("Location: http://$host/Online Exam Ex_2/index.php");
else if(isset($_POST['Examinations']))
{
$occ->setnewVariables();
$occ->unsetVariables();
header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/manageexamlogic.php");
}
else if(isset($_POST['welcome']))
header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/Sectorwelcomelogic.php");
else if(isset($_POST['delete']))
{ 
 $occ->identifySector();
 if(isset($_POST['radio'])) 
	       {
		   $errora=$occ->accedentalDeletion($occ);
		   $occ->checkoccAvailabilty();
	      if($errora)
	       {
		    $occf->displayError($occ);
			}
		  else 
	       { 
		    $occ->successfullyDeleted();
			$occf->displayMessage($occ);
			}
		  }
 else
    {
	$occ->radioNotselected();
	$occf->displayOccupationlist($occ);
	}
    		  
}	
else if (isset($_POST['saveedit']))
{$occ->identifySector();
	 	 $update = $occ->updateOccupation();
			if($update)
                 $occf->displayMessage($occ);
	
}
else if (isset($_POST['saveadd']))
{
$occ->identifySector();
$occ->generateOccupationid();
$occ->fetchData();
$exist=$occ->checkAlreadyexist();
$erroremp=$occ->checkemptyOccupation();
	if($erroremp)
	$occf->displayAddoccupation($occ);
    else if($exist)
	$occf->displayAddoccupation($occ);
	else
	{
	 $inserted=$occ->insertOccupation();
	 if($inserted)
	 $occf->displayMessage($occ);
	 }
}
else if(isset($_POST['add']))
{$occ->identifySector();
$occf->displayAddoccupation();
}
else if(isset($_POST['edit']))
{$occ->identifySector();
     if(isset($_POST['radio'])) 
	       {
		    $available=$occ->occdataAvailable();
			if($available==false)
			{
			$occf->displayError($occ);
			}
			else
			{
			$occf->displayEditoccupation($occ);
            }
			}
	else
	{
	$occ->radioNotselected();
	$occf->displayoccupationlist($occ);
	}
	
}
else if(isset($_POST['back']))
{
$occ->identifySector();
$occ->unsetVariables();
$available=$occ->checkoccAvailabilty();
if($available==false)
$occf->displayError($occ);
else
$occf->displayoccupationlist($occ);
}
else
{
$occ->identifySector();
$occ->unsetVariables();
$available=$occ->checkoccAvailabilty();
if($available==false)
$occf->displayError($occ);
else
$occf->displayoccupationlist($occ);
}
?>