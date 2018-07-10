<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/UI/registercandidateform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/BC/registercandidate.php");

$host  = $_SERVER['HTTP_HOST'];

$rf=new Registrationform();
$candidate=new Registration();
error_reporting(0);

if(isset($_POST['submit']))//name of register button
{
$candidate->collectRegistrationdata();
$errorval= $candidate->checkRegistrationvalidation();
$validemail=$candidate->validateEmail();
			if(count($errorval)>0||$validemail=false)
			{
			$candidate->fetchOccupation();
			$rf->displayRegistrationform($candidate,$errorval);
			}
			else
			{
			$erroravl = $candidate->checkNameavailability();
				if(count($erroravl)>0)
				{$candidate->fetchOccupation();
				$rf->displayRegistrationform($candidate,$erroravl);}
				//{$candidate->fetchOccupation();
				else
				{
				$candidate->fetchOccupation();
				$newid=$candidate->generateNewid();
				$success=$candidate->registerCandidate($newid);
				}
			if($success)
			$rf->displaySuccesspage();
			}

}
else
{$candidate->fetchOccupation();
$rf->displayRegistrationform($candidate,array());}

if(isset($_POST['login']))
header("Location: http://$host/Online Exam Ex_2/Candidate/index.php");

?>