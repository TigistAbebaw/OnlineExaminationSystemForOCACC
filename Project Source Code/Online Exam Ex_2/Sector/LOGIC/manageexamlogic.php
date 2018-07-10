
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/UI/manageexamform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/BC/manageexam.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/UI/sectorwelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Sector/BC/sectorwelcome.php");


$host  = $_SERVER['HTTP_HOST'];
session_start();
error_reporting(0);
$exm = new  Exam();
$exmf = new Exampreparationform();
$awf=new Sectorwelcomeform();
$awel=new Welcomesector();


//not logged ins
if (!isset($_SESSION['secname']))
{
$error = $awel->checkError();
$awf->displayRelogin($error);
}
else if(isset($_POST['back']))
header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/manageoccupationlogic.php");
else if(isset($_POST['backtooccupation']))
header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/manageexamlogic.php");
else if(isset($_POST['logout']))
header("Location: http://$host/Online Exam Ex_2/index.php");
else if(isset($_POST['welcome']))
header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/Sectorwelcomelogic.php");
else if(isset($_POST['delete']))
{  $exm->message=array();
 //$exm->identifyOccupation();
 if(isset($_POST['radio'])) 
	       {
		   $errora=$exm->accedentalDeletion($exm);
		   if($errora)
	       {
		    $exmf->displayError($exm);
			}
		  else 
	       { echo "here";
		   		 header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/manageexamlogic.php");
			}
		  }
 else
    {
	$exm->radioNotselected();
	$exmf->displayExamlist($exm);
	}
    		  
}
else if (isset($_POST['edit']))
{
$exm->message=array();
$exm->getOlddata();
$exm->getLocation();
$exm->getExampreparers();
if(count($exm->message)>0)
     {
	 $exmf->displayEditexam($exm);	
	 }
else
$exmf->displayEditexam($exm);
}	
else if (isset($_POST['saveedit']))
 {  $exm->message=array();
    $exm->fetchdata();
    $exm->identifyOccupation();
	$exm->validateEmpty();
  
	if(count($exm->message)>0)
     {$exm->getLocation();
$exm->getExampreparers();
	 $exmf->displayEditexam($exm);	
	 } 
	 else
	  $exm->updateExam();
	 if(isset($exm->update['succupdate']))
	 {
	 unset($_POST['saveedit']);
	 unset($_POST['edit']);
	 header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/manageexamlogic.php");
	 }
 }
else if (isset($_POST['add']))
{$exm->message=array();
$exm->getLocation();
$exm->getExampreparers();
if(count($exm->message)>0)
     {
	 $exmf->displayAddexam($exm);	
	 }
else
$exmf->displayAddexam($exm);
}	

else if (isset($_POST['saveadd']))
{$exm->message=array();
        $exm->fetchdata();
        $exm->validateEmpty();
		$exm->validateEmptydate();
		$exm->generateExamid();
		
	if(count($exm->message)>0)
     {$exm->getLocation();
         $exm->getExampreparers();
	 $exmf->displayAddexam($exm);	
	 }
	 else
	 $exm->insertExam();
	 if(isset($exm->create['succcreate']))
	 {
	 unset($_POST['saveadd']);
	 unset($_POST['add']);
	 header("Location: http://$host/Online Exam Ex_2/Sector/LOGIC/manageexamlogic.php");
	 }
}

else
{
$exm->identifyOccupation();
$exlist=$exm->examList();
if($exlist)
$exmf->displayExamlist($exm);
else
 $exmf->displayExamlist($exm);
}

?>  

